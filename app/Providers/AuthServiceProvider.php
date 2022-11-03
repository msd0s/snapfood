<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;
use App\Policies\DiscountPolicy;
use App\Policies\FoodCategoryPolicy;
use App\Policies\FoodPolicy;
use App\Policies\RestaurantCategoryPolicy;
use App\Policies\RestaurantPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        FoodCategory::class => FoodCategoryPolicy::class,
        Food::class => FoodPolicy::class,
        RestaurantCategory::class => RestaurantCategoryPolicy::class,
        Restaurant::class => RestaurantPolicy::class,
        Discount::class => DiscountPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-role',function(User $user){
            return auth()->user()->role == User::ROLE_ADMIN;
        });
        Gate::define('seller-role',function(User $user){
            return auth()->user()->role == User::ROLE_SELLER;
        });
        Gate::define('user-role',function(User $user){
            return auth()->user()->role == User::ROLE_USER;
        });
    }
}
