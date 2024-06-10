@extends('layout/template')

@section('content')
    <div class="content-page">
        <!-- Start content -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Form Konsultasi</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form action="/sipahe/konsul/action" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Kucing<span class="text-danger">*</span></label>
                                    <input data-parsley-type="alphanum" type="text" name="nama"
                                        parsley-trigger="change" required placeholder="Masukkan Nama" class="form-control"
                                        id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="usia">Usia<span class="text-danger">*</span></label>
                                    <input data-parsley-type="number" type="text" name="usia" parsley-trigger="change"
                                        data-parsley-maxlength="2" required placeholder="Masukkan Usia" class="form-control"
                                        id="usia">
                                </div>
                                <div class="form-group">
                                    <label for="telp">No. Telpon Pemilik<span class="text-danger"></span></label>
                                    <input data-parsley-type="number" type="text" name="telp" parsley-trigger="change"
                                        data-parsley-length="[10,13]" placeholder="Masukkan No. Telp" class="form-control"
                                        id="hp">
                                </div>


                                <div class="form-group text-right m-b-0">
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Submit
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

    <!-- Parsley js -->
    <script type="text/javascript" src="/plugins/parsleyjs/parsley.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
@endsection
