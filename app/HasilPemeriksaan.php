<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class HasilPemeriksaan extends Model
{
    use Sortable;
    protected $table = 'hasil_pemeriksaan';

    public function jenis()
    {
      return $this->belongsTo('App\JenisPemeriksaan', 'jenis_pemeriksaan_id');
    }
    
    public function rekmed()
    {
      return $this->belongsTo('App\RekamMedis', 'id_rekam_medis');
    }
    
}
