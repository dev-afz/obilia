<x-site.layout title="Home" :include="['popper', 'owl', 'select2']">
    <x-site.navbar />
    <x-site.hero />
    <x-site.featured-employers />
    {{-- <x-site.jobs /> --}}
    <x-site.jobs-category />

    <x-site.services />
    <x-site.join-or-hire />
    <x-site.pricing />
    <x-site.testimonials />
    <x-site.footer />
    @guest
        <x-site.signin-modal />
    @endguest

    @section('page-scripts')
        <script>
            $(document).ready(function() {
                $('#jb-category').select2({
                    placeholder: 'Select a category',
                    allowClear: true
                });
            });
        </script>
    @endsection
</x-site.layout>
