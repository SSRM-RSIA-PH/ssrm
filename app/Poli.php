<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penunjang;

class Poli extends Model
{
    protected $table = "poli";
    protected $primaryKey = "po_id";
    protected $timestamps = false;
    public $incrementing = false;

    public function penunjangs(){
        return Penunjang::where('penunjang_poli', $this->po_id)->get();
    }
}
