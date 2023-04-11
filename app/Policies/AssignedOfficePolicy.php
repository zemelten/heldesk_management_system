<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AssignedOffice;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignedOfficePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the assignedOffice can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list assignedoffices');
    }

    /**
     * Determine whether the assignedOffice can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOffice  $model
     * @return mixed
     */
    public function view(User $user, AssignedOffice $model)
    {
        return $user->hasPermissionTo('view assignedoffices');
    }

    /**
     * Determine whether the assignedOffice can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create assignedoffices');
    }

    /**
     * Determine whether the assignedOffice can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOffice  $model
     * @return mixed
     */
    public function update(User $user, AssignedOffice $model)
    {
        return $user->hasPermissionTo('update assignedoffices');
    }

    /**
     * Determine whether the assignedOffice can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOffice  $model
     * @return mixed
     */
    public function delete(User $user, AssignedOffice $model)
    {
        return $user->hasPermissionTo('delete assignedoffices');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOffice  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete assignedoffices');
    }

    /**
     * Determine whether the assignedOffice can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOffice  $model
     * @return mixed
     */
    public function restore(User $user, AssignedOffice $model)
    {
        return false;
    }

    /**
     * Determine whether the assignedOffice can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssignedOffice  $model
     * @return mixed
     */
    public function forceDelete(User $user, AssignedOffice $model)
    {
        return false;
    }
}
