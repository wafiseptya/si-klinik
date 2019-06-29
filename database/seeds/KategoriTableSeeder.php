<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('kategori_pemeriksaan')->insert([
        'nama_kategori' => 'Hematologi',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);
    
      DB::table('kategori_pemeriksaan')->insert([
        'nama_kategori' => 'Kimia Darah',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);    

      DB::table('kategori_pemeriksaan')->insert([
        'nama_kategori' => 'Faktor Kuagulasi',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('kategori_pemeriksaan')->insert([
        'nama_kategori' => 'Imunologi',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('kategori_pemeriksaan')->insert([
        'nama_kategori' => 'Urinalisa',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);

      DB::table('kategori_pemeriksaan')->insert([
        'nama_kategori' => 'Feses',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);
    
    }
}
