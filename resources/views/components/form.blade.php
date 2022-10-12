<form class="needs-validation form form-vertical" id="{{ $id }}" novalidate="">
    <div class="row  {{ $class }}">
        {{ $slot }}
    </div>
    <div class="col-12 mt-3 text-center">
        <x-button :isSubmit="true" :text="$btnText" />

    </div>
</form>

@php
if ($reload) {
    $rld = 1;
} else {
    $rld = 0;
}

if ($reset) {
    $rst = 1;
} else {
    $rst = 0;
}

@endphp
@push('component-script')
    <script>
        $(document).on('submit', '#{{ $id }}', function(e) {
            e.preventDefault();
            let valid = true;
            if (!validate($(this))) {
                return false;
            }
            $('#{{ $id }} [required]:not(:disabled)').each(function() {
                if ($(this).is(':invalid') || !$(this).val()) snb('error', 'Validation Error', $(this)
                    .closest('.form-group').find('.invalid-tooltip').text(), valid = false);
            })
            if (!valid) return false;
            rebound({
                selector: this,
                route: "{{ $route }}",
                method: "POST",
                loader: '<div class="create"><span class="loader"></span></div>',
                reset: {{ $rst }},
                relaod: {{ $rld }},
                successCallback: {{ $successCallback }},
                errorCallback: {{ $errorCallback }},
                beforeSendCallback: {{ $beforeSendCallback }},
            })
        });

        function none() {
            return false;
        }
    </script>
@endpush
