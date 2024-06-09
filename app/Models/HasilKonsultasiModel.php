<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class HasilKonsultasiModel extends Model
{
    use HasFactory;

    protected $table = 'hasil_konsultasi';
    protected $primaryKey = 'kd_hasil';
    public $timestamps = false;

    protected $fillable = ['kd_hasil','kd_pasien','kd_penyakit','nilai_akurasi'];


    public function get_penyakit($kd_pasien)
    {
    $result = DB::table('hasil_konsultasi as hk')
            ->join('penyakit as p', 'hk.kd_penyakit', '=', 'p.kd_penyakit')
            ->select('p.nama_penyakit', 'hk.kd_pasien', 'hk.kd_penyakit', 'hk.nilai_akurasi')
            ->where('hk.kd_pasien', '=', $kd_pasien)
            ->get();
    return $result;
    }
}
