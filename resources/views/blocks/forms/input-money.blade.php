@php
if(isset($value)){
$val = $value;
}else{
$val = "";
}
@endphp
<div class="form-group">
    <label class="pt-2" for="{{$identifier}}"><div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
        @if (isset($required))
        <span class='text-p mx-2'>*</span>
        @endif
    </div></label>
    <input type="number" name="{{$identifier}}" id="{{$identifier}}" class="form-control {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror" step="0.01" value="{{old($identifier, $val)}}"
    {{$required ?? ''}}
    {{$readonly ?? ''}}
    {{$js ?? ''}}
    @if (isset($max)) max="{{$max}}" @endif
    @if (isset($min)) min="{{$min}}" @endif
    >
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
