<div>
    <div class="mb-4">
        @can('create', App\Models\Leader::class)
        <button class="btn btn-primary" wire:click="newLeader">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Leader::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="director-leaders-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="leader.full_name"
                            label="Full Name"
                            wire:model="leader.full_name"
                            maxlength="255"
                            placeholder="Full Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="leader.sex"
                            label="Sex"
                            wire:model="leader.sex"
                        >
                            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
                            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
                            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="leader.phone"
                            label="Phone"
                            wire:model="leader.phone"
                            maxlength="255"
                            placeholder="Phone"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.email
                            name="leader.email"
                            label="Email"
                            wire:model="leader.email"
                            maxlength="255"
                            placeholder="Email"
                        ></x-inputs.email>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="leader.user_id"
                            label="User"
                            wire:model="leader.user_id"
                        >
                            <option value="null" disabled>Please select the User</option>
                            @foreach($usersForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.director_leaders.inputs.full_name')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_leaders.inputs.sex')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_leaders.inputs.phone')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_leaders.inputs.email')
                    </th>
                    <th class="text-left">
                        @lang('crud.director_leaders.inputs.user_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($leaders as $leader)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $leader->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $leader->full_name ?? '-' }}</td>
                    <td class="text-left">{{ $leader->sex ?? '-' }}</td>
                    <td class="text-left">{{ $leader->phone ?? '-' }}</td>
                    <td class="text-left">{{ $leader->email ?? '-' }}</td>
                    <td class="text-left">
                        {{ optional($leader->user)->full_name ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $leader)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editLeader({{ $leader->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">{{ $leaders->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
