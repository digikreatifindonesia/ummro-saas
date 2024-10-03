<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPrice extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_package_id', 'country_id', 'price'];

    public function subscriptionPackage()
    {
        return $this->belongsTo(SubscriptionPackage::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
