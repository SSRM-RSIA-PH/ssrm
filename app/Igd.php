<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\IgdPenunjang;

class Igd extends Model
{
    protected $table = "igd";
    protected $primaryKey = "igd_id";

    public function user()
    {
        return User::where('id', $this->u_id)->get()->first();
    }

    public function penunjang()
    {
        return IgdPenunjang::where('igd_id', $this->igd_id)->get();
    }
}
