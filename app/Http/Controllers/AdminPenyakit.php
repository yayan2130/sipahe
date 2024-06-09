<?php

namespace App\Http\Controllers;

use App\Models\PenyakitModel;
use Illuminate\Http\Request;

class AdminPenyakit extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Admin | Penyakit",
            "penyakit" => PenyakitModel::all(),
        ];
        return view('/admin/penyakit',$data);
    }

    public function create()
    {
        return view('/admin/penyakit/tambah', [
            "title" => "Admin | Tambah Penyakit"
        ]);
    }

    public function store(Request $request)
    {
        $kd_penyakit = $request->kd_penyakit;

        //to check kd_penyakit is unique
        $x = PenyakitModel::where('kd_penyakit', $kd_penyakit)->first();

        //$x will be null if kd_penyakit is unique
        if(!$kd_penyakit == $x){
            $data = [
                'kd_penyakit' => $kd_penyakit,
                'nama_penyakit' => $request->nama_penyakit,
                'keterangan' => $request->keterangan,
                'saran' => $request->saran,
            ];
            PenyakitModel::create($data);

            return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil di tambahkan');
        }else{
            return redirect()->back()->with('error', 'Kode penyakit sudah ada');
        }
    }

    public function edit($id)
    {
        $penyakit = PenyakitModel::find($id);
        $data = [
            "title" => "Admin | Edit Penyakit",
            "penyakit" => $penyakit
        ];
        return view('/admin/penyakit/ubah', $data);
    }

    public function update(Request $request, $id)
    {
        $penyakit = PenyakitModel::find($id);

        $data = [
            'kd_penyakit' => $request->kd_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'keterangan' => $request->keterangan,
            'saran' => $request->saran,
        ];

        $penyakit->update($data);
        
        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diupdate');
    }

    public function delete($id)
    {
        $penyakit = PenyakitModel::find($id);
        $penyakit->delete();
        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diupdate');
    }
}
