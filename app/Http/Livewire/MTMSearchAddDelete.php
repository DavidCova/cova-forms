<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MTMSearchAddDelete extends Component
{
    public $query;
    public $results;
    public $highlightIndex;
    public $column;
    public $search_model;
    public $route;
    public $route_method;
    public $instance;

    public $data;
    public $key;
    public $value;
    public $model;
    public $relationship;

    public function resetar()
    {
        $this->query = '';
        $this->results = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->results) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->results) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function updatedQuery()
    {
        $this->results = $this->search_model::where($this->column, 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }
    public function addEntry()
    {
        $entry = $this->results[$this->highlightIndex] ?? null;
        if($entry)
        {
            $this->add($entry);
        }
    }

    public function mount()
    {
        $data =  $this->data;
        $search_model = new $this->search_model;
        $this->resetar();
    }
    
    public function detach($id)
    {
        $relationship = $this->relationship;
        $this->model->$relationship()->detach($id);
        $this->data = $this->model->$relationship()->get();
    }
    public function add($entry)
   {
    $relationship = $this->relationship;
    $this->model->$relationship()->attach($entry);
    $this->data = $this->model->$relationship()->get();
   }
    
    public function render()
    {
        return view('livewire.m-t-m-search-add-delete');
    }
}
