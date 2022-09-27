<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/ui/jquery.sticky.js')) }}"></script>
@yield('vendor-script')

<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

<script src="{{ asset(mix('js/init.js')) }}"></script>


@yield('page-script')

@livewireScripts
<script defer src="{{ asset(mix('vendors/js/alpinejs/alpine.js')) }}"></script>
