<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "Dosen";
    protected $primaryKey = "id_dosen";

    public function qedom(){
        return $this->hashMany('App\Models\QEdom');
    }
}
