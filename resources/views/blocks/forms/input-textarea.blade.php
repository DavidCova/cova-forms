<div class="form-group">
    @php
    if(isset($value)){
    $val = $value;
    }else{
    $val = "";
    }
    @endphp
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))
            @if ($required == 1)
            <span class="text-p mx-2">*</span>
            @endif
            @endif
        </div>
    </label>
    <textarea name="{{$identifier}}" id="{{$identifier}}"
    @if (isset($required))
        @if ($required==1) required
        @endif
    @endif
        class="form-control {{$classes ?? ''}} @error($identifier) is-invalid @enderror" cols="{{$cols}}" rows="{{$rows}}" style="{{$style ?? ''}}">{{old($identifier,$val)}}</textarea>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
