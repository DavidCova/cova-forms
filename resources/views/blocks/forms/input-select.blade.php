<div class="form-group">
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{__($label ?? str_replace("_"," ",$identifier))}}
            @if (isset($required))
            <span class='text-p mx-2'>*</span>
            @endif    
        </div>
    </label>
    <select name="{{$identifier}}" id="{{$identifier}}" {{$readonly ?? ''}}
        class="form-select {{$input_classes ?? ''}} rounded-0 @error($identifier) is-invalid @enderror"
        @if(isset($model))
            wire:model="{{$model}}"
        @endif
        @if(isset($change))
            wire:change="{{$change}}"
        @endif
        {{$required ?? ''}}>
        <option value="">{{__('Select')}}</option>
       @if ((is_object($options) || is_array($options)))
        @foreach ($options as $option)
        <option value="@if(isset($key)){{$option->$key}}@else{{$option}}@endif"
            @if(isset($current))
                @if (isset($key))
                    @if($option->$key == $current)
                    selected
                    @endif

                @elseif ($option == $current)
                selected
                @endif
            @endif            
            >
            @if(isset($val)){{$option->$val}}@else{{$option}}@endif
        </option>
        @endforeach
        @else
        @foreach (json_decode($options,true) as $data)
        <option value="{{$data['id']}}">{{$data['name']}}</option>
        @endforeach
       @endif
       
    </select>
    @error($identifier)
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
@push('scripts')
@if(isset($current))
<script>
var current = "{!! $current !!}";
document.getElementById("{!! $identifier !!}").value=current;
</script>
@endif
@endpush
