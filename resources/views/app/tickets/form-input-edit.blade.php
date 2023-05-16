@php $editing = isset($ticket) @endphp

<div class="col">

    <x-inputs.group class="col-md-6">
        <x-inputs.select name="status" label="Status" id="status" onchange="showDiv('status','reason')">
            @php $selected = old('status', ($editing ? $ticket->status : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Change Status</option>
            <option value="0">Active</option>
            <option value="1">Problem Solved</option>
            <option value="2">Escalated</option>
            <option value="3">Closed</option>
            <option value="4">Customer found Solution</option>
            <option value="5">Customer Unreachable</option>
            <option value="6">SPAM</option>



        </x-inputs.select>

    </x-inputs.group>

    <div id="reason" style="display:none;">


        <x-inputs.group class="col-md-6">
            <x-inputs.select name="queue_type_id" label="Queue Type" id="queue_type_id">
                @php $selected = old('queue_type_id', ($editing ? $ticket->queue_type_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Queue Type</option>
                @foreach ($queue as $value => $label)
                    <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}
                    </option>
                @endforeach
            </x-inputs.select>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.textarea rows=2 type="text" id="reason" label="Reason" name="reason" />
        </x-inputs.group>
    </div>
</div>
