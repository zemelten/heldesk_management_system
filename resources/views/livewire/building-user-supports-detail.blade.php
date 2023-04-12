<div>
    <div class="mb-4">
        @can('create', App\Models\UserSupport::class)
        <button class="btn btn-primary" wire:click="newUserSupport">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\UserSupport::class)
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

    <x-modal id="building-user-supports-modal" wire:model="showingModal">
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
                        <x-inputs.select
                            name="userSupport.user_id"
                            label="User"
                            wire:model="userSupport.user_id"
                        >
                            <option value="null" disabled>Please select the User</option>
                            @foreach($usersForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="userSupport.user_type"
                            label="User Type"
                            wire:model="userSupport.user_type"
                            maxlength="255"
                            placeholder="User Type"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="userSupport.problem_catagory_id"
                            label="Problem Catagory"
                            wire:model="userSupport.problem_catagory_id"
                        >
                            <option value="null" disabled>Please select the Problem Catagory</option>
                            @foreach($problemCatagoriesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="userSupport.service_unit_id"
                            label="Service Unit"
                            wire:model="userSupport.service_unit_id"
                        >
                            <option value="null" disabled>Please select the Service Unit</option>
                            @foreach($serviceUnitsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="userSupport.unit_id"
                            label="Unit"
                            wire:model="userSupport.unit_id"
                        >
                            <option value="null" disabled>Please select the Unit</option>
                            @foreach($unitsForSelect as $value => $label)
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
                        @lang('crud.building_user_supports.inputs.user_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_user_supports.inputs.user_type')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_user_supports.inputs.problem_catagory_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_user_supports.inputs.service_unit_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_user_supports.inputs.unit_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($userSupports as $userSupport)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $userSupport->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ optional($userSupport->user)->full_name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $userSupport->user_type ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($userSupport->problemCatagory)->name ?? '-'
                        }}
                    </td>
                    <td class="text-left">
                        {{ optional($userSupport->serviceUnit)->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($userSupport->unit)->telephone ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $userSupport)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editUserSupport({{ $userSupport->id }})"
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
                    <td colspan="6">{{ $userSupports->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
