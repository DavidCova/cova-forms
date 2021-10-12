<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdaterNumber extends Component
{
    public $new_value;
    public $col;
    public $model;
    public $current;
    public $rules;
    public $step;

    public function mount()
    {
        $this->new_value = $this->current;
        $rules = $this->rules;
    }
    
    public function updated()
    {
        if($this->rules){
            $this->validate(['new_value' => $this->rules]);
        }        
        $this->model[$this->col] = $this->new_value;
        $this->model->save();
    }

    public function render()
    {
        return view('livewire.updater-number');
    }
}
