<div class="form-group py-2">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))<span class="text-p mx-2">*</span>@endif
        </div>
    </label>
    <div class="input-group">
        <div wire:loading>
            <span class="spinner-border spinner-border-sm m-2" role="status" aria-hidden="true"></span>
        </div>
    <input class="form-control {{$input_classes ?? ''}} @error($identifier) is-invalid @enderror" type="file" id="{{$identifier}}" name="{{$identifier}}" 
    @if (isset($filetypes))
    accept="
    @foreach ($filetypes as $ft)
        {{$ft}},
    @endforeach
    "
    @endif
    {{$js ?? ''}}
    @if (isset($multiple)) multiple @endif
    @if (isset($required)) required @endif
    @if (isset($readonly)) readonly @endif
    >
    </div>
    @error($identifier)
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>