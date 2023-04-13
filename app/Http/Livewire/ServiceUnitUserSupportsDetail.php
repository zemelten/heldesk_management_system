<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Unit;
use Livewire\Component;
use App\Models\Building;
use App\Models\ServiceUnit;
use App\Models\UserSupport;
use Livewire\WithPagination;
use App\Models\ProblemCatagory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ServiceUnitUserSupportsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public ServiceUnit $serviceUnit;
    public UserSupport $userSupport;
    public $usersForSelect = [];
    public $problemCatagoriesForSelect = [];
    public $buildingsForSelect = [];
    public $unitsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New UserSupport';

    protected $rules = [
        'userSupport.user_id' => ['nullable', 'exists:users,id'],
        'userSupport.user_type' => ['nullable', 'max:255'],
        'userSupport.problem_catagory_id' => [
            'nullable',
            'exists:problem_catagories,id',
        ],
        'userSupport.building_id' => ['nullable', 'exists:buildings,id'],
        'userSupport.unit_id' => ['required', 'exists:units,id'],
    ];

    public function mount(ServiceUnit $serviceUnit)
    {
        $this->serviceUnit = $serviceUnit;
        $this->usersForSelect = User::pluck('full_name', 'id');
        $this->problemCatagoriesForSelect = ProblemCatagory::pluck(
            'name',
            'id'
        );
        $this->buildingsForSelect = Building::pluck('name', 'id');
        $this->unitsForSelect = Unit::pluck('telephone', 'id');
        $this->resetUserSupportData();
    }

    public function resetUserSupportData()
    {
        $this->userSupport = new UserSupport();

        $this->userSupport->user_id = null;
        $this->userSupport->problem_catagory_id = null;
        $this->userSupport->building_id = null;
        $this->userSupport->unit_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newUserSupport()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.service_unit_user_supports.new_title');
        $this->resetUserSupportData();

        $this->showModal();
    }

    public function editUserSupport(UserSupport $userSupport)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.service_unit_user_supports.edit_title');
        $this->userSupport = $userSupport;

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

        if (!$this->userSupport->service_unit_id) {
            $this->authorize('create', UserSupport::class);

            $this->userSupport->service_unit_id = $this->serviceUnit->id;
        } else {
            $this->authorize('update', $this->userSupport);
        }

        $this->userSupport->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', UserSupport::class);

        UserSupport::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetUserSupportData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->serviceUnit->userSupports as $userSupport) {
            array_push($this->selected, $userSupport->id);
        }
    }

    public function render()
    {
        return view('livewire.service-unit-user-supports-detail', [
            'userSupports' => $this->serviceUnit->userSupports()->paginate(20),
        ]);
    }
}
