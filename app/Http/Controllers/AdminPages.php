<?php

namespace App\Http\Controllers;

use App\Models\GejalaModel;
use App\Models\HasilKonsultasiModel;
use App\Models\PenyakitModel;
use App\Models\RulebaseModel;
use Illuminate\Http\Request;

class AdminPages extends Controller
{
    public function index()
    {

        $data = [
            "title" => "Admin | Home",
            "penyakit" => PenyakitModel::count(),
            "gejala" => GejalaModel::count(),
            "rulebase" => RulebaseModel::count(),
            "user" => HasilKonsultasiModel::count(),
        ];
        return view('/admin/home',$data);
    }
}
