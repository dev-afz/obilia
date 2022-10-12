<div class="form-group">
    <label for="{{ $name }}">
        @if ($label)
            {{ $label }}
        @else
            {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}
        @endif

    </label>

    <select @if ($required) required @endif class="select2 rep-select form-control {{ $class }}"
        {!! $attrs !!}
        @if ($multiple) multiple
            name="{{ $repeaterName }}[][{{ $name }}][]"
        @else
            name="{{ $repeaterName }}[][{{ $name }}]" @endif>
        @if (!$multiple)
            <option selected disabled>Select {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}</option>
        @endif

        @forelse ($options as $key => $option)
            <option
                @if (!empty($optionValue)) value="{{ $option->$optionValue }}"
            @else
            value="{{ $option->id ?? $key }}" @endif>
                {{ $option->name ?? ($option->title ?? $option) }}
                @forelse ($additionalOptionText as $add)
                    {{ $option->$add ?? $add }}
                @empty
                @endforelse

            </option>
        @empty
        @endforelse

    </select>
    <div class="invalid-tooltip">Please provide a valid {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}</div>
</div>

@pushonce('component-script')
    <script>
        $(document).ready(function() {
            $('.rep-select').select2({
                allowClear: true,
                placeholder: "Select an {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}",
                dropdownParent: $('#container-{{ $repeaterName }}'),
                width: '100%'
            }).val('-1').trigger('change');
        });
    </script>
@endpushonce
