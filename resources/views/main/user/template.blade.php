<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/kit/css/uikit-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/kit/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/kit/css/dark.css') }}" />
    <script src="{{ asset('assets/kit/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/kit/js/uikit-icons.min.js') }}"></script>

    <title>{{ env('APP_NAME') }}</title>
    @livewireStyles
</head>
<body>
<main id="app">
    @include('main.user.template-parts.navbar')
    <div class="uk-container uk-padding">
        @yield('content')
    </div>
</main>
@livewireScripts
</body>
</html>
