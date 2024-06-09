@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Tambah Gejala</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row ">

                    <div class="col-md-12">

                        <div class="card-box ">
                            <form action="{{ route('gejala.store') }}" method="post" data-parsley-validate>
                                @csrf
                                <div class="form-group">
                                    <label for="kd_gejala">Kode Gejala<span class="text-danger">*</span></label>
                                    <input type="text" name="kd_gejala" parsley-trigger="change" required
                                        placeholder="Masukkan Kode Gejala. Contoh: G01, G02" class="form-control"
                                        id="kd_gejala">
                                </div>
                                <div class="form-group">
                                    <label for="nama_gejala">Nama Gejala<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_gejala" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Gejala" class="form-control" id="nama_gejala">
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
