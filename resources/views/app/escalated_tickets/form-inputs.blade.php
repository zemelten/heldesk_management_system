@php $editing = isset($escalatedTicket) @endphp

<div class="row">
    {{-- <x-inputs.group class="col-md-12">
        <x-inputs.select name="ticket_id" label="Assign Ticket">
            @php $selected = old('ticket_id', ($editing ? $escalatedTicket->ticket_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Ticket</option>
            @foreach($user_sup as $support=>$userSupports)
            @php $type = $userSupports->queueType->queue_name; @endphp
            @foreach($userSupports->userSupports as $user)
             
            <option value="{{ $user->user->id }}" {{ $selected == $user->user->full_name ? 'selected' : '' }} >{{ $user->user->full_name}} 
      
        
            </option>
            @endforeach
            @endforeach
           
        </x-inputs.select>
    </x-inputs.group> --}}

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="user_support_id" label="Assign Ticket">
            @php $selected = old('user_support_id', ($editing ? $escalatedTicket->user_support_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User Support</option>
            @foreach($user_sup as $support=>$userSupports)
            @php $type = $userSupports->queueType->queue_name; @endphp
            @foreach($userSupports->userSupports as $user)
             
             @if($user->user->id !=$escalated_by )
            <option value="{{ $user->id }}" {{ $selected == $user->user->full_name ? 'selected' : '' }} >{{ $user->user->full_name}}
                <div class="badge badge-warning">
               
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="badge badge-warning">{{ $type }}</span>
                  </div>
            </option>
            @endif
            @endforeach
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    {{-- <x-inputs.group class="col-md-12">
        <x-inputs.select name="queue_type_id" label="Queue Type">
            @php $selected = old('queue_type_id', ($editing ? $escalatedTicket->queue_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Queue Type</option>
            @foreach($queueTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group> --}}
</div>
