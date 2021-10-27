<div class="form-group">
@php
    (isset($current)) ? $val = $current : $val = "";
@endphp
@if (isset($label)) 
    @if ($label != false) 
        <label class="pt-2" for="{{$identifier}}">
            <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
                @if (isset($required))
                <span class='text-p mx-2'>*</span>
                @endif
            </div>
        </label>  
    @endif
@endif    
      <div class="input-group">
        <div wire:loading>
            <span class="spinner-border spinner-border-sm m-2" role="status" aria-hidden="true"></span>
        </div>
    <input type="text"
        name="{{$identifier}}"
        id="{{$identifier}}"
        class="form-control {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror @error('new_value') is-invalid @enderror"
        {{-- value="{{old($identifier, $val)}}" --}}
        {{$js ?? ''}}
        value="{{old($identifier, $val)}}"        
        @if (isset($required)) required @endif
        @if (isset($readonly)) readonly @endif
        @if (isset($placeholder)) placeholder="{{$placeholder}}" @endif
        @if (isset($pattern)) pattern="{{$pattern}}" @endif
        @if (isset($maxlength)) maxlength="{{$maxlength}}" @endif
        @if (isset($minlength)) minlength="{{$minlength}}" @endif
        @if (isset($title)) title="{{$title}}" @endif
        >
        @if (isset($deletable))  
            <div class="input-group-append">
                <span class="input-group-text p-0">
                    <form action="{{$route}}" method="post">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-link" onclick="confirm('Are you sure?')"><i class="far fa-trash-alt text-danger"></i></button>
                    </form>
                </span>
            </div>
        @endif
    </div>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
    @if($errors->has('new_value'))
        <span class="text-xs text-danger">{{ $errors->first('new_value') }}</span>
    @endif
    
</div>
