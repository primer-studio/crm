<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>websocket layer</title>
</head>
<body>
    <div id="root"></div>
    <script>
        var host = 'ws://127.0.0.1:12345';
        var socket = new WebSocket(host);
        socket.onmessage = function(saeed) {
            document.getElementById('root').innerHTML = saeed.data;
        };
    </script>
</body>
</html>