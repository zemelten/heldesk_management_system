@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="username"
            label="Username"
            :value="old('username', ($editing ? $user->username : ''))"
            maxlength="255"
            placeholder="Username"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.text
            name="full_name"
            label="Full Name"
            :value="old('full_name', ($editing ? $user->full_name : ''))"
            maxlength="255"
            placeholder="Full Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-md-12">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <div class="form-group col-md-12 mt-4">
        <h4>Assign @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
