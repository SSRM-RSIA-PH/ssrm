<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Poli extends Model
{
    protected $table = "poli";
    protected $primaryKey = "poli_id";

    public function user()
    {
        return User::where('id', $this->u_id)->get()->first();
    }
}
