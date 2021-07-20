<div class="form-group">
    @php
    if(isset($value)){    
        $val = $value;
    }else{
        $val = "";
    }
    @endphp 
    <label class="pt-2" for="{{$identifier}}"><div class="text-capitalize">{{$label ?? $identifier}}@if (isset($required)) @if ($required == 1)
        <span class="text-p mx-2">*</span>
    @endif  @endif</div></label>
    <input type="date" name="{{$identifier}}" id="{{$identifier}}" 
     class="form-control rounded-0 @error($identifier) is-invalid @enderror"
     value="{{old($identifier,$val)}}"
     {{$required ?? ''}}
     min="{{$min ?? ''}}"
     max="{{$max ?? ''}}"
     >
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>