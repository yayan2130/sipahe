<?php

namespace App\Http\Controllers;

use App\Models\GejalaModel;
use App\Models\HasilKonsultasiModel;
use App\Models\KonsultasiModel;
use App\Models\User;
use App\Models\UserInputModel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Konsultasi extends BaseController
{
    public function index()
    {
        return view('konsul',[
            "title" => "Konsultasi"
        ]);
    }

    public function action(Request $request)
    {
        $gejala = GejalaModel::all();

        $data_pasien  = [
            'nama_pasien' => $request->nama,
            'usia' => $request->usia,
            'telp' => $request->telp,
        ];

        KonsultasiModel::create($data_pasien);
        $kd_pasien = KonsultasiModel::orderBy('kd_pasien', 'DESC')->first();

        $gejala = GejalaModel::orderBy('kd_gejala', 'ASC')->first();
        $last_suspect="";

        $data = [
            'title' => 'Konsultasi',
            'kd_pasien' => $kd_pasien['kd_pasien'],
            'pertanyaan' => $gejala['nama_gejala'],
            'kode_gejala'=> $gejala['kd_gejala'],
            'last_suspect' => $last_suspect,
        ];

        return view('/pertanyaan', $data);
    }


    public function nextPertanyaan(Request $request,$kd_pasien,$kode_gejala)
    {
        $last_suspect = $request->last_suspect;
        $value = $request->jawaban;

        //searching gejala based on answered question
        $gejala =  GejalaModel::where('kd_gejala', $kode_gejala)->first();

        //cek double input (for testing)
        $cek = UserInputModel::where([
                                        ['kd_pasien', $kd_pasien],
                                        ['id_gejala', $gejala['id_gejala']],
                                    ]);
            

        //if user input is 0 and double input, dont store it
        if($cek->count() == 0) {
            //Store user input
            UserInputModel::create([
                'kd_pasien' => $kd_pasien,
                'id_gejala' => $gejala['id_gejala'],
                'kd_gejala' => $kode_gejala,
                'nilai' => $value
            ]);
        }
        

        //init lists json berisi mapping gejala dan penyakit
        $listMapping = config('lists');

        // return "ga masuk foreach";
        
        foreach($listMapping as $map) {
            // return "masuk foreach";
            $list_gejala = $map["list_gejala"];
            if($value!=0) {
                // return "value tidak sama dengan 0";
                if(in_array($kode_gejala, $list_gejala, true)) {

                    $last_suspect = $map["kode_penyakit"];

                    $index = array_search($kode_gejala, $list_gejala);
                    if($index == sizeof($list_gejala)-1){
                        //apabila list gejala sudah habis, maka dilanjutkan ke "next_pertanyaan"


                        //apabila next_pertanyaan kosong/null, maka pertanyaan dihentikan
                        if(!isset($map["next_pertanyaan"][0])) {
                            break;
                        } 
                        $next_pertanyaan = $map["next_pertanyaan"];

                        $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();
                        
                        // query pertanyaan berdasarkan $next_pertanyaan
                        $data = [
                            'title' => 'Konsultasi',
                            'kd_pasien' => $kd_pasien,
                            'last_suspect' => $last_suspect,
                            'kode_gejala' => $pertanyaan['kd_gejala'],
                            'pertanyaan' => $pertanyaan['nama_gejala']
                        ];
                        return view('/pertanyaan', $data);
                    } else {
                        //list gejala masih ada
                        $next_pertanyaan = $map["list_gejala"][$index+1];
                        $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();

                        $data = [
                            'title' => 'Konsultasi',
                            'kd_pasien' => $kd_pasien,
                            'last_suspect' => $last_suspect,
                            'kode_gejala' => $pertanyaan['kd_gejala'],
                            'pertanyaan' => $pertanyaan['nama_gejala'],
                        ];
                        return view('/pertanyaan', $data);
                    }
                }
            } else {
                // return "value sama dengan 0";
                $index = array_search($kode_gejala, $list_gejala, true);
                if($index !== false) {
                    if($index == sizeof($list_gejala)-1) {
                        if($last_suspect == NULL) {
                            //apabila list gejala sudah habis dan gejala sebelumnya tidak ada nilainya
                            //maka dilanjutkan ke "next_treebase" dengan mengecek last suspect
                            if(!isset($map["next_treebase"][0])) {
                                break;
                            } 
                            $next_pertanyaan = $map["next_treebase"][0];
                            $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();
                            
                            // query pertanyaan berdasarkan $next_pertanyaan
                            $data = [
                                'title' => 'Konsultasi',
                                'kd_pasien' => $kd_pasien,
                                'last_suspect' => $last_suspect,
                                'kode_gejala' => $pertanyaan['kd_gejala'],
                                'pertanyaan' => $pertanyaan['nama_gejala'],
                            ];
                            return view('/pertanyaan', $data);
                        }else if($map["turunan"]){
                            if(!isset($map["next_treebase"][0])) {
                                break;
                            } 
                            $next_pertanyaan = $map["next_treebase"][0];
                            $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();
                            
                            // query pertanyaan berdasarkan $next_pertanyaan
                            $data = [
                                'title' => 'Konsultasi',
                                'kd_pasien' => $kd_pasien,
                                'last_suspect' => $last_suspect,
                                'kode_gejala' => $pertanyaan['kd_gejala'],
                                'pertanyaan' => $pertanyaan['nama_gejala'],
                            ];
                            return view('/pertanyaan', $data);

                        }else{

                            // return "ga masuk ke next_treebase";
                            //cek apabila pertanyaan sudah habis, maka survey dihentikan
                            if(!isset($map["next_pertanyaan"][0])) {
                                break;
                            }  
                            
                            //dilanjut ke "next_pertanyaan" dengan mengecek last suspect ada atau tidak
                            //kalau ada, maka lanjut ke next_pertanyaan
                            $next_pertanyaan = $map["next_pertanyaan"][0];

                            $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();
                            
                            // query pertanyaan berdasarkan $next_pertanyaan
                            $data = [
                                'title' => 'Konsultasi',
                                'kd_pasien' => $kd_pasien,
                                'last_suspect' => $last_suspect,
                                'kode_gejala' => $pertanyaan['kd_gejala'],
                                'pertanyaan' => $pertanyaan['nama_gejala'],
                            ];
                            return view('/pertanyaan', $data);
                        }


                        // //cek user input, value dari gejala sebelumnya ada nilainya atau tidak. 
                        // //apabila ada, maka dilanjut ke "next_pertanyaan"
                        // $UserInputGejala = UserInputModel::where('kd_pasien', $kd_pasien)->get();
                        // $filteredRulebase = array_filter($listMapping, function($item) use ($last_suspect) {
                        //     return $item['kode_penyakit'] == $last_suspect;
                        // });
                        // $list_gejala_suspect = $filteredRulebase[0]["list_gejala"];
                        // // dd($filteredRulebase);
                        // $filtergejala = [];
                        // foreach ($UserInputGejala as $userInput) {
                        //     if (in_array($userInput->kd_gejala, $list_gejala_suspect, true)) {
                        //         $filtergejala[] = $userInput;
                        //     }
                        // }
                        // $value_filter_gejala = [];
                        // foreach ($filtergejala as $item) {
                        //     if ($item->nilai != 0) {
                        //         // $next_pertanyaan = $map["list_gejala"][$index + 1];
                        //         array_push($value_filter_gejala, true);
                        //     }else{
                        //         array_push($value_filter_gejala, false);
                        //     }
                        // }
                        // if (in_array(true, $value_filter_gejala, true)) {
                        //     $next_pertanyaan = $filteredRulebase[0]["next_pertanyaan"][0];
                        //     $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();
                        //     $data = [
                        //         'title' => ''
                        //     ];
                        // }else{        
                        // }
                        
                        
                    } else {
                        //list gejala masih ada tetapi value "0"
                        $next_pertanyaan = $map["list_gejala"][$index+1];
                        $pertanyaan = GejalaModel::where('kd_gejala', $next_pertanyaan)->first();
                        $data = [
                            'title' => 'Konsultasi',
                            'kd_pasien' => $kd_pasien,
                            'last_suspect' => $last_suspect,
                            'kode_gejala' => $pertanyaan['kd_gejala'],
                            'pertanyaan' => $pertanyaan['nama_gejala'],
                        ];
                        return view('/pertanyaan', $data);
                    }
                    // query pertanyaan berdasarkan $next_pertanyaan
                    $data = [
                        'last_suspect' => $last_suspect
                    ];
                }
            } 
        }
        $suspect = $last_suspect;
        return $this->diagnosa_hasil($kd_pasien, $suspect, $kode_gejala);
    }

    public function diagnosa_hasil($kd_pasien, $suspect, $kd_gejala)
    {
        $listKandidat = $this->hitung_fc($kd_pasien);

        $persentase = $this->hitung_cf($kd_pasien, $listKandidat);
        // dd($persentase);

        // mengambil kd_gejala terakhir
        $lastGejala = UserInputModel::where('kd_pasien', $kd_pasien)->orderBy('kd_gejala', 'DESC')->first()['kd_gejala'];

        //mengambil hasil cf final
        $resultFinal = array_filter($persentase, function ($value) use ($lastGejala) {
            return $value['kd_gejala'] == $lastGejala;
        });

        // get kolom cf final
        $final_cf = array_column($resultFinal, 'cf_final');

        //mengurutkan hasil cf dari yang tertinggi
        array_multisort($final_cf, SORT_DESC, $resultFinal);

        //jika kandidat penyakit tidak ditemukan
        if (count($resultFinal) === 0) {
            return redirect()->route('konsul/result', $kd_pasien);
        }
        //jika kandidat ada 1
        else if (count($resultFinal) === 1) {
            for ($i = 0; $i < 1; $i++) {

                HasilKonsultasiModel::create([
                'kd_pasien' => $resultFinal[$i]['kd_pasien'],
                'kd_penyakit' => $resultFinal[$i]['kd_penyakit'],
                'nilai_akurasi' => $resultFinal[$i]['cf_final']
                ]);
            }
        }
        //jika kandidat  ada lebih dari 2
        else {
            for ($i = 0; $i < count($resultFinal) ; $i++) {
                HasilKonsultasiModel::create([
                'kd_pasien' => $resultFinal[$i]['kd_pasien'],
                'kd_penyakit' => $resultFinal[$i]['kd_penyakit'],
                'nilai_akurasi' => $resultFinal[$i]['cf_final']
                ]);
            }
        }
        // return redirect()->route('konsul/result/'.$kd_pasien);;
        return redirect()->route('konsultasi.index', ['kd_pasien' => $kd_pasien]);


    }

    public function hitung_fc($kd_pasien)
    { 
        $query = DB::SELECT("
                SELECT 
                    rule.kd_penyakit, 
                    COUNT(rule.id_rulebase) AS jumlah_gejala, 
                    COUNT(rule.id_rulebase) / (SELECT COUNT(id) 
                                                FROM user_input 
                                                WHERE nilai > 0 AND kd_pasien = $kd_pasien) as kemungkinan 
                FROM 
                    rulebase rule
                INNER JOIN 
                    user_input inpt 
                ON 
                    rule.kd_gejala = inpt.kd_gejala
                WHERE 
                    rule.nilai_cf > 0 AND inpt.nilai > 0 
                AND 
                    inpt.kd_pasien = $kd_pasien
                GROUP BY 
                    rule.kd_penyakit
                HAVING 
                    kemungkinan  > 0
                ORDER BY 
                    rule.kd_penyakit
                ");
        $listKandidat = array();

        foreach($query as $kandidat){
            array_push($listKandidat, $kandidat->kd_penyakit);
        }
        return $listKandidat;
    }   

    public function hitung_cf($kd_pasien, $listKandidat){
        $allPenyakit = $listKandidat;
        // dd($allPenyakit);

        $resultAll = array();
        foreach ($allPenyakit as $penyakit){
            $kd_penyakit = "'" . $penyakit . "'";

            $data = DB::SELECT("
                SELECT 
                    input.kd_pasien, 
                    gej.id_gejala, 
                    gej.kd_gejala, 
                    kec.kd_penyakit,
                    input.nilai, 
                    kec.nilai_cf,  
                    (input.nilai * kec.nilai_cf) as cf
                FROM 
                    user_input input 
                JOIN 
                    gejala gej 
                ON 
                    gej.kd_gejala = input.kd_gejala
                JOIN 
                    rulebase kec 
                ON 
                    kec.kd_gejala = gej.kd_gejala
                JOIN 
                    datapasien usr 
                ON 
                    usr.kd_pasien = input.kd_pasien
                WHERE 
                    input.kd_pasien = $kd_pasien 
                AND 
                    kec.kd_penyakit = $kd_penyakit
                ORDER BY 
                    kec.kd_penyakit, gej.kd_gejala
            ");
            $result = json_decode(json_encode($data, true), true);

            $result_cf = array();

            for ($i = 0; $i < sizeOf($result); $i++) {
                if (empty($result_cf)) {

                    $result[$i]['cf_final'] = 0;
                    $temp_result_cf = $result[$i]['cf'] + $result[$i + 1]['cf'] * (1 - $result[$i]['cf']);
                    $result[$i + 1]['cf_final'] = $temp_result_cf;
                    array_push($resultAll, $result[$i]);
                    array_push($resultAll, $result[$i + 1]);
                    array_push($result_cf, $temp_result_cf);
                } else {
                    if ($i == 1) {
                        $temp_result_cf = $result[$i]['cf_final'];
                        $result[$i]['cf_final'] = $temp_result_cf;
                        array_push($resultAll, $result[$i]);
                        array_push($result_cf, $temp_result_cf);
                    } else {
                        $temp_result_cf = $result[$i]['cf'] + $result_cf[$i - 1] * (1 - $result[$i]['cf']);
                        $result[$i]['cf_final'] = $temp_result_cf;
                        array_push($resultAll, $result[$i]);
                        array_push($result_cf, $temp_result_cf);
                    }
                }
            }
        }
        return $resultAll;
    }


    public function result($kd_pasien)
    {
        
        $hasil_konsul = DB::table('hasil_konsultasi')
                            ->join('penyakit', 'hasil_konsultasi.kd_penyakit', '=', 'penyakit.kd_penyakit')
                            ->where('hasil_konsultasi.kd_pasien', $kd_pasien)
                            ->orderBy('hasil_konsultasi.nilai_akurasi', 'desc')
                            ->get();
        $hasil_konsul = json_decode(json_encode($hasil_konsul, true), true);
        // dd($hasil_konsul);
        $data_keterangan = $this->generate_keterangan($hasil_konsul);

        $datapasien = DB::table('datapasien')
                            ->where('kd_pasien', $kd_pasien)
                            ->get();
        $datapasien = json_decode(json_encode($datapasien, true), true);
        $user_input = DB::table('user_input')
                            ->where('kd_pasien', $kd_pasien)
                            ->where('nilai','>',0)
                            ->get();
        $user_input = json_decode(json_encode($user_input, true), true);
        $data = [
            'title' => 'Hasil Diagnosa',
            'datahasil' => $hasil_konsul,
            'datapasien' => $datapasien,
            'user_input' => $user_input,
            'dataketerangan' => $data_keterangan,
        ];

        // dd($data);

        return view('/diagnosa_hasil', $data);
    }

    public function generate_keterangan($datahasil)
    {

        $dataketerangan = array();
        if (sizeof($datahasil) > 1) {
            if ($datahasil[0]['nilai_akurasi'] == $datahasil[1]['nilai_akurasi']) {
                foreach ($datahasil as $hasil) {
                    $data['keterangan'] =  $hasil['keterangan'];
                    $data['saran'] =  $hasil['saran'];
                    array_push($dataketerangan, $data);
                }
            } else {
                if ($datahasil[0]['nilai_akurasi'] > $datahasil[1]['nilai_akurasi']) {
                    $data['keterangan'] =  $datahasil[0]['keterangan'];
                    $data['saran'] =  $datahasil[0]['saran'];
                    array_push($dataketerangan, $data);
                } else {
                    $data['keterangan'] =  $datahasil[1]['keterangan'];
                    $data['saran'] =  $datahasil[1]['saran'];
                    array_push($dataketerangan, $data);
                }
            }
        } else {
            $data['keterangan'] =  $datahasil[0]['keterangan'];
            $data['saran'] =  $datahasil[0]['saran'];
            array_push($dataketerangan, $data);
        }
        return $dataketerangan;
    }
}
