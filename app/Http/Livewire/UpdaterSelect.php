<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdaterSelect extends Component
{
    public $new_value;
    public $col;
    public $model;
    public $current;
    public $rules;
    public $options;
    public $changedValue;

    public function mount()
    {
        $this->new_value = $this->current;
        $this->changedValue = $this->current;
        $rules = $this->rules;
    }
    public function testChange(){
        
        dd($this->current,$this->changedValue);
    }
    
    public function updated()
    {
        if($this->rules){
            $this->validate(['new_value' => $this->rules]);
        }
        $this->model[$this->col] = $this->changedValue;
        $this->model->save();
    }

    public function render()
    {
        return view('livewire.updater-select');
    }
}
