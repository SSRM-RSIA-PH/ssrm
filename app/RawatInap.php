<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class RawatInap extends Model
{
    protected $table = "ri";
    protected $primaryKey = "ri_id";

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
        return RawatInapPenunjang::where('ri_id', $this->ri_id)->get();
    }

    public function rekmed()
    {
        return Rekmed::where('rek_id', $this->rek_id)->first();
    }
}
