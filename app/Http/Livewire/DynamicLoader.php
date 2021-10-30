<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DynamicLoader extends Component
{
    public $new_value;
    public $col;
    
    public $model;
    public $current;
    public $options;
    public $loader;
    public $key; //render properties
    public $value; //render properties
    public $label; //render properties
    public $instance;
    public $emits_to;
    public $emit_function;

    public function mount ()
    {
        $model = $this->model;
        $path = "App\Models";
        $instance = $path."\\". $model;
        $this->instance = new $instance;

        if($this->options == null){
            $this->options = $instance::all();
        }
        
        $this->new_value = $this->current;
        $this->loader = $this->current;
        ($this->current != null) ?: $this->updated();
    }

    public function render()
    {
        return view('livewire.dynamic-loader');
    }

    public function updated()
    {        
        if($this->emit_function == 'receiverSender'){
            $this->emitTo($this->emits_to,$this->emit_function, $this->loader);
            $this->emitTo($this->emits_to,'receiver', "");
        }else{
            $this->emitTo($this->emits_to,$this->emit_function, $this->loader);
        }
    }
}
