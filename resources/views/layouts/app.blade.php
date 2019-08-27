@php
    $config = [
        'appName' => config('app.name'),
        'locale' => $locale = app()->getLocale(),
        'locales' => config('app.locales'),
        'githubAuth' => config('services.github.client_id'),
    ];

    $polyfills = [
        'Promise',
        'Object.assign',
        'Object.values',
        'Array.prototype.find',
        'Array.prototype.findIndex',
        'Array.prototype.includes',
        'String.prototype.includes',
        'String.prototype.startsWith',
        'String.prototype.endsWith',
    ];
@endphp

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Tasks Management System</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    </head>
    <body id="page-top">
        @yield('content')

        {{-- Global configuration object --}}
        <script>
        window.config = @json($config);
        window.config.baseurl = "{{url ('/')}}";
        window.config._token = '<?php echo csrf_token(); ?>';
        </script>

        {{-- Polyfill JS features via polyfill.io --}}
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features={{ implode(',', $polyfills) }}"></script>

        {{-- Load the application scripts --}}
        @if (app()->isLocal())
            <script src="{{ mix('js/app.js') }}"></script>
        @else
            <script src="{{ mix('js/manifest.js') }}"></script>
            <script src="{{ mix('js/vendor.js') }}"></script>
            <script src="{{ mix('js/app.js') }}"></script>
        @endif
    </body>
</html>
