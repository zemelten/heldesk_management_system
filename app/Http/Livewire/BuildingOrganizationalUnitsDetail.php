<?php

namespace App\Http\Livewire;

use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use App\Models\Prioritie;
use Livewire\WithPagination;
use App\Models\OrganizationalUnit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BuildingOrganizationalUnitsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Building $building;
    public OrganizationalUnit $organizationalUnit;
    public $campusesForSelect = [];
    public $prioritiesForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New OrganizationalUnit';

    protected $rules = [
        'organizationalUnit.name' => ['nullable', 'max:255', 'string'],
        'organizationalUnit.offcie_no' => ['nullable', 'numeric'],
        'organizationalUnit.campuse_id' => ['nullable', 'exists:campuses,id'],
        'organizationalUnit.prioritie_id' => [
            'nullable',
            'exists:priorities,id',
        ],
    ];

    public function mount(Building $building)
    {
        $this->building = $building;
        $this->campusesForSelect = Campus::pluck('name', 'id');
        $this->prioritiesForSelect = Prioritie::pluck('name', 'id');
        $this->resetOrganizationalUnitData();
    }

    public function resetOrganizationalUnitData()
    {
        $this->organizationalUnit = new OrganizationalUnit();

        $this->organizationalUnit->campuse_id = null;
        $this->organizationalUnit->prioritie_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newOrganizationalUnit()
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.building_organizational_units.new_title'
        );
        $this->resetOrganizationalUnitData();

        $this->showModal();
    }

    public function editOrganizationalUnit(
        OrganizationalUnit $organizationalUnit
    ) {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.building_organizational_units.edit_title'
        );
        $this->organizationalUnit = $organizationalUnit;

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

        if (!$this->organizationalUnit->building_id) {
            $this->authorize('create', OrganizationalUnit::class);

            $this->organizationalUnit->building_id = $this->building->id;
        } else {
            $this->authorize('update', $this->organizationalUnit);
        }

        $this->organizationalUnit->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', OrganizationalUnit::class);

        OrganizationalUnit::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetOrganizationalUnitData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->building->organizationalUnits as $organizationalUnit) {
            array_push($this->selected, $organizationalUnit->id);
        }
    }

    public function render()
    {
        return view('livewire.building-organizational-units-detail', [
            'organizationalUnits' => $this->building
                ->organizationalUnits()
                ->paginate(20),
        ]);
    }
}
