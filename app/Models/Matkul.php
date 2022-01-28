<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = "Matakuliah";
    protected $primaryKey = "id_matkul";

    public function qedom(){
        return $this->hashMany('App\Models\QEdom');
    }
}
