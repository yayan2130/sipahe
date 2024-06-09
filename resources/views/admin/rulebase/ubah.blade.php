@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Ubah Rulebase</h4>



                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card-box">

                            <form action="{{ route('rulebase.update', $penyakit['id_penyakit']) }}" method="post"
                                class="form-inline" data-parsley-validate>
                                @csrf
                                <h3 class="page-title float-left">Penyakit : <?= '( ' .
                                    $penyakit['kd_penyakit'] .
                                    '
                                    ) ' .
                                    $penyakit['nama_penyakit'] ?></h3>
                                <br>
                                <br>
                                <div class="table">
                                    <table class="table table-bordered" style="width: 300%;">
                                        <input type="hidden" name="kd_penyakit" value="<?= $penyakit['kd_penyakit'] ?>">
                                        <tr>
                                            <th style="width: 300px">Kriteria Gejala</th>

                                            <th style="width: 300px">Nilai CF (0 - 1)</th>
                                        </tr>

                                        @foreach ($allGejala as $key => $ge)
                                            <tr>
                                                <td>
                                                    <?php echo $ge['kd_gejala']; ?>
                                                    <br>
                                                    <small class="text-muted"><?php echo $ge['nama_gejala']; ?></small>
                                                </td>

                                                <td>
                                                    <input type="hidden" name="kd_gejala[]"
                                                        value="<?= $ge['kd_gejala'] ?>">
                                                    <?php
                                                    
                                                    $filteredRulebase = null;
                                                    
                                                    if ($rulebase != null) {
                                                        $filteredRulebase = array_filter($rulebase, function ($value) use ($ge) {
                                                            return $value['kd_gejala'] == $ge['kd_gejala'];
                                                        });
                                                        $filteredRulebase = reset($filteredRulebase);
                                                    }
                                                    ?>
                                                    <input type="hidden" name="id_rulebase[]" id="id_rulebase"
                                                        value="<?= $filteredRulebase != null ? $filteredRulebase['id_rulebase'] : null ?>">
                                                    <input type="text" name="nilai_cf[]" class="form-control"
                                                        placeholder="Nilai CF 0.0 - 1.0" data-parsley-min="0.0"
                                                        data-parsley-max="1.0"
                                                        value="<?= $filteredRulebase != null ? $filteredRulebase['nilai_cf'] : '0' ?>"
                                                        id="nilai_cf" required>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <input type="submit" value="Simpan" class="btn btn-primary w-lg  float-right">
                                </div>

                            </form>
                        </div> <!-- end card-box -->
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection



{{-- <script src="../plugins/select2/js/select2.min.js" type="text/javascript"></script> --}}
