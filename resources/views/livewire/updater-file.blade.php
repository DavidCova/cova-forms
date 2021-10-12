<div>
    @include('blocks.forms.input-file',['identifier' => $col,'label' => false,'js' => "wire:dirty.class=border-info wire:model.lazy=new_value",'save_path' => $save_path])
    @if ($model->$col)
        <div class="d-flex">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="far fa-file me-2"></i><a class="text-p" href="{{asset('storage/'.$model->$col)}}" target="_blank">{{$model->$col}}</a></li>          
            </ul>
        </div>
    @endif    
</div>
