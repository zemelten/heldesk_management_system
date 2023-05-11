@php $editing = isset($ticket) @endphp
<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        @can('create', App\Models\Ticket::class)
            <button class="btn btn-prfimary">
                <i class="icon ion-md-addd"></i>

            </button>
            @endcan @can('delete-any', App\Models\Ticket::class)
            {{-- <button class="btfdn bdftn-fddanger" {{ empty($selected) ? 'disabled' : '' }}
                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="destroySelected">
                <i class="icon ion-md-tdsrash"></i>
                
            </button> --}}
        @endcan
    </div>

    <x-modal id="user-support-tickets-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <div>
                    <div id="first">
                        <x-inputs.group class="col-md-12">
                            <x-inputs.select name="status" label="Status"  id="status"
                                onchange="showDiv('status',['reason','comment'])" wire:model="ticket.status">
                                @php $selected = old('status', ($editing ? $ticket->status : '')) @endphp
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Change Status</option>
                                <option value="0">Active</option>
                                <option value="2">Escalate</option>
                                <option value="3">Close</option>
                                <option value="4">Customer found Solution</option>
                                <option value="5">Customer Unreachable</option>
                                <option value="6">SPAM</option>

                            </x-inputs.select>

                        </x-inputs.group>
                    </div>

                    <div id="reason" style="display:none;">


                        <x-inputs.group class="col-md-12">
                            <x-inputs.select name="queue_type_id" label="Queue Type" id="queue_type_id">
                                @php $selected = old('queue_type_id', ($editing ? $ticket->queue_type_id : '')) @endphp
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Queue Type</option>

                                <option value="2">fgd
                                </option>

                            </x-inputs.select>
                        </x-inputs.group>

                        <x-inputs.group class="col-md-12">
                            <x-inputs.textarea rows=2 type="text" id="reason" label="Reason" name="reason" />
                        </x-inputs.group>
                    </div>
                    <div id="comment">
                        <x-inputs.group class="col-md-12">
                            <x-inputs.textarea rows=2 type="text" id="comment" label="Comment" name="comment" />
                        </x-inputs.group>
                    </div>

                </div>
            </div>

            @if ($editing)
            @endif

            <div class="modal-footer">
                <button type="button" class="btn btn-light float-left" wire:click="$toggle('showingModal')">
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
    @php
        $ticketsArray = [];
        foreach ($activeTickets as $key => $ticket) {
            # code...
            array_push($ticketsArray, $ticket);
        }
    @endphp
    <x-ticket :tickets="$ticketsArray" />
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Get the status select field and add an event listener

    function showDiv(selectId, divId) {
        const select = document.getElementById(selectId);
        const div = document.getElementById(divId[0]);
        const divcom = document.getElementById(divId[1]);
console.log(select.value);
        if (select.value == 2) {
            div.style.display = 'block';
            divcom.style.display = 'none';

        } else {
           
            divcom.style.display = 'block';
 
        }
    }

</script>
