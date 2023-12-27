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

        foreach (range(1, 5) as $index) {
            DB::table('penduduk')->insert([
                'nomor_kk' => $faker->unique()->numerify('################'),
                'nik' => $faker->unique()->numerify('3401############'),
                'jenis_kelamin' => $faker->randomElement(['LAKI LAKI', 'PEREMPUAN']),
                'nama' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'agama' => $faker->randomElement(['ISLAM', 'KRISTEN', 'KATHOLIK', 'HINDU', 'BUDDHA', 'KONGHUCU']),
                'umur' => $faker->numberBetween(10,90),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMK', 'D3', 'S1', 'S2', 'S3']),
                'pekerjaan' => $faker->jobTitle,
                'status_hubungan_kel' => $faker->randomElement(['ORANG TUA', 'KEPALA KELUARGA', 'ISTRI', 'ANAK', 'CUCU']),
                'nama_ibu' => $faker->name,
                'nama_ayah' => $faker->name,
                'alamat' => $faker->address,
                'rt' => $faker->numberBetween(1,10),
                'rw' => $faker->numberBetween(1,10),
                'is_active' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
