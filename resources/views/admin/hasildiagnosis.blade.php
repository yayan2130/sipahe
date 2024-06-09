@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">DATA HASIL</h4>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 =title">Data Hasil</h4>

                            @foreach ($row as $item)
                                <?php echo $item; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
