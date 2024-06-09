<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class KonsultasiModel extends Model
{
    use HasFactory;
    
    protected $table = 'datapasien';
    protected $primaryKey = 'kd_pasien';
    protected $useTimestamps = false;
    protected $fillable = [
        'kd_pasien',
        'nama_pasien',
        'usia',
        'telp',
    ];
        public $timestamps = false;


    public function query_fc($kd_pasien){
        
    }
}
