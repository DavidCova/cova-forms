<div class="form-group py-2">
    <label for="{{$identifier}}" class="form-label">
        <div class="text-capitalize">{{$label ?? $identifier}}
            @if (isset($required))
            <span class='text-p mx-2'>*</span>
            @endif    
        </div>
    </label>
    <input class="form-control {{$input_classes ?? ''}} @error($identifier) is-invalid @enderror" type="file" id="{{$identifier}}" name="{{$identifier}}" 
    @if (isset($filetypes))
    accept="
    @foreach ($filetypes as $ft)
        {{$ft}},
    @endforeach
    "
    @endif
    {{$multiple ?? ''}}
    {{$required ?? ''}}>
    @error($identifier)
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>