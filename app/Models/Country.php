<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_code', 'capital', 'region', 'phone_code', 'currency_code', 'thumbnail_flag', 'status'];
}
