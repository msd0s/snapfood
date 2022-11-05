<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','phone','score','comment_count','account_number','picture','send_price','restaurant_status'
    ];

    protected function restaurantStatus(): Attribute
    {
        return Attribute::make(
            fn ($value) => ["غیرفعال", "فعال"][$value],
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantCategories()
    {
        return $this->belongsToMany(RestaurantCategory::class, 'restaurant_restaurantcategories','restaurant_id','restaurantcategory_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function foodparties()
    {
        return $this->hasMany(Foodparty::class);
    }


}
