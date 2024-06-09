<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiModel extends Model
{
    use HasFactory;

    protected $table = 'kondisi';
    protected $primaryKey = 'kd_kondisi';
}
