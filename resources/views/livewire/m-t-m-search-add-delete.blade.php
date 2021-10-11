<div>
    <div class="input-group mb-3">
        <span class="input-group-text bg-white border-0 w-100">
            <div class="row gy-2 gx-3 align-items-center">
                @foreach($data as $k)
                    <div class="col-auto">
                        <span class="btn btn-info text-white btn-sm rounded-pill">
                            {{$k[$key]}} 
                            <span>
                                <button type="button" wire:click="detach({{$k[$key]}})" class="badge bg-link">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </span>
                        </span>
                    </div>                      
                @endforeach
            </div>
        </span>
        <input
                type="text"
                class="form-control"
                placeholder="Search..."
                wire:model.debounce.750ms="query"
                wire:keydown.escape="resetar"
                wire:keydown.tab="resetar"
                wire:keydown.ArrowUp="decrementHighlight"
                wire:keydown.ArrowDown="incrementHighlight"
                wire:keydown.enter="selectContact"
            />
         
            <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group" style="margin-top: 87px;>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fas fa-spinner fa-spin me-2"></i>Searching...
                    </li>
                  </ul>
            </div>
         
            @if(!empty($query))
                <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetar"></div>
         
                <ul class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group list-group-flush w-100" style="margin-top: 87px;">
                    @if(!empty($results))
                        @foreach($results as $i => $result)
                        <li class="list-group-item text-p d-flex justify-content-between {{ $highlightIndex === $i ? 'highlight' : '' }}">
                            {{ $result['name'] }}
                        <button type="button" wire:click="addEntry"><i class="fas fa-plus-circle m-auto p-2"></i></button>
                        </li>                            
                        @endforeach
                    @else
                        <div class="list-item">No results!</div>
                    @endif
                    </ul>
            @endif
      </div>
</div>
