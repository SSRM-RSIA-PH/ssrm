<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\RekmedSuami;
use \App\RekmedAnak;
use \App\RekmedParent;

class Rekmed extends Model
{
    protected $table = "rekmed";
    protected $primaryKey = "rek_id";
    public $incrementing = false;

    public function user()
    {
        return User::findOrFail($this->u_id);
    }

    public function suami()
    {
        return RekmedSuami::where('rek_id', $this->rek_id)->first();
    }

    public function anak()
    {
        return RekmedAnak::where('rek_id', $this->rek_id)->get();
    }

    public function parent()
    {
        return RekmedParent::where('rek_id', $this->rek_id)->first();
    }
}
