<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class TenantRegisterController extends Controller
{
    public function showForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('register-travel');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email', // Email required, tapi validasi unique manual
            'domain' => 'required',      // Domain required, tapi validasi unique manual
            'password' => 'required|string|min:8',
        ]);

        // Cek manual apakah `email` sudah ada dalam data JSON
        $emailExists = DB::table('tenants')
            ->whereRaw('json_unquote(json_extract(data, "$.email")) = ?', [$request->email])
            ->exists();



        $domainExists = DB::table('tenants')
            ->whereRaw('json_unquote(json_extract(data, "$.domain")) = ?', [$request->domain])
            ->exists();

        if ($emailExists || $domainExists) {
//            dd('Error detected', [
//                'email' => $emailExists ? 'Email sudah digunakan oleh tenant lain.' : null,
//                'domain' => $domainExists ? 'Domain sudah digunakan oleh tenant lain.' : null,
//            ]);
//
            return back()->withErrors([
                'email' => $emailExists ? 'Email sudah digunakan oleh tenant lain.' : null,
                'domain' => $domainExists ? 'Domain sudah digunakan oleh tenant lain.' : null,
            ]);
        }




//        // Buat tenant baru
        $tenant = new Tenant();
        $tenant->id = $request->domain;
        $tenant->name = $request->name;
        $tenant->email = $request->email;
        $tenant->domain = $request->domain;

        $tenant->data = json_encode([ // Simpan data tambahan
            'name' => $request->name,
            'email' => $request->email,
            'domain' => $request->domain,
            'database' => 'tenant_' . $request->domain,
        ]);

        // Debugging: Cek nilai tenant sebelum menyimpan
//        dd($tenant->toArray());

        // Simpan tenant dan tangkap exception
        try {
            $tenant->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        // Set domain/subdomain tenant
        $tenant->domains()->create([
            'domain' => $request->domain . '.ummro.com',
        ]);

        // Buat database untuk tenant
        $tenant->run(function () {
            \Artisan::call('tenants:migrate'); // Jalankan migrasi untuk tenant baru
        });


        // Buat user untuk tenant
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->tenant()->associate($tenant);
        $user->save();

        $user->assignRole('tenant'); // Sesuaikan role yang diinginkan



        return redirect()->back()->with('success', 'Travel umroh berhasil terdaftar!');
    }

}
