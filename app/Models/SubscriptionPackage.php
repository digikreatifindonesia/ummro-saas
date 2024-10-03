<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'duration', 'discount', 'discount_type'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function prices()
    {
        return $this->hasMany(SubscriptionPrice::class);
    }

    public function features()
    {
        return $this->belongsToMany(FeaturePackage::class, 'feature_subscription_package');
    }


}
