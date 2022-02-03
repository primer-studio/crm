<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WebsocketController extends Controller
{
    private $socket = '';
    private $port = 8090;

    public function __construct() {
        //
    }

    public function make_socket_server() {
        $address = '127.0.0.1';
        $port = 12345;
        
        // Create WebSocket.
        $server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        // $server = socket_create(AF_INET, SOCK_DGRAM, SOL_TCP);

        socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1);
        socket_bind($server, $address, $port);
        socket_listen($server);
        $client = socket_accept($server);
        
        // Send WebSocket handshake headers.
        $request = socket_read($client, 5000);
        preg_match('#Sec-WebSocket-Key: (.*)\r\n#', $request, $matches);
        $key = base64_encode(pack(
            'H*',
            sha1($matches[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')
        ));
        $headers = "HTTP/1.1 101 Switching Protocols\r\n";
        $headers .= "Upgrade: websocket\r\n";
        $headers .= "Connection: Upgrade\r\n";
        $headers .= "Sec-WebSocket-Version: 13\r\n";
        $headers .= "Sec-WebSocket-Accept: $key\r\n\r\n";
        socket_write($client, $headers, strlen($headers));
        
        while (true) {
            sleep(1);
            $content = 'Now: ' . time();
            $response = chr(129) . chr(strlen($content)) . $content;
            // echo $response;
            socket_write($client, $response);
            $payload = socket_read($client, 1024, PHP_BINARY_READ) or die("Could not read input\n");
            Log::info("payload received: ". utf8_decode($payload) . "\n");
        }
    }
}
