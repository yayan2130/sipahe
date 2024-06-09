<?php

namespace App\Http\Controllers;

use App\Models\GejalaModel;
use Illuminate\Http\Request;

class AdminGejala extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Admin | Gejala",
            "gejala" => GejalaModel::all(),

        ];
        return view('/admin/gejala',$data);
    }

    public function create()
    {
        return view('/admin/gejala/tambah', [
            "title" => "Admin | Tambah Gejala"
        ]);
    }

    public function store(Request $request)
    {
        $kd_gejala = $request->kd_gejala;

        //to check kd_gejala is unique
        $x = GejalaModel::where('kd_gejala', $kd_gejala)->first();

        //$x will be null if kd_gejala is unique
        if(!$kd_gejala == $x){
            $data = [
                'kd_gejala' => $kd_gejala,
                'nama_gejala' => $request->nama_gejala,
                'keterangan' => $request->keterangan,
                'saran' => $request->saran,
            ];
            GejalaModel::create($data);

            return redirect()->route('gejala.index')->with('success', 'gejala berhasil di tambahkan');
        }else{
            return "gagal memek";
            return redirect()->back()->with('error', 'Kode gejala sudah ada');
        }
    }

    public function edit($id)
    {
        $gejala = GejalaModel::find($id);
        $data = [
            "title" => "Admin | Edit Gejala",
            "gejala" => $gejala
        ];
        return view('/admin/gejala/ubah', $data);
    }

    public function update(Request $request, $id)
    {
        $gejala = GejalaModel::find($id);

        $data = [
            'kd_gejala' => $request->kd_gejala,
            'nama_gejala' => $request->nama_gejala,
            'keterangan' => $request->keterangan,
            'saran' => $request->saran,
        ];

        $gejala->update($data);
        
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diupdate');
    }

    public function delete($id)
    {
        $gejala = GejalaModel::find($id);
        $gejala->delete();
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diupdate');
    }
}
