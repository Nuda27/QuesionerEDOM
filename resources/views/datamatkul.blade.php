@extends("blankpage")

@section("title")
@endsection

@section("body")
@endsection

@section("isi")
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Mata Kuliah</h3>
            <p class="text-subtitle text-muted">For your Mata Kuliah to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dahsboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mata Kuliah</li>
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
                    <div class="card-header">
                        <h4 class="card-title">Data Mata Kuliah</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <a href="/tambahdatamatkul" class="btn btn-primary rounded-pill">Tambah Data</a><br><br>
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $x)
                                        <tr>
                                            <td>{{  $x->id_matkul  }}</td>
                                            <td>{{  $x->nama_matkul  }}</td>
                                            <td>{{  $x->SKS  }}</td>
                                            <td>{{  $x->semester  }}</td>
                                            <td>
                                                <a href="editdatamatkul/{{ $x->id_matkul }}" class="badge bg-success"><i class="bi bi-pencil-square"></i></a> |
                                                <a href="hapusdatamatkul/{{ $x->id_matkul }}" class="badge bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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
