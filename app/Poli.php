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
        $user = User::find($this->u_id);
        if ($user) {
            return $user->name;
        }
        return NULL;
    }

    public function penunjang()
    {
        return PoliPenunjang::where('poli_id', $this->poli_id)->get();
    }

    public function rekmed()
    {
        return Rekmed::where('rek_id', $this->rek_id)->first();
    }
}
