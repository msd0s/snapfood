<?php

namespace App\Policies;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return auth()->user()->role==User::ROLE_SELLER ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Schedule $schedule)
    {
        return auth()->user()->role==User::ROLE_SELLER ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return auth()->user()->role==User::ROLE_SELLER ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Schedule $schedule)
    {
        return auth()->user()->role==User::ROLE_SELLER ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Schedule $schedule)
    {
        return auth()->user()->role==User::ROLE_SELLER ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Schedule $schedule)
    {
        //
    }
}
