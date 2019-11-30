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
        return User::findOrFail($this->log_user);
    }
}
