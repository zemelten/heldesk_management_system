<div>
    <div class="mb-4">
        @can('create', App\Models\Ticket::class)
    <button class="btn sabxtn-prnhyhimary" wire:click="newTsdicket">
           
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
    @php
    // @dd($tickets[1])
    $ticketsArray = array();
    foreach ($tickets as $key => $ticket) {
        # code...
        array_push($ticketsArray, $ticket);
    }
    //dd($ticketsArray);
    @endphp
    <x-ticket :tickets="$ticketsArray" />

</div>
