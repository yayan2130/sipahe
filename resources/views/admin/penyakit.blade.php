@extends('layout/admintemplate')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">PENYAKIT</h4>



                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 title">Data Penyakit</h4>

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <div class="row">
                                    <div class="ml-auto mr-3">
                                        <a href="{{ route('penyakit.create') }}" class="btn btn-primary w-lg mb-4 "><i
                                                class="mdi mdi-plus"></i>Tambah Penyakit </a>
                                    </div>
                                </div>
                                <thead>
                                    <tr>

                                        <th>Kode</th>
                                        <th>Nama Penyakit</th>
                                        <th>Keterangan</th>
                                        <th>Saran Tindakan</th>
                                        <th>Ubah</th>
                                        <th>Hapus</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach ($penyakit as $p) : ?>
                                    <tr>
                                        <td><?= $p['kd_penyakit'] ?> </td>
                                        <td><?= $p['nama_penyakit'] ?> </td>
                                        <td><?= $p['keterangan'] ?> </td>
                                        <td><?= $p['saran'] ?> </td>
                                        <?php $id_penyakit = $p['id_penyakit']; ?>
                                        <td><a href="{{ route('penyakit.edit', $id_penyakit) }}"
                                                class="btn btn-warning">Ubah</a></td>

                                        <td>
                                            {{-- action="{{ route('items.destroy', $item->id) }}" --}}
                                            <form method="POST" action="/admin/penyakit/delete/<?= $p['id_penyakit'] ?>"
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
