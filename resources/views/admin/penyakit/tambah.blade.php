@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Tambah Penyakit</h4>



                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form action="{{ route('penyakit.store') }}" method="post" data-parsley-validate>
                                @csrf
                                <div class="form-group">
                                    <label for="kd_penyakit">Kode Penyakit<span class="text-danger">*</span></label>
                                    <input type="text" name="kd_penyakit" parsley-trigger="change" required
                                        placeholder="Masukkan Kode Penyakit. Contoh : P01, P02" class="form-control"
                                        id="kd_penyakit">
                                </div>
                                <div class="form-group">
                                    <label for="nama_penyakit">Nama Penyakit<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_penyakit" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Penyakit" class="form-control" id="nama_penyakit">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Penyakit<span class="text-danger">*</span></label>
                                    <textarea name="keterangan" parsley-trigger="change" required placeholder="Masukkan Keterangan Penyakit"
                                        class="form-control" id="keterangan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="saran">Saran<span class="text-danger">*</span></label>
                                    <textarea name="saran" parsley-trigger="change" required placeholder="Masukkan Saran" class="form-control"
                                        id="saran"></textarea>
                                </div>
                                <div class="form-group text-right m-b-0">
                                    <button type="reset" class="btn btn-secondary w-lg  waves-effect m-l-5 ">
                                        Cancel
                                    </button>
                                    <button class="btn  btn-primary w-lg waves-effect waves-light" type="submit">
                                        Simpan
                                    </button>
                                </div>

                            </form>
                        </div> <!-- end card-box -->
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

    </div> <!-- content -->
    <!-- end col -->
@endsection
