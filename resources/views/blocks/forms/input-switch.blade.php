<div class="form-check form-switch">
    <input class="form-check-input {{$input_classes ?? ''}} @error($identifier) is-invalid @enderror" type="checkbox" id="{{$identifier}}" name="{{$identifier}}" {{$checked ?? ''}} {{$required ?? ''}}
     @if(isset($value))
     @if ($value == 1)
         checked
     @endif
     @endif
     >
    <label class="form-check-label" for="{{$identifier}}"><div class="text-capitalize">{{$label ?? $identifier}}@if (isset($required)) <span class="text-p mx-2">*</span> @endif</div></label>
  </div>