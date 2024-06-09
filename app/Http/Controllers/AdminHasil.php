<?php

namespace App\Http\Controllers;

use App\Models\HasilKonsultasiModel;
use App\Models\KonsultasiModel;
use Illuminate\Http\Request;

class AdminHasil extends Controller
{
    public function index()
    {
        $hasil_pasien = HasilKonsultasiModel::all();

        $row[] = '<table id="datatable-buttons" class="table table-bordered" cellspacing="0" width="100%">';
        $row[] =    '<thead>';
        $row[] =        '<tr>';
        $row[] =            '<th></th>';
        $row[] =        '</tr>';
        $row[] =        '<tr>';
        $row[] =            '<th>Nama Pasien</th>';
        $row[] =        '</tr>';
        $row[] =    '</thead>';

        $collapse = 1;

        $row[] = '<tbody>';
        foreach ($hasil_pasien as $hp):
            $row[] =    '<tr>';
            $row[] =        '<td>';
            $row[] =            '<div id="accordion" class="col-12">';
            $row[] =                '<div class="card">';
            $row[] =                    '<div class="card-header col-12" id="headingOne">';
            $row[] =                        '<h6 class="col-12>';
            $row[] =                            '<a href="#'.$collapse.'" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne"></a>';


            $kd_pasien = $hp["kd_pasien"];
            $hasil_datapasien = KonsultasiModel::where('kd_pasien', $kd_pasien)->get();

            foreach ($hasil_datapasien as $hdp):
                $row[] =                            '<a href="#'.$collapse.'" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">'.'('.$kd_pasien.')'. $hdp['nama_pasien'].'</a>';

                $row[] =                            '<a href="/admin/hasil/delete/'.$hp['kd_pasien'].'"
                                                                    class="btn btn-danger w-sm mb-6 float-right"
                                                                    onclick="return confirm("Apakah Anda yakin?");"> Hapus </a>';
                $row[] =                            '<a href="/konsul/result/'.$kd_pasien.'"
                                                                    class="btn btn-primary w-sm mb-6 float-right"
                                                                    target="_blank"> Detail </a>';
            endforeach;
            $row[] =                        '</h6>';
            $row[] =                    '</div>';
            $row[] =                    '<div id="'.$collapse.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">';
            $row[] =                        '<div class="card-body">';
            $row[] =                            '<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">';
            $row[] =                                '<tr>';
            $row[] =                                    '<th>Penyakit</th>';
            $row[] =                                    '<th>Nilai Akurasi</th>';
            $row[] =                                '</tr>';
            // $hasil_penyakit = HasilKonsultasiModel::getPenyakit($kd_pasien);
            $hasil_penyakit = HasilKonsultasiModel::query()
                                                    ->join('penyakit as p', 'hasil_konsultasi.kd_penyakit', '=', 'p.kd_penyakit')
                                                    ->select('p.nama_penyakit', 'hasil_konsultasi.kd_pasien', 'hasil_konsultasi.kd_penyakit', 'hasil_konsultasi.nilai_akurasi')
                                                    ->where('hasil_konsultasi.kd_pasien', '=', $kd_pasien)
                                                    ->get();
            foreach ($hasil_penyakit as $hpenyakit):
                $row[] =                            '<tr>';
                $row[] =                                '<td>'.$hpenyakit["nama_penyakit"].'</td>';
                $row[] =                                '<td>'.$hpenyakit["nilai_akurasi"].'</td>';
                $row[] =                            '</tr>';
            endforeach;
            $row[] =                            '</table>';
            $row[] =                        '</div>';
            $row[] =                    '</div>';
            $row[] =                '</div>';
            $row[] =            '</div>';
            $row[] =        '</td>';
            $row[] =    '</tr>';
            $collapse++;
        endforeach;
        $row[] =    '</tbody>';
        $row[] = '</table>';

        $data = [
            "title" => "Admin | Hasil",
            "hasil_pasien" => HasilKonsultasiModel::all(),
            "row" => $row

        ];
        return view('/admin/hasildiagnosis',$data);
    }

    public function delete($kd_pasien)
    {
        HasilKonsultasiModel::where('kd_pasien', $kd_pasien)->delete();
        return redirect('/admin/hasil');
    }
}
