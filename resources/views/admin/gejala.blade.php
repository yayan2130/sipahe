@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">GEJALA</h4>



                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 =title">Data Gejala</h4>


                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">

                                <div class="row">
                                    <div class="ml-auto mr-3">
                                        <a href="{{ route('gejala.create') }}" class=" btn btn-primary w-lg mb-4  "><i
                                                class="mdi mdi-plus"></i>Tambah Gejala </a>
                                    </div>
                                </div>

                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Gejala</th>
                                        <th>Ubah</th>
                                        <th>Hapus</th>

                                    </tr>
                                </thead>



                                <tbody>
                                    <?php foreach ($gejala as $g) : ?>
                                    <tr>
                                        <td><?= $g['kd_gejala'] ?> </td>
                                        <td><?= $g['nama_gejala'] ?> </td>
                                        <?php $id_gejala = $g['id_gejala']; ?>
                                        <td><a href="{{ route('gejala.edit', $id_gejala) }}"
                                                class="btn btn-warning">Ubah</a></td>

                                        <td>
                                            <form method="post" action="/sipahe/admin/gejala/delete/<?= $g['id_gejala'] ?>"
                                                onclick="return confirm('Apakah Anda yakin?');">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
