<?php

use Illuminate\Database\Seeder;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Hematologi Lengkap',
        'harga' => 53000,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Hemoglobin',
        'harga' => 16500,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Leukosit',
        'harga' => 10000,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Trombosit',
        'harga' => 10000,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Hematokrit',
        'harga' => 10000,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Golongan Darah',
        'harga' => 15000,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'LED',
        'harga' => 10000,
        'kategori_pemeriksaan_id' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Gula Darah (Glukosa PP, Glukosa puasa, Gloukosa sewaktu)',
        'harga' => 13500,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Kolesterol (Kolesterol total, HDL kolesterol, LOL kolesterol)',
        'harga' => 27000,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Trigliserid',
        'harga' => 27000,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Trigliserid',
        'harga' => 27000,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Asam urat',
        'harga' => 18500,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Ureum',
        'harga' => 22500,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Kreatinin',
        'harga' => 21500,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'SGOT',
        'harga' => 22500,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'SGPT',
        'harga' => 22500,
        'kategori_pemeriksaan_id' => 2,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Waktu pendarahan',
        'harga' => 17000,
        'kategori_pemeriksaan_id' => 3,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Waktu pembekuan',
        'harga' => 17000,
        'kategori_pemeriksaan_id' => 3,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Widal',
        'harga' => 32500,
        'kategori_pemeriksaan_id' => 4,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'HBs Ag',
        'harga' => 37500,
        'kategori_pemeriksaan_id' => 4,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Malaria',
        'harga' => 39000,
        'kategori_pemeriksaan_id' => 4,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Urin lengkap',
        'harga' => 18500,
        'kategori_pemeriksaan_id' => 5,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Protein urin',
        'harga' => 16500,
        'kategori_pemeriksaan_id' => 5,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Kehamilan',
        'harga' => 14500,
        'kategori_pemeriksaan_id' => 5,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('jenis_pemeriksaan')->insert([
        'nama_jenis' => 'Rutin (Makroskopis & Mikroskopis',
        'harga' => 16500,
        'kategori_pemeriksaan_id' => 5,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);
    
    }
}
