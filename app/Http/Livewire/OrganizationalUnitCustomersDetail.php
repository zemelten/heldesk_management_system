<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Floor;
use App\Models\Campus;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Building;
use Livewire\WithPagination;
use App\Models\OrganizationalUnit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrganizationalUnitCustomersDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public OrganizationalUnit $organizationalUnit;
    public Customer $customer;
    public $buildingsForSelect = [];
    public $campusesForSelect = [];
    public $floorsForSelect = [];
    public $usersForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Customer';

    protected $rules = [
        'customer.full_name' => ['nullable', 'max:255', 'string'],
        'customer.email' => ['nullable', 'email'],
        'customer.phone_no' => ['nullable', 'max:255', 'string'],
        'customer.building_id' => ['nullable', 'exists:buildings,id'],
        'customer.campus_id' => ['nullable', 'exists:campuses,id'],
        'customer.floor_id' => ['nullable', 'exists:floors,id'],
        'customer.user_id' => ['nullable', 'exists:users,id'],
        'customer.is_edited' => ['nullable', 'max:255'],
        'customer.office_num' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(OrganizationalUnit $organizationalUnit)
    {
        $this->organizationalUnit = $organizationalUnit;
        $this->buildingsForSelect = Building::pluck('name', 'id');
        $this->campusesForSelect = Campus::pluck('name', 'id');
        $this->floorsForSelect = Floor::pluck('name', 'id');
        $this->usersForSelect = User::pluck('full_name', 'id');
        $this->resetCustomerData();
    }

    public function resetCustomerData()
    {
        $this->customer = new Customer();

        $this->customer->building_id = null;
        $this->customer->campus_id = null;
        $this->customer->floor_id = null;
        $this->customer->user_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newCustomer()
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.organizational_unit_customers.new_title'
        );
        $this->resetCustomerData();

        $this->showModal();
    }

    public function editCustomer(Customer $customer)
    {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.organizational_unit_customers.edit_title'
        );
        $this->customer = $customer;

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

        if (!$this->customer->organizational_unit_id) {
            $this->authorize('create', Customer::class);

            $this->customer->organizational_unit_id =
                $this->organizationalUnit->id;
        } else {
            $this->authorize('update', $this->customer);
        }

        $this->customer->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Customer::class);

        Customer::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetCustomerData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->organizationalUnit->customers as $customer) {
            array_push($this->selected, $customer->id);
        }
    }

    public function render()
    {
        return view('livewire.organizational-unit-customers-detail', [
            'customers' => $this->organizationalUnit->customers()->paginate(20),
        ]);
    }
}
