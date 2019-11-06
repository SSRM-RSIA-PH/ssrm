<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    protected $table = "ri";
    protected $primaryKey = "ri_id";
    public $incrementing = false;
}
