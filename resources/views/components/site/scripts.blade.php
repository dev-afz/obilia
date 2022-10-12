<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

@if (in_array('alpine', $include))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"></script>
@endif

@if (in_array('popper', $include))
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


@if (in_array('owl', $include))
    <script src="/site/js/owl.carousel.min.js"></script>
@endif

@if (in_array('select2', $include))
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endif

@if (in_array('range-slider', $include))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
@endif

@if (in_array('counter-up', $include))
    <script src="/site/js/counterup.min.js"></script>
@endif
@if (in_array('menu', $include))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>
@endif

<script src="/site/js/notiflix.min.js"></script>
<script src="/site/js/custom.js"></script>
<script src="/site/js/init.js"></script>

@yield('page-scripts')
@stack('component-scripts')
