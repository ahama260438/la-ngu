<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_register extends Model
{
    // table name
    protected $table = 'data_registers';

    public $primaryKey = 'id';

    public $timestamps = true;
}
