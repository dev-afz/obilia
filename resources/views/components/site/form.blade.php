<form class="needs-validation form form-vertical" id="{{ $id }}" novalidate>
    <div class="row  {{ $class }}">
        {{ $slot }}
    </div>

    @if ($btnText)
        <div class="col-12 mt-3 text-center">
            <x-button :isSubmit="true" :text="$btnText" />

        </div>
    @endif

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
            $('#{{ $id }} [required]:not(:disabled)').each(function() {
                if ($(this).is(':invalid') || !$(this).val()) {
                    notify.failure('Validation Error <br> . ' + $(
                            this)
                        .closest('.form-group').find('.invalid-tooltip').text());
                    valid = false;
                    if ($(this).is('input')) {
                        $(this).addClass('is-invalid');
                    } else if ($(this).is('select')) {
                        $(this).closest('.form-group').find('.select2-selection').css('border',
                            '1px solid #dc3545');
                    } else if ($(this).is('textarea')) {
                        $(this).addClass('is-invalid');
                    }


                };
            })
            if (!valid) return false;
            rebound({
                form: this,
                url: "{{ $route }}",
                method: "POST",
                block: {{ $block }},
                reset: {{ $rst }},
                reload: {{ $rld }},
                successCallback: {{ $successCallback }},
                errorCallback: {{ $errorCallback }},
                beforeSendCallback: {{ $beforeSendCallback }},
                completeCallback: {{ $completeCallback }},
                showNotification: {{ $showNotification }},
            })
        });

        function none() {
            return false;
        }
    </script>
@endpush
