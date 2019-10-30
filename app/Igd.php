<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penunjang;

class Igd extends Model
{
    protected $table = "igd";
    protected $primaryKey = "igd_id";
    public $timestamps = false;
    public $incrementing = false;

    public function penunjangs(){
        return Penunjang::where('penunjang_igd', $this->igd_id)->get();
    }
}
