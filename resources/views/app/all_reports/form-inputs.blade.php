@php $editing = isset($reports) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.select name="user_support_id" label="User Support" required>
            @php $selected = old('user_support_id', ($editing ? $reports->user_support_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User Support</option>
            @foreach($userSupports as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
