<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdaterEmail extends Component
{
    public $new_value;
    public $col;
    public $model;
    public $current;
    public $rules;

    public function mount()
    {
        $this->new_value = $this->current;
        $rules = $this->rules;
    }
    
    public function updated()
    {
        if($this->rules){
            $this->validate(['new_value' => array_push($this->rules,'email'),]);
        }        
        $this->model[$this->col] = $this->new_value;
        $this->model->save();
    }

    public function render()
    {
        return view('livewire.updater-email');
    }
}
