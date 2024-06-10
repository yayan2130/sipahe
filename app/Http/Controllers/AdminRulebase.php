<?php

namespace App\Http\Controllers;

use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\RulebaseModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminRulebase extends Controller
{
    public function index()
    {
        $penyakit = PenyakitModel::all();
        $gejala = GejalaModel::all();
        $rulebase = RulebaseModel::all();

        $row[] = '<table class="table table-bordered table-hover table-striped">';
        $row[] =    "<tr>";
        $row[] =        "<th width='1%' class='text-center'>No</th>";
        $row[] =        "<th>Penyakit</th>";
        foreach ($gejala as $row_gejala) :
        $row[] =        "<th width='1%' class='text-center'>". $row_gejala['kd_gejala']. "</th>";
        endforeach;
        $row[] =        "<th width='1%' class='text-center'>OPSI</th>";
        $row[] =    "</tr>";
        $no = 1;

        foreach ($penyakit as $row_penyakit) :
            $a = $row_penyakit['kd_penyakit'];

            $row[] =    "<tr>";
            $row[] =        "<td class='text-center'>". $no++. "</td>";
            $row[] =        "<td> (". $row_penyakit['kd_penyakit']. ")".$row_penyakit['nama_penyakit']."</td>";
            foreach ($gejala as $row_gejala) :
                $b = $row_gejala['kd_gejala'];
                $rules = RulebaseModel::where('kd_penyakit', $a)->where('kd_gejala', $b)->get();
                foreach ($rules as $rule) :
                    $row[] =        "<td style='width: 1%' class='text-center'>". $rule['nilai_cf']. "</td>";
                endforeach;
            endforeach;
            $row[] =        "<td>";
            $row[] =            "<a class='btn btn-primary btn-sm' href='/sipahe/admin/rulebase/edit/". $row_penyakit['id_penyakit']. "'>";
            $row[] =                "<i class='fa fa-wrench'></i>";
            $row[] =            "</a>";
            $row[] =        "</td>";
            $row[] =    "</tr>";
            endforeach;
        $row[] = '</table>';

        $data = [
            "title" => "Admin | Rule Base",
            "penyakit" => $penyakit,
            "gejala" => $gejala,
            "rulebase" => $rulebase,
            "row" => $row
         ];
        return view('/admin/rulebase',$data);
    }

    public function edit($id)
    {
        $kd_penyakit = PenyakitModel::where('id_penyakit',$id)->first();
        $result = PenyakitModel::all();
        $result_gejala = GejalaModel::all();

        $data = [
            'title' => 'Admin | Edit Rulebase',
            'result' => $result,
            'result_gejala' => $result_gejala,
            'rulebase' => RulebaseModel::where('kd_penyakit',$kd_penyakit['kd_penyakit'])->get()->toArray(),
            'allGejala' => GejalaModel::all(),
            'penyakit' => PenyakitModel::find($kd_penyakit)->first(),
            // 'row'=> $row
        ];
        // dd(gettype($data['rulebase']));
        return view('/admin/rulebase/ubah', $data);
    }


    public function update(Request $request, $id)
    {
        $kd_penyakit = $request->kd_penyakit;
        $id_rulebase = $request->id_rulebase;
        $nilai_cf = $request->nilai_cf;
        $kd_gejala = $request->kd_gejala;

        for ($i = 0; $i <= sizeof($nilai_cf) - 1; $i++) {
            if (empty($id_rulebase[$i])) {
                $rulebase = RulebaseModel::find($id_rulebase[$i]);
                $rulebase->update([
                    'id_rulebase' => $id_rulebase[$i],
                    'kd_penyakit' => $kd_penyakit,
                    'kd_gejala' => $kd_gejala[$i],
                    'nilai_cf' => $nilai_cf[$i]
                ]);
            } else {
                $rulebase = RulebaseModel::find($id_rulebase[$i]);
                $rulebase->update([
                    'id_rulebase' => $id_rulebase[$i],
                    'kd_penyakit' => $kd_penyakit,
                    'kd_gejala' => $kd_gejala[$i],
                    'nilai_cf' => $nilai_cf[$i]
                ]);
            }
        }

        return redirect()->route('rulebase.index')->with('success', 'Penyakit berhasil diupdate');
        
    }

    public function delete($id)
    {
        $penyakit = PenyakitModel::find($id);
        $penyakit->delete();
        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diupdate');
    }
}
