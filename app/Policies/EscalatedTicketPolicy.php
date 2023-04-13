<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EscalatedTicket;
use Illuminate\Auth\Access\HandlesAuthorization;

class EscalatedTicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the escalatedTicket can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list escalatedtickets');
    }

    /**
     * Determine whether the escalatedTicket can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EscalatedTicket  $model
     * @return mixed
     */
    public function view(User $user, EscalatedTicket $model)
    {
        return $user->hasPermissionTo('view escalatedtickets');
    }

    /**
     * Determine whether the escalatedTicket can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create escalatedtickets');
    }

    /**
     * Determine whether the escalatedTicket can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EscalatedTicket  $model
     * @return mixed
     */
    public function update(User $user, EscalatedTicket $model)
    {
        return $user->hasPermissionTo('update escalatedtickets');
    }

    /**
     * Determine whether the escalatedTicket can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EscalatedTicket  $model
     * @return mixed
     */
    public function delete(User $user, EscalatedTicket $model)
    {
        return $user->hasPermissionTo('delete escalatedtickets');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EscalatedTicket  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete escalatedtickets');
    }

    /**
     * Determine whether the escalatedTicket can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EscalatedTicket  $model
     * @return mixed
     */
    public function restore(User $user, EscalatedTicket $model)
    {
        return false;
    }

    /**
     * Determine whether the escalatedTicket can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EscalatedTicket  $model
     * @return mixed
     */
    public function forceDelete(User $user, EscalatedTicket $model)
    {
        return false;
    }
}
