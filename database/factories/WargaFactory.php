<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    protected $model = Warga::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usia = $this->faker->numberBetween(1, 80);

        $status = $usia < 15 ? 'Belum Kawin' : $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
        $pekerjaan = $usia < 15 ? 'Tidak Bekerja' : $this->faker->randomElement([
            'Karyawan Swasta', 'Pegawai Negeri Sipil', 'Wiraswasta', 'Petani', 'Pedagang', 'Guru',
            'Dokter', 'Perawat', 'Supir', 'Buruh', 'Tidak Bekerja'
        ]);
        // Menentukan pendapatan berdasarkan usia dan pekerjaan
        $pendapatan = $usia < 15 ? 0 : $this->faker->numberBetween(1000000, 10000000);

        return [
            'nik' => $this->faker->unique()->nik(),
            'no_kk' => $this->faker->randomElement(['7203126706184655','6109335410064542','3577601406137820','1604246709198618','7110681801248754','6309375107034210','1225291903047679','6210625205196101','3504795101016110','3504795101016110']),
            'nama_lengkap' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-80 years', '-15 years'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'status' => $status,
            'pekerjaan' => $pekerjaan,
            'kewarganegaraan' => 'Indonesia',
            'domisili' => $this->faker->address(),
            'usia' => $usia,
            'pendapatan' => $pendapatan,
        ];
    }
}
