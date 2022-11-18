<x-site.layout title="Home" :include="['popper', 'owl', 'select2']">
    <x-site.navbar />
    <x-site.hero :categories="$categories" />
    <x-site.jobs-category :categories="$categories" />
    <x-site.services :jobs="$latest_jobs" />


    @guest
        {{-- <x-site.join-or-hire /> --}}
    @endguest


    <x-site.pricing />
    <x-site.testimonials />

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
