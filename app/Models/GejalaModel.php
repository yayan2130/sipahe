<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaModel extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $primaryKey = 'id_gejala';
    protected $fillable = ['kd_gejala', 'nama_gejala'];
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
    public $timestamps = false;
}
