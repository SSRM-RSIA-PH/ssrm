<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\NicuPenunjang;

class Nicu extends Model
{
    protected $table = "nicu";
    protected $primaryKey = "nicu_id";

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
        return NicuPenunjang::where('nicu_id', $this->nicu_id)->get();
    }

    public function rekmed()
    {
        return Rekmed::where('rek_id', $this->rek_id)->first();
    }
}
