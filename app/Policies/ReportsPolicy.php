<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reports;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the reports can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allreports');
    }

    /**
     * Determine whether the reports can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reports  $model
     * @return mixed
     */
    public function view(User $user, Reports $model)
    {
        return $user->hasPermissionTo('view allreports');
    }

    /**
     * Determine whether the reports can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allreports');
    }

    /**
     * Determine whether the reports can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reports  $model
     * @return mixed
     */
    public function update(User $user, Reports $model)
    {
        return $user->hasPermissionTo('update allreports');
    }

    /**
     * Determine whether the reports can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reports  $model
     * @return mixed
     */
    public function delete(User $user, Reports $model)
    {
        return $user->hasPermissionTo('delete allreports');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reports  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allreports');
    }

    /**
     * Determine whether the reports can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reports  $model
     * @return mixed
     */
    public function restore(User $user, Reports $model)
    {
        return false;
    }

    /**
     * Determine whether the reports can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reports  $model
     * @return mixed
     */
    public function forceDelete(User $user, Reports $model)
    {
        return false;
    }
}
