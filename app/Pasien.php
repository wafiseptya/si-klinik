<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Pasien extends Model
{
    use SoftDeletes,Sortable;
    protected $table = 'pasiens';

}
