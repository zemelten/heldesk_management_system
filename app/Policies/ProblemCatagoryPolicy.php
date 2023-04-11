<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProblemCatagory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemCatagoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the problemCatagory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list problemcatagories');
    }

    /**
     * Determine whether the problemCatagory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProblemCatagory  $model
     * @return mixed
     */
    public function view(User $user, ProblemCatagory $model)
    {
        return $user->hasPermissionTo('view problemcatagories');
    }

    /**
     * Determine whether the problemCatagory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create problemcatagories');
    }

    /**
     * Determine whether the problemCatagory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProblemCatagory  $model
     * @return mixed
     */
    public function update(User $user, ProblemCatagory $model)
    {
        return $user->hasPermissionTo('update problemcatagories');
    }

    /**
     * Determine whether the problemCatagory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProblemCatagory  $model
     * @return mixed
     */
    public function delete(User $user, ProblemCatagory $model)
    {
        return $user->hasPermissionTo('delete problemcatagories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProblemCatagory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete problemcatagories');
    }

    /**
     * Determine whether the problemCatagory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProblemCatagory  $model
     * @return mixed
     */
    public function restore(User $user, ProblemCatagory $model)
    {
        return false;
    }

    /**
     * Determine whether the problemCatagory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProblemCatagory  $model
     * @return mixed
     */
    public function forceDelete(User $user, ProblemCatagory $model)
    {
        return false;
    }
}
