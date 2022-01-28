@extends("blankpage")

@section("title")
@endsection

@section("body")
@endsection

@section("isi")
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Dosen</h3>
            <p class="text-subtitle text-muted">For Dosen to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dahsboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dosen</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12 ">

                <div class="card">

                    <div class="card-content">

                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <a href="/tambahdatadosen" class="btn btn-primary rounded-pill">Tambah Data</a><br><br>
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            
                                            <th>No Telepon/WhatsApp</th>
                                            <th>Email</th>
                                            <th>Keahlian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $x)
                                        <tr>
                                            <td>{{  $x->id_dosen  }}</td>
                                            <td>{{  $x->nama_dosen  }}</td>
                                            <td>{{  $x->alamat  }}</td>
                                            <td>{{  $x->jenis_kelamin  }}</td>
                                            
                                            <td>{{  $x->no_hp  }}</td>
                                            <td>{{  $x->email  }}</td>
                                            <td>{{  $x->Keahlian  }}</td>
                                            <td>
                                                <a href="editdatadosen/{{ $x->id_dosen }}" class="badge bg-success"><i class="bi bi-pencil-square"></i></a> |
                                                <a href="hapusdatadosen/{{ $x->id_dosen }}" class="badge bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection
