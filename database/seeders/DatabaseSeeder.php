<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $permissions = [
        //kepegawaian
        'enter_kepegawaian',
            //user
            'user_list', 'user_create', 'user_edit', 'user_delete',
            //role
            'role_list', 'role_create', 'role_edit', 'role_delete',

        //e-surat
        'enter_e-surat',
            //permission surat
            'list surat', 'lihat surat',  'lihat contoh surat', 'input surat', 'edit surat', 'hapus surat', 'verifikasi surat', 'disposisi surat',
            //surat surat yang dibuat
            'Surat Masuk','Surat Keluar',
            //Arsip
            'Arsip Surat', 'Menghapus Arsip', 'Arsip Dihapus',
        //sistem informasi
        'enter_sistem informasi',
        
        
    ];
    // private $ooo = 'user_create';
        
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Permission::create(['name' => $this->ooo]);

        //membuat user-baru
        $user = User::create([
            'nama' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
            'jabatan' => 'Admin',
            'is_active' => '1',
            'is_delete' => '0'
        ]);
        
        $role = Role::create(['name' => 'Admin']);
        
        $role->syncPermissions($this->permissions);
        
        $user->assignRole([$role->id]);
    }
}
