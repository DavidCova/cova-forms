<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DynamicReceiverSender extends Component
{
    public $col;
    public $label;
    public $key;
    public $value;
    public $current;
    public $receiver_sender;

    public $category;
    public $options = [];
    public $model;
    public $parent;
    public $instance;
    public $emits_to;
    protected $listeners = ['receiverSender'];
    
    public function mount(){
        $model = $this->model;
        
        $path = "App\Models";
        $this->instance = $path."\\". $model;
        $instance = new $this->instance;
        if($this->current != null)
        {
            $cb = $this->instance::find($this->current);
            $this->options = $this->instance::where($this->parent,'=',$cb->court_id)->get();
            $this->receiver_sender = $this->current;
        }
      
    }

    public function render()
    {
        return view('livewire.dynamic-receiver-sender');
    }

    public function updated()
    {
        $this->emitTo($this->emits_to,'receiver', $this->receiver_sender);
    }
    
    public function receiverSender($parent_id)
    {
        $this->options = $this->instance::where($this->parent,'=',$parent_id)->get();
    }
}
