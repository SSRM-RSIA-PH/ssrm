<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penunjang;

class RawatInap extends Model
{
    protected $table = "rawat_inap";
    protected $primaryKey = "raw_id";
    protected $timestamps = false;
    public $incrementing = false;

    public function penunjangs(){
        return Penunjang::where('penunjang_ri', $this->raw_id)->get();
    }
}
