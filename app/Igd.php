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
        $user = User::find($this->u_id);
        if ($user) {
            return $user->name;
        }
        return NULL;
    }

    public function penunjang()
    {
        return IgdPenunjang::where('igd_id', $this->igd_id)->get();
    }

    public function rekmed()
    {
        return Rekmed::where('rek_id', $this->rek_id)->first();
    }
}
