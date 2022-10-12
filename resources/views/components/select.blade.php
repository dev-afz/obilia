<div class="form-group mt-1">
    <label for="{{ $name }}">
        @if ($label)
            {{ $label }}
        @else
            {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}
        @endif

    </label>

    <select @if ($required) required @endif class="select2  form-control {{ $class }}"
        id="{{ $id ?? $name }}" {!! $attrs !!}
        @if ($multiple) multiple
            name="{{ $name }}[]"
        @else
            name="{{ $name }}" @endif>


        @forelse ($options as $key => $option)
            <option
                @if (!empty($optionValue)) value="{{ $option->$optionValue }}"
            @else
            value="{{ $option->id ?? $key }}" @endif>
                {{ Str::ucfirst($option->name ?? ($option->title ?? $option)) }}
                @forelse ($additionalOptionText as $add)
                    {{ Str::ucfirst($option->$add ?? $add) }}
                @empty
                @endforelse

            </option>
        @empty
        @endforelse

    </select>
    <div class="invalid-tooltip">Please provide a valid {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}</div>
</div>

@push('component-script')
    <script>
        $(document).ready(function() {
            $('#{{ $id ?? $name }}').select2({
                allowClear: true,
                placeholder: "  {{ $placeholder ?? 'Select ' . Str::ucfirst(Str::replace('_', ' ', $name)) }}",
                dropdownParent: $('#{{ $id ?? $name }}').parent(),
                width: '100%'
            }).val('-1').trigger('change');
        });
    </script>
@endpush
