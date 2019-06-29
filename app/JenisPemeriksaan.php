<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPemeriksaan extends Model
{
  
  protected $table='jenis_pemeriksaan';

  public function kategori()
  {
    return $this->belongsTo('App\KategoriPemeriksaan', 'kategori_pemeriksaan_id');
  }

  public function hasil()
  {
    return $this->hasMany('App\HasilPemeriksaan');
  }

}
