<div class="form-group py-2">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))<span class="text-p mx-2">*</span>@endif
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
    @if (isset($multiple)) multiple @endif
    @if (isset($required)) required @endif
    >
    @error($identifier)
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>