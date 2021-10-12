<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdaterFile extends Component
{
    use WithFileUploads;

    public $new_value;
    public $col;
    public $model;
    public $save_path;
    public $rules;

    public function mount()
    {
        
    }
    
    public function updated()
    {
        if($this->rules){
            $this->validate(['new_value.*' => $this->rules]);
        }        
        // foreach ($this->photos as $photo) {
        //     $photo->store('photos');
        // }
        $path = $this->new_value->store($this->save_path);
        $this->model[$this->col] = $path;
        $this->model->save();
    }

    public function render()
    {
        return view('livewire.updater-file');
    }

}
