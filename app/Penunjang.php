<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Igd;
use App\Nicu;
use App\Poli;
use App\RawatInap;

class Penunjang extends Model
{
    protected $table = "penunjang";
    protected $primaryKey = "penunjang_id";
    public $timestamps = false;
    public $incrementing = false;


    public function igd(){
        return Igd::where('igd_id', $this->penunjang_igd)->get();
    }

    public function nicu(){
        return Nicu::where('nicu_id', $this->penunjang_nicu)->get();
    }

    public function poli(){
        return Poli::where('po_id', $this->penunjang_poli)->get();
    }

    public function rawatInap(){
        return RawatInap::where('raw_id', $this->penunjang_ri)->get();
    }
}
