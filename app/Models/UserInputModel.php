<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInputModel extends Model
{
    use HasFactory;

    protected $table = 'user_input';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $fillable = ['id', 'kd_gejala', 'id_gejala', 'nilai', 'kd_pasien'];

        public $timestamps = false;

}
