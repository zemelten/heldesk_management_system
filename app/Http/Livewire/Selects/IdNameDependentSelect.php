<?php

namespace App\Http\Livewire\Selects;

use Livewire\Component;
use App\Models\Building;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IdNameDependentSelect extends Component
{
    use AuthorizesRequests;

    public $allIds;
    public $allNames;

    public $selectedId;
    public $selectedName;

    protected $rules = [
        'selectedId' => ['required', 'max:255'],
        'selectedName' => ['nullable', 'max:255', 'string'],
    ];

    public function mount($building)
    {
        $this->clearData();
        $this->fillAllIds();

        if (is_null($building)) {
            return;
        }

        $building = Building::findOrFail($building);

        $this->selectedId = $building->id;

        $this->fillAllNames();
        $this->selectedName = $building->name;
    }

    public function updatedSelectedId()
    {
        $this->selectedName = null;
        $this->fillAllNames();
    }

    public function fillAllIds()
    {
        $this->allIds = [];
    }

    public function fillAllNames()
    {
        if (!$this->selectedId) {
            return;
        }

        $names = [];

        if (!isset($names[$this->selectedId])) {
            $this->selectedName = null;
            $this->allNames = [];
            return;
        }

        $this->allNames = $names[$this->selectedId];
    }

    public function clearData()
    {
        $this->allIds = null;
        $this->allNames = null;

        $this->selectedId = null;
        $this->selectedName = null;
    }

    public function render()
    {
        return view('livewire.selects.id-name-dependent-select');
    }
}
