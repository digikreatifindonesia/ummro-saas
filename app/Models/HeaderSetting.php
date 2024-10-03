<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSetting extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'website_title'];

    protected $table = 'header_settings'; // Nama tabel yang sesuai dengan pengaturan Anda
//    protected $casts = [
//        'logo' => 'array',
//    ];


}
