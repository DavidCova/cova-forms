@php
    (isset($value)) ? $val = $value : $val = "";
@endphp
<div class="form-group">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}} 
            @if (isset($required))<span class="text-p mx-2">*</span>@endif
        </div>
    </label>
    <input type="tel" name="{{$identifier}}" id="{{$identifier}}" class="form-control {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror" value="{{old($identifier, $val)}}"
    @if (isset($required)) required @endif
    @if (isset($readonly)) readonly @endif
    @if (isset($placeholder)) placeholder="{{$placeholder}}" @endif
    @if (isset($pattern)) pattern="{{$pattern}}" @endif
    @if (isset($maxlength)) maxlength="{{$maxlength}}" @endif
    @if (isset($minlength)) minlength="{{$minlength}}" @endif
    >
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
