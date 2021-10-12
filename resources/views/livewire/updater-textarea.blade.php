<div>
<div class="form-group">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))
            @if ($required == true)
            <span class="text-p mx-2">*</span>
            @endif
            @endif
        </div>
    </label>
    <div class="input-group">
    <div  wire:loading class="pe-2 animate-pulse align-self-center">      
        <i class="far fa-save my-auto"></i>        
    </div>  
    <textarea name="{{$identifier}}" id="{{$identifier}}"
    wire:model.lazy="current"
    {{isset($required) ? ($required == true) ? 'required' :'' : ''}}
        class="form-control {{$input_classes ?? ''}} @error($identifier) is-invalid @enderror"        
        @if (isset($spellcheck)) spellcheck="true" @endif
        @if (isset($style)) style="{{$style}}" @endif
        @if (isset($cols)) cols="{{$cols}}" @endif
        @if (isset($rows)) rows="{{$cols}}" @endif
        @if (isset($required)) required @endif
        @if (isset($readonly)) readonly @endif
        @if (isset($disabled)) disabled @endif
        @if (isset($placeholder)) placeholder="{{$placeholder}}" @endif
        @if (isset($pattern)) pattern="{{$pattern}}" @endif
        @if (isset($maxlength)) maxlength="{{$maxlength}}" @endif
        @if (isset($minlength)) minlength="{{$minlength}}" @endif
        >{{$current}}</textarea>
      </div>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
</div>



