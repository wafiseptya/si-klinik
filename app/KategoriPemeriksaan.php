<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPemeriksaan extends Model
{
  
  protected $table='kategori_pemeriksaan';
  
  public function jenis()
  {
    return $this->hasMany('App\JenisPemeriksaan');
  }

}
