<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link href="site/css/plugins.css" rel="stylesheet">
    <link href="site/css/notiflix.min.css" rel="stylesheet">
    <link href="site/css/styles.css" rel="stylesheet">
    <link href="site/css/override.css" rel="stylesheet">
</head>

<body class="blue-skin">
    <div class="Loader"></div>

    <div id="main-wrapper">

        <x-site.navbar />

        {!! $slot !!}

    </div>

    <script src="site/js/jquery.min.js"></script>

    @if (in_array('alpine', $scripts))
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"></script>
    @endif

    @if (in_array('popper', $scripts))
        <script src="site/js/popper.min.js"></script>
    @endif
    <script src="site/js/bootstrap.min.js"></script>

    @if (in_array('owl', $scripts))
        <script src="site/js/owl.carousel.min.js"></script>
    @endif

    @if (in_array('select2', $scripts))
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endif

    @if (in_array('range-slider', $scripts))
        <script src="site/js/ion.rangeSlider.min.js"></script>
    @endif

    @if (in_array('counter-up', $scripts))
        <script src="site/js/counterup.min.js"></script>
    @endif



    <script src="site/js/metisMenu.min.js"></script>
    <script src="site/js/notiflix.min.js"></script>
    <script src="site/js/custom.js"></script>
    <script src="site/js/init.js"></script>

    @stack('page-scripts')
    @stack('component-scripts')


</body>

</html>
