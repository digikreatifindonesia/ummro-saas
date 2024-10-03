<?php
namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;


class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
    protected $fillable = [
        'id',
        'data',
    ];


    // Definisikan relasi domains() jika belum ada
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
