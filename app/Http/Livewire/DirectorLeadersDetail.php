<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Leader;
use Livewire\Component;
use App\Models\Director;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DirectorLeadersDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Director $director;
    public Leader $leader;
    public $usersForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Leader';

    protected $rules = [
        'leader.full_name' => ['nullable', 'max:255', 'string'],
        'leader.sex' => ['nullable', 'in:male,female,other'],
        'leader.phone' => ['nullable', 'max:255', 'string'],
        'leader.email' => ['nullable', 'email'],
        'leader.user_id' => ['nullable', 'exists:users,id'],
    ];

    public function mount(Director $director)
    {
        $this->director = $director;
        $this->usersForSelect = User::pluck('full_name', 'id');
        $this->resetLeaderData();
    }

    public function resetLeaderData()
    {
        $this->leader = new Leader();

        $this->leader->sex = 'male';
        $this->leader->user_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newLeader()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.director_leaders.new_title');
        $this->resetLeaderData();

        $this->showModal();
    }

    public function editLeader(Leader $leader)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.director_leaders.edit_title');
        $this->leader = $leader;

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

        if (!$this->leader->director_id) {
            $this->authorize('create', Leader::class);

            $this->leader->director_id = $this->director->id;
        } else {
            $this->authorize('update', $this->leader);
        }

        $this->leader->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Leader::class);

        Leader::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetLeaderData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->director->leaders as $leader) {
            array_push($this->selected, $leader->id);
        }
    }

    public function render()
    {
        return view('livewire.director-leaders-detail', [
            'leaders' => $this->director->leaders()->paginate(20),
        ]);
    }
}
