<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Campus;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the campus can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list campuses');
    }

    /**
     * Determine whether the campus can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Campus  $model
     * @return mixed
     */
    public function view(User $user, Campus $model)
    {
        return $user->hasPermissionTo('view campuses');
    }

    /**
     * Determine whether the campus can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create campuses');
    }

    /**
     * Determine whether the campus can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Campus  $model
     * @return mixed
     */
    public function update(User $user, Campus $model)
    {
        return $user->hasPermissionTo('update campuses');
    }

    /**
     * Determine whether the campus can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Campus  $model
     * @return mixed
     */
    public function delete(User $user, Campus $model)
    {
        return $user->hasPermissionTo('delete campuses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Campus  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete campuses');
    }

    /**
     * Determine whether the campus can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Campus  $model
     * @return mixed
     */
    public function restore(User $user, Campus $model)
    {
        return false;
    }

    /**
     * Determine whether the campus can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Campus  $model
     * @return mixed
     */
    public function forceDelete(User $user, Campus $model)
    {
        return false;
    }
}
