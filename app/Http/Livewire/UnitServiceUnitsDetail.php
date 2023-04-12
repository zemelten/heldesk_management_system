<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\Leader;
use Livewire\Component;
use App\Models\ServiceUnit;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UnitServiceUnitsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Unit $unit;
    public ServiceUnit $serviceUnit;
    public $leadersForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New ServiceUnit';

    protected $rules = [
        'serviceUnit.name' => ['nullable', 'max:255', 'string'],
        'serviceUnit.telephone' => ['nullable', 'max:255', 'string'],
        'serviceUnit.fax' => ['nullable', 'max:255'],
        'serviceUnit.email' => ['nullable', 'email'],
        'serviceUnit.discription' => ['nullable', 'max:255', 'string'],
        'serviceUnit.leader_id' => ['nullable', 'exists:leaders,id'],
    ];

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->leadersForSelect = Leader::pluck('full_name', 'id');
        $this->resetServiceUnitData();
    }

    public function resetServiceUnitData()
    {
        $this->serviceUnit = new ServiceUnit();

        $this->serviceUnit->leader_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newServiceUnit()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.unit_service_units.new_title');
        $this->resetServiceUnitData();

        $this->showModal();
    }

    public function editServiceUnit(ServiceUnit $serviceUnit)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.unit_service_units.edit_title');
        $this->serviceUnit = $serviceUnit;

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

        if (!$this->serviceUnit->unit_id) {
            $this->authorize('create', ServiceUnit::class);

            $this->serviceUnit->unit_id = $this->unit->id;
        } else {
            $this->authorize('update', $this->serviceUnit);
        }

        $this->serviceUnit->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', ServiceUnit::class);

        ServiceUnit::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetServiceUnitData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->unit->serviceUnits as $serviceUnit) {
            array_push($this->selected, $serviceUnit->id);
        }
    }

    public function render()
    {
        return view('livewire.unit-service-units-detail', [
            'serviceUnits' => $this->unit->serviceUnits()->paginate(20),
        ]);
    }
}
