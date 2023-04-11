<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OrganizationalUnit;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationalUnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the organizationalUnit can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list organizationalunits');
    }

    /**
     * Determine whether the organizationalUnit can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrganizationalUnit  $model
     * @return mixed
     */
    public function view(User $user, OrganizationalUnit $model)
    {
        return $user->hasPermissionTo('view organizationalunits');
    }

    /**
     * Determine whether the organizationalUnit can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create organizationalunits');
    }

    /**
     * Determine whether the organizationalUnit can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrganizationalUnit  $model
     * @return mixed
     */
    public function update(User $user, OrganizationalUnit $model)
    {
        return $user->hasPermissionTo('update organizationalunits');
    }

    /**
     * Determine whether the organizationalUnit can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrganizationalUnit  $model
     * @return mixed
     */
    public function delete(User $user, OrganizationalUnit $model)
    {
        return $user->hasPermissionTo('delete organizationalunits');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrganizationalUnit  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete organizationalunits');
    }

    /**
     * Determine whether the organizationalUnit can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrganizationalUnit  $model
     * @return mixed
     */
    public function restore(User $user, OrganizationalUnit $model)
    {
        return false;
    }

    /**
     * Determine whether the organizationalUnit can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrganizationalUnit  $model
     * @return mixed
     */
    public function forceDelete(User $user, OrganizationalUnit $model)
    {
        return false;
    }
}
