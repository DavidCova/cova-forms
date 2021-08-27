<div class="form-group">
@php
    (isset($value)) ? $val = $value : $val = "";
@endphp

    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))
            <span class='text-p mx-2'>*</span>
            @endif
        </div>
    </label>
    <input type="url" name="{{$identifier}}" id="{{$identifier}}" class="form-control rounded-0 @error($identifier) is-invalid @enderror"
        value="{{old($identifier, $val)}}"
        {{$required ?? ''}}>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
