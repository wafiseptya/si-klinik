<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class HasilPemeriksaan extends Model
{
    use Sortable;
    protected $table = 'hasil_pemeriksaan';
}
