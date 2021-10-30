<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Courtbranch;

class DynamicReceiver extends Component
{
    public $col;
    public $label;
    public $key;
    public $value;
    public $current;
    public $receiver;

    public $category;
    public $options = [];
    public $model;
    public $parent;
    public $instance;
    protected $listeners = ['receiver'];
    
    public function mount(){
        $model = $this->model;
        
        $path = "App\Models";
        $this->instance = $path."\\". $model;
        $instance = new $this->instance;
        if($this->current != null)
        {
            $cb = $this->instance::find($this->current);
            $this->options = $this->instance::where($this->parent,'=',$cb->court_id)->get();
            $this->receiver = $this->current;
        }
      
    }

    public function render()
    {
        return view('livewire.dynamic-receiver');
    }

    public function receiver($parent_id)
    {
        $this->options = $this->instance::where($this->parent,'=',$parent_id)->get();
        // return view('livewire.dynamic-receiver');
    }
}