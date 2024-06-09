@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Dashboard</h4>


                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">


                    <div class="col-xl-3 col-sm-6">
                        <div class="card-box widget-box-two widget-two-custom">
                            <i class=" mdi mdi-tooth widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <h6 class="m-0 text-uppercase font-bold font-secondary text-overflow" title="totalpenyakit">
                                    Total Penyakit</h6>
                                <h2 class="font-600"><span><i class=""></i></span> <span
                                        data-plugin="counterup">{{ $penyakit }}</span></h2>

                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card-box widget-box-two widget-two-custom">
                            <i class=" mdi mdi-pulse widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <h6 class="m-0 text-uppercase font-bold font-secondary text-overflow" title="totalgejala">
                                    Total Gejala</h6>
                                <h2 class="font-600"><span><i class=""></i></span> <span data-plugin="counterup">
                                        {{ $gejala }}</span></h2>

                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card-box widget-box-two widget-two-custom">
                            <i class="mdi mdi-source-branch widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <h6 class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">
                                    Total Rulebase</h6>
                                <h2 class="font-600"><span><i class=""></i></span> <span
                                        data-plugin="counterup">{{ $rulebase }}</span></h2>

                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card-box widget-box-two widget-two-custom">
                            <i class="mdi mdi-account-multiple widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <h6 class="m-0 text-uppercase font-bold font-secondary text-overflow" title="totalpengguna">
                                    Total Pengguna</h6>
                                <h2 class="font-600"><span><i class=""></i></span> <span
                                        data-plugin="counterup">{{ $user }}</span></h2>

                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
@endsection
