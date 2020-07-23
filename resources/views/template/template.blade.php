<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('assets/style.css')}}">
        <title>@yield('titulo')</title>


    </head>
    <body>
        @yield('conteudo')

    <img src="{{url('assets/img/icon.png')}}">
    </body>
</html>
