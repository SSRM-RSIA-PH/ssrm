<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Rekmed extends Model
{
    protected $table = "rekmed";
    protected $primaryKey = "rek_id";
    public $incrementing = false;

    public function user()
    {
        return User::where('id', $this->u_id)->get()->first();
    }
}
