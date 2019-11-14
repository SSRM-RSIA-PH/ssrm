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
        return User::where('id', $this->u_id)->get()->first();
    }

    public function penunjang()
    {
        return RawatInapPenunjang::where('ri_id', $this->ri_id)->get();
    }
}
