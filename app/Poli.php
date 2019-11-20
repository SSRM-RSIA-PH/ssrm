<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\PoliPenunjang;

class Poli extends Model
{
    protected $table = "poli";
    protected $primaryKey = "poli_id";

    public function user()
    {
        return User::findOrFail($this->u_id);
    }

    public function penunjang()
    {
        return PoliPenunjang::where('poli_id', $this->poli_id)->get();
    }
}
