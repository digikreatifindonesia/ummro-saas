<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturePackage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function subscriptionPackages()
    {
        return $this->belongsToMany(SubscriptionPackage::class, 'feature_subscription_package');
    }
}
