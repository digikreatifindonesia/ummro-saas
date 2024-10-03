<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['user_id', 'subscription_id', 'amount', 'status', 'paid_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subscription() {
        return $this->belongsTo(Subscription::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
