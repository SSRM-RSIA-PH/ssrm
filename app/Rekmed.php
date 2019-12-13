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
        $user = User::find($this->u_id);
        if ($user) {
            return $user->name;
        }
        return NULL;
    }

    public function anak()
    {
        return RekmedAnak::where('rek_id', $this->rek_id)->orderBy('ra_anak_ke')->get();
    }
}
