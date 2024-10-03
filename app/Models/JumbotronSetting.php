<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumbotronSetting extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'description', 'button_text', 'thumbnail_image'];

    protected $table = 'jumbotron_settings';

    // Membuat metode untuk mengambil value berdasarkan key
    public static function getValue($key)
    {
        return self::where('key', $key)->value('value');
    }

    protected $casts = [
        'thumbnail_image' => 'array',
    ];
}
