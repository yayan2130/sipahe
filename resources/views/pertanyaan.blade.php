@extends('layout/konsul_template')

@section('content')
    <header id="header" class="ex-header" style="padding-top: 8rem;padding-bottom: 2rem;">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form">
                        <div class="container">
                            <p class="text-white">.</p>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card m-b-30">
                                        <h6 class="card-header">Jawab pertanyaan berikut sesuai dengan kondisi yang terjadi
                                            pada hewan peliharaan anda</h6>
                                        <div class="card-body">

                                            <form
                                                action="/sipahe/konsul/nextPertanyaan/<?= $kd_pasien ?>/<?= $kode_gejala ?>"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="last_suspect" value="<?= $last_suspect ?>">

                                                <div class="row justify-item-center">

                                                    <div class="col-12">

                                                        <h2 class="card-title"> <?php echo $kode_gejala; ?> - Apakah
                                                            <?php echo $pertanyaan; ?>? </h2>


                                                        <div class="container">
                                                            <div class="row ">


                                                                <div class="card-box table-responsive">
                                                                    <!-- <input type="hidden" name="kondisi[]" id="kondisi"> -->
                                                                    <div class="col-md-12 text-center">

                                                                        <div class="  btn-group  btn-group-lg text-center btn-group-toggle btn-info "
                                                                            data-toggle="buttons">
                                                                            <label class="btn btn-secondary w-lg active">
                                                                                <input type="radio" name="jawaban"
                                                                                    id="option1" value="0"
                                                                                    aria-pressed="true" autocomplete="off"
                                                                                    checked> Tidak
                                                                            </label>
                                                                            <label class="btn btn-secondary w-lg ">
                                                                                <input type="radio" name="jawaban"
                                                                                    id="option2" value="0.2"
                                                                                    aria-pressed="true" autocomplete="off">
                                                                                Kurang Yakin
                                                                            </label>
                                                                            <label class="btn btn-secondary w-lg ">
                                                                                <input type="radio" name="jawaban"
                                                                                    id="option3" value="0.4"
                                                                                    aria-pressed="true" autocomplete="off">
                                                                                Sedikit Yakin
                                                                            </label>
                                                                            <label class="btn btn-secondary w-lg ">
                                                                                <input type="radio" name="jawaban"
                                                                                    id="option3" value="0.6"
                                                                                    aria-pressed="true" autocomplete="off">
                                                                                Cukup Yakin
                                                                            </label>
                                                                            <label class="btn btn-secondary w-lg ">
                                                                                <input type="radio" name="jawaban"
                                                                                    id="option3" value="0.8"
                                                                                    aria-pressed="true" autocomplete="off">
                                                                                Yakin
                                                                            </label>
                                                                            <label class="btn btn-secondary w-lg ">
                                                                                <input type="radio" name="jawaban"
                                                                                    id="option3" value="1"
                                                                                    aria-pressed="true" autocomplete="off">
                                                                                Sangat Yakin
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>



                                                <div class="col-md-12">

                                                    <div class="col-md-12">


                                                        <br>
                                                        <button type="submit"
                                                            class="btn btn-primary stepy-finish col-md-12">Selanjutnya</button>

                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
