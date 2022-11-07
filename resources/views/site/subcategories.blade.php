<x-site.layout title="Home" :include="['popper', 'owl', 'select2']">
    <x-site.navbar class="header-light" />
    <x-site.header title="Subcategories" subtitle="Find the best subcategories for your business" />

    <div class="gray-bg">
        <div class="container ">
            <x-site.subcategory :subcategories="$subcategories" />
        </div>
    </div>

    @guest
        <x-site.signin-modal />
        <x-site.signup-modal />
    @endguest

    @section('page-scripts')
        <script>
            $(document).ready(function() {
                $('#jb-category').select2({
                    placeholder: 'Select a category',
                    allowClear: true
                });
            });
            @if (session('error'))
                $(document).ready(function() {
                    notify.failure("{{ session('error') }}");
                });
            @endif
        </script>
    @endsection

</x-site.layout>
