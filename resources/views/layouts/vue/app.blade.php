<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Frequently Asked Questions">
    <title>{{ config('app.name', 'FAQ') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <v-app id="inspire">
            @yield('content')
        </v-app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>