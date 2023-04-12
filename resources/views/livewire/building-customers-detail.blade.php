<div>
    <div class="mb-4">
        @can('create', App\Models\Customer::class)
        <button class="btn btn-primary" wire:click="newCustomer">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Customer::class)
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

    <x-modal id="building-customers-modal" wire:model="showingModal">
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
                            name="customer.full_name"
                            label="Full Name"
                            wire:model="customer.full_name"
                            maxlength="255"
                            placeholder="Full Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.email
                            name="customer.email"
                            label="Email"
                            wire:model="customer.email"
                            maxlength="255"
                            placeholder="Email"
                        ></x-inputs.email>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="customer.phone_no"
                            label="Phone No"
                            wire:model="customer.phone_no"
                            maxlength="255"
                            placeholder="Phone No"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="customer.campus_id"
                            label="Campus"
                            wire:model="customer.campus_id"
                        >
                            <option value="null" disabled>Please select the Campus</option>
                            @foreach($campusesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="customer.organizational_unit_id"
                            label="Organizational Unit"
                            wire:model="customer.organizational_unit_id"
                        >
                            <option value="null" disabled>Please select the Organizational Unit</option>
                            @foreach($organizationalUnitsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="customer.floor_id"
                            label="Floor"
                            wire:model="customer.floor_id"
                        >
                            <option value="null" disabled>Please select the Floor</option>
                            @foreach($floorsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="customer.user_id"
                            label="User"
                            wire:model="customer.user_id"
                        >
                            <option value="null" disabled>Please select the User</option>
                            @foreach($usersForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="customer.is_edited"
                            label="Is Edited"
                            wire:model="customer.is_edited"
                            maxlength="255"
                            placeholder="Is Edited"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.text
                            name="customer.office_num"
                            label="Office Num"
                            wire:model="customer.office_num"
                            maxlength="255"
                            placeholder="Office Num"
                        ></x-inputs.text>
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
                        @lang('crud.building_customers.inputs.full_name')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.email')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.phone_no')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.campus_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.organizational_unit_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.floor_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.user_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.is_edited')
                    </th>
                    <th class="text-left">
                        @lang('crud.building_customers.inputs.office_num')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($customers as $customer)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $customer->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $customer->full_name ?? '-' }}</td>
                    <td class="text-left">{{ $customer->email ?? '-' }}</td>
                    <td class="text-left">{{ $customer->phone_no ?? '-' }}</td>
                    <td class="text-left">
                        {{ optional($customer->campus)->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($customer->organizationalUnit)->name ?? '-'
                        }}
                    </td>
                    <td class="text-left">
                        {{ optional($customer->floor)->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($customer->user)->full_name ?? '-' }}
                    </td>
                    <td class="text-left">{{ $customer->is_edited ?? '-' }}</td>
                    <td class="text-left">
                        {{ $customer->office_num ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $customer)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editCustomer({{ $customer->id }})"
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
                    <td colspan="10">{{ $customers->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
