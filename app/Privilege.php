<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $tabe = "privilege";
    protected $primaryKey = "p_id";
    protected $timestamps = false;
}
