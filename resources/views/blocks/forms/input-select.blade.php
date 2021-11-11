<div class="form-group">
    @if (isset($label)) 
    <label class="pt-2" for="{{$identifier}}">
        <div class="text-capitalize">{{__($label ?? str_replace("_"," ",$identifier))}}
            @if (isset($required))<span class='text-p mx-2'>*</span>@endif    
        </div>
    </label>
    @endif
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
            @foreach ($options as $o)
                <option value="@if(isset($key)){{$o->$key}}@else{{$o}}@endif"
                    @if(isset($current))
                        @if (isset($key))
                            @if($o->$key == $current)
                                selected
                            @endif
                        @if (isset($value))
                            @elseif ($value == $current)
                                selected
                            @endif
                        @elseif($o == $current)
                            selected
                        @endif
                    @endif            
                    >
                    @if(!isset($value))
                        {{$o}}
                    @else
                        {{$o[$value]}}
                    @endif
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
