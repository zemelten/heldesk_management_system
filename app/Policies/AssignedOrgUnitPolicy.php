<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AssignedOrgUnit;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignedOrgUnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the assignedOrgUnit can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list assignedorgunits');
    }

    /**
     * Determine whether the assignedOrgUnit can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOrgUnit  $model
     * @return mixed
     */
    public function view(User $user, AssignedOrgUnit $model)
    {
        return $user->hasPermissionTo('view assignedorgunits');
    }

    /**
     * Determine whether the assignedOrgUnit can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create assignedorgunits');
    }

    /**
     * Determine whether the assignedOrgUnit can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOrgUnit  $model
     * @return mixed
     */
    public function update(User $user, AssignedOrgUnit $model)
    {
        return $user->hasPermissionTo('update assignedorgunits');
    }

    /**
     * Determine whether the assignedOrgUnit can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOrgUnit  $model
     * @return mixed
     */
    public function delete(User $user, AssignedOrgUnit $model)
    {
        return $user->hasPermissionTo('delete assignedorgunits');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOrgUnit  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete assignedorgunits');
    }

    /**
     * Determine whether the assignedOrgUnit can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOrgUnit  $model
     * @return mixed
     */
    public function restore(User $user, AssignedOrgUnit $model)
    {
        return false;
    }

    /**
     * Determine whether the assignedOrgUnit can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOrgUnit  $model
     * @return mixed
     */
    public function forceDelete(User $user, AssignedOrgUnit $model)
    {
        return false;
    }
}
