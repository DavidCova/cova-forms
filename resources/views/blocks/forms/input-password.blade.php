<div class="form-group">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? $identifier}}
            @if (isset($required))
            <span class='text-p mx-2'>*</span>
            @endif
        </div>
    </label>
    <input type="password" name="{{$identifier}}" id="{{$identifier}}" class="form-control {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror" {{$required ?? ''}} autocomplete="{{$autocomplete ?? ''}}">
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>