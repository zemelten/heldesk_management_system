<div>
    <div class="mb-4">
        @can('create', App\Models\Ticket::class)
        <button class="btn btn-primary" wire:click="newTicket">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Ticket::class)
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

    <x-modal id="reports-tickets-modal" wire:model="showingModal">
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
                            name="ticket.status"
                            label="Status"
                            wire:model="ticket.status"
                            maxlength="255"
                            placeholder="Status"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.textarea
                            name="ticket.description"
                            label="Description"
                            wire:model="ticket.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="ticket.campuse_id"
                            label="Campuse"
                            wire:model="ticket.campuse_id"
                        >
                            <option value="null" disabled>Please select the Campus</option>
                            @foreach($campusesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="ticket.customer_id"
                            label="Customer"
                            wire:model="ticket.customer_id"
                        >
                            <option value="null" disabled>Please select the Customer</option>
                            @foreach($customersForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="ticket.problem_id"
                            label="Problem"
                            wire:model="ticket.problem_id"
                        >
                            <option value="null" disabled>Please select the Problem</option>
                            @foreach($problemsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="ticket.organizational_unit_id"
                            label="Organizational Unit"
                            wire:model="ticket.organizational_unit_id"
                        >
                            <option value="null" disabled>Please select the Organizational Unit</option>
                            @foreach($organizationalUnitsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="ticket.user_support_id"
                            label="User Support"
                            wire:model="ticket.user_support_id"
                        >
                            <option value="null" disabled>Please select the User Support</option>
                            @foreach($userSupportsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="ticket.prioritie_id"
                            label="Prioritie"
                            wire:model="ticket.prioritie_id"
                        >
                            <option value="null" disabled>Please select the Prioritie</option>
                            @foreach($prioritiesForSelect as $value => $label)
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
                        @lang('crud.reports_tickets.inputs.status')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.description')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.campuse_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.customer_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.problem_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.organizational_unit_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.user_support_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.reports_tickets.inputs.prioritie_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($tickets as $ticket)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $ticket->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $ticket->status ?? '-' }}</td>
                    <td class="text-left">{{ $ticket->description ?? '-' }}</td>
                    <td class="text-left">
                        {{ optional($ticket->campuse)->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($ticket->customer)->full_name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($ticket->problem)->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($ticket->organizationalUnit)->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($ticket->userSupport)->id ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($ticket->prioritie)->name ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $ticket)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editTicket({{ $ticket->id }})"
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
                    <td colspan="9">{{ $tickets->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
