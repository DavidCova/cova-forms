<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdaterTextarea extends Component
{
    public $current;
    public $model;
    public $column;
    public $user_id;

    public function mount()
    {        
        $instance = new $this->model();
        $this->item = $instance::whereUserId(intval($this->user_id))->first();
        $column = $this->column;    
        ($this->item) ? $this->fill(['current' => $this->item->$column]) : $this->fill(['current' => '']);
        
    }
    public function updatedCurrent()
    {
        $column = $this->column;
        if($this->item != null){
            $this->item->$column = $this->current;
            $this->item->save();
            //dump($this->data,$column,$this->item,$this->item->$column, $this->current);
        }else{
            $this->model::create([
                'user_id' => $this->user_id,
                'saved_by' => Auth::user()->id,
                'notes' => $this->current
            ]);
            //dump("cenas");
        }
    }

    public function updating()
    {
        $column = $this->column;
        if($this->item != null){
            $this->item->$column = $this->current;
            $this->item->save();
            //dump($this->data,$column,$this->item,$this->item->$column, $this->current);
        }else{
            $this->model::create([
                'user_id' => $this->user_id,
                'saved_by' => Auth::user()->id,
                'notes' => $this->current
            ]);
            //dump("cenas");
        }
        $this->mount();
        //dump("updating");
    }
    public function updated()
    {
        //dump("Updated");
    }

    public function render()
    {
        return view('livewire.updater-textarea');
    }

}
