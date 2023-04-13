@php $editing = isset($escalatedTicket) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.select name="ticket_id" label="Ticket">
            @php $selected = old('ticket_id', ($editing ? $escalatedTicket->ticket_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Ticket</option>
            @foreach($tickets as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="user_support_id" label="User Support">
            @php $selected = old('user_support_id', ($editing ? $escalatedTicket->user_support_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User Support</option>
            @foreach($userSupports as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.select name="queue_type_id" label="Queue Type">
            @php $selected = old('queue_type_id', ($editing ? $escalatedTicket->queue_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Queue Type</option>
            @foreach($queueTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
