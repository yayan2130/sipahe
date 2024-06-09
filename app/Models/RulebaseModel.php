<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulebaseModel extends Model
{
    use HasFactory;

    protected $table = 'rulebase';
    protected $primaryKey = 'id_rulebase';
    protected $fillable = ['id_rulebase',  'kd_penyakit', 'kd_gejala', 'nilai_cf'];
    protected $useTimestamps = false;
    protected $useAutoIncrement = true;
    public $timestamps = false;


    public static function getRulebase($kd_penyakit = false)
    {
        if ($kd_penyakit == false) {
            // dd("masuk sini");
            return self::all();
        }
        $dataRuleBase =  self::where(['kd_penyakit' => $kd_penyakit])->get();
        if ($dataRuleBase != null) {
            // dd($dataRuleBase);
            return $dataRuleBase;
        }
        return -1;
    }
}
