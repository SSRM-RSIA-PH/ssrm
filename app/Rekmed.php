<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekmed extends Model
{
    protected $table = "rekmed";
    protected $primaryKey = "rekid";
    public $timestamps = false;
    public $incrementing = false;

}
