<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class RekmedParent extends Model
{
    protected $table = "rekmed_parent";
    protected $primaryKey = "rp_id";
}
