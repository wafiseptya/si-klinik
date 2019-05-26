<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class RekamMedis extends Model
{
    use Sortable;
    protected $table = 'rekam_medis';
}
