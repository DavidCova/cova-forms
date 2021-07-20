<div class="form-group">
    @php
    if(isset($value)){
    $val = $value;
    }else{
    $val = "";
    }
    @endphp
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? $identifier}}
            @if (isset($required))
            <span class='text-p mx-2'>*</span>
            @endif
        </div>
    </label>
    <textarea name="{{$identifier}}" id="{{$identifier}}"
    {{$required ?? ''}}
        class="form-control @error($identifier) is-invalid @enderror">{!!old($identifier,$val)!!}</textarea>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>