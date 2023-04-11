<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ServiceUnit;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceUnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the serviceUnit can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list serviceunits');
    }

    /**
     * Determine whether the serviceUnit can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceUnit  $model
     * @return mixed
     */
    public function view(User $user, ServiceUnit $model)
    {
        return $user->hasPermissionTo('view serviceunits');
    }

    /**
     * Determine whether the serviceUnit can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create serviceunits');
    }

    /**
     * Determine whether the serviceUnit can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceUnit  $model
     * @return mixed
     */
    public function update(User $user, ServiceUnit $model)
    {
        return $user->hasPermissionTo('update serviceunits');
    }

    /**
     * Determine whether the serviceUnit can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceUnit  $model
     * @return mixed
     */
    public function delete(User $user, ServiceUnit $model)
    {
        return $user->hasPermissionTo('delete serviceunits');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceUnit  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete serviceunits');
    }

    /**
     * Determine whether the serviceUnit can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceUnit  $model
     * @return mixed
     */
    public function restore(User $user, ServiceUnit $model)
    {
        return false;
    }

    /**
     * Determine whether the serviceUnit can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ServiceUnit  $model
     * @return mixed
     */
    public function forceDelete(User $user, ServiceUnit $model)
    {
        return false;
    }
}
