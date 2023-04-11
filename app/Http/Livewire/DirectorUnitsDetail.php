<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\Campus;
use App\Models\Leader;
use Livewire\Component;
use App\Models\Director;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DirectorUnitsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Director $director;
    public Unit $unit;
    public $campusesForSelect = [];
    public $buildingsForSelect = [];
    public $leadersForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Unit';

    protected $rules = [
        'unit.telephone' => ['required', 'max:255', 'string'],
        'unit.fax' => ['required', 'max:255', 'string'],
        'unit.email' => ['required', 'email'],
        'unit.campuse_id' => ['required', 'exists:campuses,id'],
        'unit.building_id' => ['required', 'exists:buildings,id'],
        'unit.leader_id' => ['required', 'exists:leaders,id'],
    ];

    public function mount(Director $director)
    {
        $this->director = $director;
        $this->campusesForSelect = Campus::pluck('name', 'id');
        $this->buildingsForSelect = Building::pluck('name', 'id');
        $this->leadersForSelect = Leader::pluck('full_name', 'id');
        $this->resetUnitData();
    }

    public function resetUnitData()
    {
        $this->unit = new Unit();

        $this->unit->campuse_id = null;
        $this->unit->building_id = null;
        $this->unit->leader_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newUnit()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.director_units.new_title');
        $this->resetUnitData();

        $this->showModal();
    }

    public function editUnit(Unit $unit)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.director_units.edit_title');
        $this->unit = $unit;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }

    public function save()
    {
        $this->validate();

        if (!$this->unit->director_id) {
            $this->authorize('create', Unit::class);

            $this->unit->director_id = $this->director->id;
        } else {
            $this->authorize('update', $this->unit);
        }

        $this->unit->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Unit::class);

        Unit::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetUnitData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->director->units as $unit) {
            array_push($this->selected, $unit->id);
        }
    }

    public function render()
    {
        return view('livewire.director-units-detail', [
            'units' => $this->director->units()->paginate(20),
        ]);
    }
}
