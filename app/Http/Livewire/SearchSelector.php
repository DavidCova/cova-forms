<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchSelector extends Component
{

    public $query;
    public $results;
    public $highlightIndex;
    public $column;
    public $model;
    public $route;
    public $route_method;
    public $instance;

    
    public function mount()
    {
        $route_method = $this->route_method;
        $route = $this->route;
        $model = new $this->model;
        $this->resetar();
    }

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

    public function selectItems()
    {
        $results = $this->results[$this->highlightIndex] ?? null;
        if ($results) {
            $this->redirect(route('show-contact', $results['id']));
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
        return view('livewire.search-selector');
    }
}
