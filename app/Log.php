<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "log";
    protected $primaryKey = "log_id";
    protected $timestamps = false;
}
