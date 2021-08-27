<div class="form-group">
@php
    (isset($value)) ? $val = $value : $val = "";
@endphp
    @if ($label != false)
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize {{$label_classes ?? ''}}">{{(($label != false) ? $label : '') ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))
            <span class="text-p mx-2">*</span>
            @endif
        </div>
    </label>
    @endif
    <input type="email" name="{{$identifier}}" id="{{$identifier}}" class="form-control {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror"
        value="{{old($identifier, $val)}}"
        {{$required ?? ''}}
        {{$multiple ?? ''}}
        placeholder="{{$placeholder ?? ''}}"
        >
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
