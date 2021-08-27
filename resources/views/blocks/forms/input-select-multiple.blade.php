<div class="form-group">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{$label ?? str_replace("_"," ",$identifier)}}
            @if (isset($required))
            <span class='text-p mx-2'>*</span>
            @endif    
        </div>
    </label>
    <select name="{{$identifier}}[]" id="{{$identifier}}" multiple {{$required ?? ''}}
        class="form-select {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror">
        <option value="" selected disabled>{{__('Select')}}</option>
        @foreach ($options as $option)
        <option value="{{$option->$key}}" @if(isset($current) &&in_array($option->$key, $current)) selected @endif >{{$option->$val}}</option>
        @endforeach
    </select>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
