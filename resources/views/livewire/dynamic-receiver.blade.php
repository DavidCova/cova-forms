<div>
    
    <div class="input-group form-group">
        <div wire:loading>
            <span class="spinner-border spinner-border-sm m-2" role="status" aria-hidden="true"></span>
        </div>
        @if(isset($label)) 
            <label class="pt-2" for="{{$col}}">
                <div class="text-capitalize">{{__($label ?? str_replace("_"," ",$col))}}
                    @if (isset($required))
                    <span class='text-p mx-2'>*</span>
                    @endif
                </div>
            </label>
        @endif
            <select
                name="{{$col}}"
                id="{{$col}}"
                class="form-select rounded-0 @error($col) is-invalid @enderror"
                @if(isset($required)) required @endif
                @if(isset($readonly)) readonly @endif
                wire:model="receiver"
                >
                <option value="">{{__('Select')}}</option>
            @if ((is_object($options) || is_array($options)))
                @foreach ($options as $option)
                    <option @if ($current == $option[$key]) selected @endif value="{{$option[$key]}}">{{$option[$value]}}</option>
                {{-- <option value="@if(isset($key)){{$option->$key}}@else{{$option}}@endif">
                    @if(isset($val)){{$option->$val}}@else{{$option}}@endif
                </option> --}}
                @endforeach
            @else
                @foreach (json_decode($options,true) as $data)
                    <option @if ($current == $data['name']) selected
                        
                    @endif value="{{$data['id']}}">{{$data['name']}}</option>
                @endforeach
            @endif
            </select>
            @error($col)
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror


    </div>
</div>