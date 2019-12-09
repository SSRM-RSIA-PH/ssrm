<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Arsip extends Model
{
    protected $table = "arsip_tahunan";
    protected $primaryKey = "arsip_id";

    public function user()
    {
        return User::findOrFail($this->u_id);
    }
}
