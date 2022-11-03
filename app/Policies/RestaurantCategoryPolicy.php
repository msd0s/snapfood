<?php

namespace App\Policies;

use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RestaurantCategoryPolicy
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
        return auth()->user()->role==User::ROLE_ADMIN ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RestaurantCategory $restaurantCategory)
    {
        return auth()->user()->role==User::ROLE_ADMIN ? Response::allow()
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
        return auth()->user()->role==User::ROLE_ADMIN ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RestaurantCategory $restaurantCategory)
    {
        return auth()->user()->role==User::ROLE_ADMIN ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RestaurantCategory $restaurantCategory)
    {
        return auth()->user()->role==User::ROLE_ADMIN ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RestaurantCategory $restaurantCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RestaurantCategory  $restaurantCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RestaurantCategory $restaurantCategory)
    {
        //
    }
}
