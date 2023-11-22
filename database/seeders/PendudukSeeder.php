<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10000) as $index) {
            DB::table('penduduk')->insert([
                'nik' => $faker->unique()->numerify('3401############'),
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'agama' => $faker->randomElement(['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'status_perkawinan' => $faker->randomElement(['Belum Menikah', 'Sudah Menikah', 'Duda', 'Janda']),
                'alamat' => $faker->address,
                'kewarganegaraan' => $faker->randomElement(['WNI', 'WNA']),
                'pekerjaan' => $faker->jobTitle,
                'pendidikan_terakhir' => $faker->randomElement(['SD', 'SMP', 'SMK', 'D3', 'S1', 'S2', 'S3']),
                'nomor_telepon' => $faker->phoneNumber,
                'penghasilan' => $faker->randomElement(['< Rp. 500.000', 'Rp. 500.000 - Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 3.000.000', 'Rp. 3.000.000 - Rp. 5.000.000', '> Rp. 5.000.000']),
                'foto_penduduk' => null, // Foto dapat diisi dengan path ke file foto
                'link_foto' => null,
                'nomor_kk' => $faker->unique()->numerify('################'),
                'nomor_ktp' => $faker->unique()->numerify('################'),
                'status_nyawa' => $faker->randomElement(['Hidup', 'Meninggal']),
                'keterangan_kematian' => $faker->sentence,
                'kontak_darurat' => $faker->phoneNumber,
                'status_migrasi' => $faker->randomElement(['Migrasi Masuk', 'Migrasi Keluar', 'Tidak Migrasi']),
                'status_pajak' => $faker->randomElement(['Terdaftar', 'Belum Terdaftar']),
                'is_active' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
