@extends('layout/template')

@section('content')
    <div class="content-page">
        <!-- Start content -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">LOGIN</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form class="form-horizontal" method="POST" action="/sipahe/login">
                                @csrf
                                @if (session()->has('loginError'))
                                    <div class="card-box" style="color: red">
                                        {{ session('loginError') }}
                                    </div>
                                @endif

                                @if (session()->has('success'))
                                    <div class="card-box" style="color: green">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" id="username" name="username"
                                            required="" placeholder="Masukkan username" value="{{ old('username') }}">
                                    </div>
                                    @error('username')
                                        <div style="color: red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group m-b-25">
                                    <div class="col-xs-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password"
                                            name="password" placeholder="Masukkan Password">
                                    </div>
                                </div>
                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light"
                                            type="submit">Sign In</button>
                                    </div>
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
