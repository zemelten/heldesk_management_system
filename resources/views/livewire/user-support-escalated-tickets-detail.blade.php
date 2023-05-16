<div>
    <div class="mb-4">
        @can('create', App\Models\EscalatedTicket::class)
        <button class="btn btn-primary" wire:click="newEscalatedTicket">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\EscalatedTicket::class)
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

    <x-modal
        id="user-support-escalated-tickets-modal"
        wire:model="showingModal"
    >
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
                            name="escalatedTicket.ticket_id"
                            label="Ticket"
                            wire:model="escalatedTicket.ticket_id"
                        >
                            <option value="null" disabled>Please select the Ticket</option>
                            @foreach($ticketsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select
                            name="escalatedTicket.queue_type_id"
                            label="Queue Type"
                            wire:model="escalatedTicket.queue_type_id"
                        >
                            <option value="null" disabled>Please select the Queue Type</option>
                            @foreach($queueTypesForSelect as $value => $label)
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
        <table class="table table-hover table-condensed">
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
                        @lang('crud.user_support_escalated_tickets.inputs.ticket_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_escalated_tickets.inputs.queue_type_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($escalatedTickets as $escalatedTicket)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $escalatedTicket->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ optional($escalatedTicket->ticket)->description ??
                        '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($escalatedTicket->queueType)->queue_name ??
                        '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $escalatedTicket)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editEscalatedTicket({{ $escalatedTicket->id }})"
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
                    <td colspan="3">{{ $escalatedTickets->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
