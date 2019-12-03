<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class RekmedAnak extends Model
{
    protected $table = "rekmed_anak";
    protected $primaryKey = "ra_id";

    public function user()
    {
        return User::findOrFail($this->u_id);
    }
}
