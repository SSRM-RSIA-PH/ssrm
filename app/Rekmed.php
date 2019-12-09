<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\RekmedAnak;

class Rekmed extends Model
{
    protected $table = "rekmed";
    protected $primaryKey = "rek_id";
    public $incrementing = false;

    public function user()
    {
        return User::where('id' ,$this->u_id)->first();
    }

    public function anak()
    {
        return RekmedAnak::where('rek_id', $this->rek_id)->get();
    }
}
