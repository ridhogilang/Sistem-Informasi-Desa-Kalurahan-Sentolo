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
            'surat KTM',
            'surat Ket Duda / Janda',
            'surat Pernyataan Belum Menikah',
            'surat Keterangan Belum Menikah',
            'surat Pengantar Nikah',
            'surat Pengantar SKCK',
            'surat Pengantar E-KTP',
            'surat Keterangan Kematian',
            'surat keterangan Domisili',
            'surat keterangan Kelahiran',
            'surat Keterangan Tidak Bekerja',
            'surat Pengantar Kependudukan',
            'surat Pernyataan Belum Bekerja',
            'surat Keterangan Penghasilan',

        // 'input surat masuk',
        // 'edit surat masuk',
        // 'lihat surat masuk',
        // 'hapus surat masuk',
        // 'disposisi surat masuk',

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
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password')
        ]);
        
        $role = Role::create(['name' => 'Admin']);
        
        $role->syncPermissions($this->permissions);
        
        $user->assignRole([$role->id]);
    }
}
