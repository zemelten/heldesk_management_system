<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\Leader;
use Livewire\Component;
use App\Models\ServiceUnit;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LeaderServiceUnitsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Leader $leader;
    public ServiceUnit $serviceUnit;
    public $unitsForSelect = [];

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
        'serviceUnit.unit_id' => ['nullable', 'exists:units,id'],
    ];

    public function mount(Leader $leader)
    {
        $this->leader = $leader;
        $this->unitsForSelect = Unit::pluck('telephone', 'id');
        $this->resetServiceUnitData();
    }

    public function resetServiceUnitData()
    {
        $this->serviceUnit = new ServiceUnit();

        $this->serviceUnit->unit_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newServiceUnit()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.leader_service_units.new_title');
        $this->resetServiceUnitData();

        $this->showModal();
    }

    public function editServiceUnit(ServiceUnit $serviceUnit)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.leader_service_units.edit_title');
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

        if (!$this->serviceUnit->leader_id) {
            $this->authorize('create', ServiceUnit::class);

            $this->serviceUnit->leader_id = $this->leader->id;
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

        foreach ($this->leader->serviceUnits as $serviceUnit) {
            array_push($this->selected, $serviceUnit->id);
        }
    }

    public function render()
    {
        return view('livewire.leader-service-units-detail', [
            'serviceUnits' => $this->leader->serviceUnits()->paginate(20),
        ]);
    }
}
