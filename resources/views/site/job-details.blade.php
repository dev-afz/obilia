<x-site.layout title="Home" :include="['popper', 'owl', 'select2']">
    <x-site.navbar class="header-light" />

    <x-site.job-details :job="$job" />

    @guest
        <x-site.signin-modal />
        <x-site.signup-modal />
    @endguest

    @section('page-scripts')
        <script></script>
    @endsection

</x-site.layout>
