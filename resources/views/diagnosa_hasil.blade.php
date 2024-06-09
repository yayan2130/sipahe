@extends('layout/template')

@section('content')
    <!-- Start content -->
    <header id="header" class="ex-header" style="padding-top: 8rem;padding-bottom: 2rem;">



        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="float-left">Hasil Diagnosa</h3>
                                    <div class="clearfix"></div>

                                    <div class="row">
                                        <div class="col-md-12">


                                            <div class="form">
                                                <div class="container">
                                                    <div class="row">
                                                        <img src="/assets/images/logo_eis.png" alt=""
                                                            height="50">
                                                        <div class="ml-auto mr-5">
                                                            <div class="hidden-print ">
                                                                <a href="javascript:window.print()"
                                                                    class="btn btn-primary waves-effect waves-light"><i
                                                                        class="fa fa-print m-r-5"></i> Print</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <table id="datatable-buttons" class="table table-bordered" cellspacing="0"
                                                    width="100%">
                                                    <tr>
                                                        <th width="30%">NAMA PENGGUNA</th>
                                                        <td class="text-uppercase">
                                                            <?php foreach ($datapasien as $row) {
                                                                echo $row['nama_pasien'];
                                                            }
                                                            
                                                            ?>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">NO. HP</th>
                                                        <td><?php foreach ($datapasien as $row) {
                                                            echo $row['telp'];
                                                        }
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">
                                                            JAWABAN PENGGUNA
                                                        </th>
                                                        <td>
                                                            <ul>
                                                                <?php
                                                            foreach ($i = $user_input as $i) {
                                                            ?>
                                                                <li>
                                                                    <?php echo $i['kd_gejala'] . ' - '; ?>

                                                                    <?php
                                                                    if ($i['nilai'] == 0) {
                                                                        echo '( Tidak )';
                                                                    } elseif ($i['nilai'] == 0.2) {
                                                                        echo '( Kurang Yakin )';
                                                                    } elseif ($i['nilai'] == 0.4) {
                                                                        echo '(Sedikit Yakin)';
                                                                    } elseif ($i['nilai'] == 0.6) {
                                                                        echo '(Cukup Yakin)';
                                                                    } elseif ($i['nilai'] == 0.8) {
                                                                        echo '(Yakin)';
                                                                    } elseif ($i['nilai'] == 1) {
                                                                        echo '(Sangat Yakin)';
                                                                    }
                                                                    ?>
                                                                </li>

                                                                <?php
                                                            }
                                                            ?>
                                                            </ul>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">Hasil Diagnosa</th>
                                                        <?php if (!$datahasil) {
                                                    ?>
                                                        <td>

                                                            <ul>
                                                                Sistem belum dapat menemukan alternatif yang cocok dengan
                                                                gejala yang Kamu masukkan
                                                            </ul>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">
                                                            KETERANGAN
                                                        </th>
                                                        <td>
                                                            -
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">
                                                            SARAN TINDAKAN
                                                        </th>
                                                        <td>
                                                            -
                                                        </td>
                                                    </tr>
                                                    <?php } else { ?>

                                                    <td>

                                                        <?php
                                                        foreach ($datahasil as $hasil) : ?>

                                                        <ul>
                                                            <strong><?= $hasil['kd_penyakit'] ?>
                                                                <?= $hasil['nama_penyakit'] ?>
                                                                <?= $hasil['nilai_akurasi'] * 100 ?> % </strong>
                                                        </ul>
                                                        <?php endforeach; ?>
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">
                                                            KETERANGAN
                                                        </th>

                                                        <td>


                                                            <?php
                                                        $i = 0;
                                                        foreach ($dataketerangan as $hasil) :
                                                        ?>
                                                            <ul><?= $hasil['keterangan'] ?></ul>



                                                            <?php endforeach; ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th width="30%">
                                                            SARAN TINDAKAN
                                                        </th>
                                                        <td>
                                                            <?php
                                                        $i = 0;
                                                        foreach ($dataketerangan as $hasil) :

                                                        ?>
                                                            <ul> <?= $hasil['saran'] ?></ul>



                                                            <?php endforeach; ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                                <div class="col-md-12 text-center">
                                                    <div class="hidden-print ">
                                                        <a class="btn btn-primary mt-5 w-50" href="/home">Kembali ke
                                                            Home</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>>
@endsection
