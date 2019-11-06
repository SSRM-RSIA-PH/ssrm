<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Igd extends Model
{
    protected $table = "igd";
    protected $primaryKey = "igd_id";
    public $incrementing = false;
}
