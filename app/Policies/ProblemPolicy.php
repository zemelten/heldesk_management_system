<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Problem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the problem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list problems');
    }

    /**
     * Determine whether the problem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Problem  $model
     * @return mixed
     */
    public function view(User $user, Problem $model)
    {
        return $user->hasPermissionTo('view problems');
    }

    /**
     * Determine whether the problem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create problems');
    }

    /**
     * Determine whether the problem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Problem  $model
     * @return mixed
     */
    public function update(User $user, Problem $model)
    {
        return $user->hasPermissionTo('update problems');
    }

    /**
     * Determine whether the problem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Problem  $model
     * @return mixed
     */
    public function delete(User $user, Problem $model)
    {
        return $user->hasPermissionTo('delete problems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Problem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete problems');
    }

    /**
     * Determine whether the problem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Problem  $model
     * @return mixed
     */
    public function restore(User $user, Problem $model)
    {
        return false;
    }

    /**
     * Determine whether the problem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Problem  $model
     * @return mixed
     */
    public function forceDelete(User $user, Problem $model)
    {
        return false;
    }
}
