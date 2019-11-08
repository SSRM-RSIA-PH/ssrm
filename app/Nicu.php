<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Nicu extends Model
{
    protected $table = "nicu";
    protected $primaryKey = "nicu_id";

    public function user()
    {
        return User::where('id', $this->u_id)->get()->first();
    }
}
