<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Log extends Model
{
    protected $table = "log";
    protected $primaryKey = "log_id";

    public function user()
    {
        $user = User::find($this->log_user);
        if ($user) {
            return $user->name;
        }
        return NULL;
    }
}
