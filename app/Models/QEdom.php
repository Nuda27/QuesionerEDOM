<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
use App\Models\Matkul;

class QEdom extends Model
{
    use HasFactory;
    protected $table = "quesioner_edom";
    protected $primaryKey = "id_quesioner_edom";

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }

    public function matkul(){
        return $this->belongsTo('App\Models\Matkul');
    }
}
