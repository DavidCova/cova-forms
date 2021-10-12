<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputSelectSearch extends Component
{

    public $query;
    public $identifier;
    public $identifier_val; //for the hidden input that sends the key instead of the option
    public $key;
    public $option;
    public $results;
    public $highlightIndex;
    public $column;
    public $model;

    
    public function mount()
    {
        $identifier_val = $this->identifier_val;
        $identifier = $this->identifier;
        $model = new $this->model;
        $this->resetar();
    }

    public function resetar()
    {
        // $this->query = '';
        $identifier = $this->identifier;
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

    public function selectOption($key)
    {
        // dd($this->results[$this->highlightIndex][$this->key]);
        $results = $this->results[$this->highlightIndex] ?? null;
        if ($results) {
            $this->query = $this->results[$this->highlightIndex][$this->option];
            $this->identifier_val = $key;
        }
    }

    public function updatedQuery()
    {
        $this->results = $this->model::where($this->column, 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.input-select-search');
    }
}
