<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitModel extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $fillable = ['kd_penyakit', 'nama_penyakit', 'keterangan', 'saran'];
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
    public $timestamps = false;

    public static function getPenyakit($id_penyakit = false)
    {
        if ($id_penyakit == false) {
            return self::all();
        }
        return self::where(['id_penyakit' => $id_penyakit])->first();
    }

}
