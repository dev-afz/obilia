<x-site.layout title="Home" :include="['popper', 'owl', 'select2']">
    <x-site.navbar class="header-light" />

    <x-site.job-details :job="$job" />

    @guest
        <x-site.signin-modal />
        <x-site.signup-modal />
    @endguest

    @section('page-scripts')
        <script>
            $(document).on('change', '.custom-file-input', function() {
                const fileName = $(this).val().split('\\').pop();
                if (fileName) {
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                } else {
                    $(this).next('.custom-file-label').html('Choose file');
                }
            });


            $(document).on('submit', '#send_proposal', function(e) {
                e.preventDefault();

                rebound({
                    form: this,
                    url: "{{ route('site.job.proposal') }}",
                    block: '#send-proposal',
                    successCallback: function(res) {
                        console.log(res);
                    }
                });

            });
        </script>
    @endsection

</x-site.layout>
