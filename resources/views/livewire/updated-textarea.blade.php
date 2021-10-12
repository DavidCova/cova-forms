<div>
  <div class="input-group">
    <div  wire:loading class="pe-2 animate-pulse align-self-center">      
        <i class="far fa-save my-auto"></i>        
    </div>
    
    <textarea wire:model.lazy="current" class="form-control mt-3">{{$current}}</textarea>
  </div>
</div>