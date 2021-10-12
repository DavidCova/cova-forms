<div>
    @include('blocks.forms.input-number',['identifier' => $col,'label' => false,'js' => "wire:dirty.class=border-info wire:model.lazy=new_value",'step' => $step])
</div>
