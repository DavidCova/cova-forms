<div class="form-group">
    @php
        (isset($current)) ? $val = $current : $val = "";
    @endphp
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize {{$label_classes ?? ''}}">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))<span class="text-p mx-2">*</span>@endif
        </div>
    </label>
    <div class="input-group">
        <div wire:loading>
            <span class="spinner-border spinner-border-sm m-2" role="status" aria-hidden="true"></span>
        </div>
    <input
        type="email"
        name="{{$identifier}}"
        id="{{$identifier}}"
        class="form-control {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror"
        value="{{old($identifier, $val)}}"   
        {{$js ?? ''}}     
        @if (isset($multiple)) multiple @endif
        @if (isset($required)) required @endif
        @if (isset($readonly)) readonly @endif
        @if (isset($placeholder)) placeholder="{{$placeholder}}" @endif
        @if (isset($pattern)) pattern="{{$pattern}}" @endif
        @if (isset($maxlength)) maxlength="{{$maxlength}}" @endif
        @if (isset($minlength)) minlength="{{$minlength}}" @endif            
    >
    </div>
    @error($identifier)
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>