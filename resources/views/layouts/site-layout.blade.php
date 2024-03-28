<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Drinks.io {{$title ?? ''}}</title>
        <link rel="stylesheet" href="{{asset('css/icons/css/fontello.css')}}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('partials.header')
        {{$slot}}
        @include('partials.footer')

        {{$scripts ?? ''}}
    </body>
</html>
