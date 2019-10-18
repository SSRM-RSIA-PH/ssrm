<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penunjang;

class Nicu extends Model
{
    protected $table = "nicu";
    protected $primaryKey = "nicu_id";
    protected $timestamps = false;
    public $incrementing = false;

    public function penunjangs(){
        return Penunjang::where('penunjang_nicu', $this->nicu_id)->get();
    }
}
