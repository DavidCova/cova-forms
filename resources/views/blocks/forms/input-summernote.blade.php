<div class="form-group">
@php
    (isset($value)) ? $val = $value : $val = "";
@endphp
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))<span class='text-p mx-2'>*</span>@endif
        </div>
    </label>
    <textarea name="{{$identifier}}" id="{{$identifier}}"
    {{$required ?? ''}}
        class="form-control {{$input_classes ?? ''}} @error($identifier) is-invalid @enderror">{!!old($identifier,$val)!!}</textarea>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>