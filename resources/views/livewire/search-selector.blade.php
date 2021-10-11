<div>
    <div class="relative">
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
     
        <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            <div class="list-item"><i class="fas fa-spinner fa-spin me-2"></i>Searching...</div>
        </div>
     
        @if(!empty($query))
            <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetar"></div>
     
            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                @if(!empty($results))
                    @foreach($results as $i => $result)
                        <a
                            href="{{$route.$result['id']."/".$route_method}}"
                            class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                        >{{ $result['name'] }}</a>
                    @endforeach
                @else
                    <div class="list-item">No results!</div>
                @endif
            </div>
        @endif
    </div>
</div>
