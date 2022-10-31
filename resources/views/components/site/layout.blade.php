<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <x-site.styles :include="$include" />

    <style>
        .f-logo,
        .logo {
            height: 50px;
            width: 50px;
        }
    </style>

</head>

<body class="blue-skin">
    <div class="Loader"></div>

    <div id="main-wrapper">

        {!! $slot !!}

    </div>
    <x-site.footer />
    <x-site.scripts :include="$include" />
</body>

</html>
