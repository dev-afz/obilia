<div class="form-group
@if ($prepend || $append) input-group @endif
{{ $parentClass }} text-left mt-1">
    @if (($hasLabel || !empty($label)) && $type !== 'hidden')
        <label for="{{ $id ?? $name }}">{!! Str::ucfirst(Str::replace('_', ' ', $label ?? $name)) !!}</label>
    @endif
    @if ($type == 'textarea')
        <textarea @if ($required) required @endif {!! $attrs !!} class="form-control"
            id="{{ $id ?? $name }}" name="{{ $name }}" rows="3">{{ $value }}</textarea>
        @if (!empty($helperText))
            <p><small class="text-muted">{{ $helperText }}</small></p>
        @endif
        <div class="invalid-tooltip">Please provide a valid {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}</div>
    @else
        @if ($prepend)
            <div class="input-group-prepend">
                <span class="input-group-text light">{!! $prepend !!}</span>
            </div>
        @endif

        <input value="{{ $value }}" type="{{ $type }}" class="form-control {{ $class }}"
            @if ($required) required @endif name="{{ $name }}" {!! $attrs !!}
            id="{{ $id ?? $name }}" placeholder=" {{ $placeholder ?? 'Enter ' . Str::replace('_', ' ', $name) }}">
        @if ($append)
            <div class="input-group-append">
                <span class="input-group-text light">{!! $append !!}</span>
            </div>
        @endif
        @if (!empty($helperText))
            <p><small class="text-muted">{{ $helperText }}</small></p>
        @endif
        <div class="invalid-tooltip">Please provide a valid {{ Str::ucfirst(Str::replace('_', ' ', $name)) }}
        </div>

    @endif

</div>
