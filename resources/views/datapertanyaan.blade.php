@extends("blankpage")

@section("title")
@endsection

@section("body")
@endsection

@section("isi")
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Pertanyaan</h3>
            <p class="text-subtitle text-muted">For your Question to check they list</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dahsboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pertanyaan</li>
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
                        <h4 class="card-title">Data Pertanyaan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <a href="/tambahdatapertanyaan" class="btn btn-primary rounded-pill">Tambah Data</a><br><br>
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No Pertanyaan</th>
                                            <th>Pertanyaan</th>
                                            <th>Tipe Pertanyaan</th>
                                            <th>Jenis Quesioner</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $x)
                                        <tr>
                                            <td>{{  $x->id_pertanyaan	  }}</td>
                                            <td>{{  $x->pertanyaan  }}</td>
                                            <td>{{  $x->tipe_pertanyaan  }}</td>
                                            <td>{{  $x->jenis_pertanyaan  }}</td>
                                            <td>
                                                <a href="editdatapertanyaan/{{ $x->id_pertanyaan }}" class="badge bg-success"><i class="bi bi-pencil-square"></i></a>
                                                <a href="hapusdatapertanyaan/{{ $x->id_pertanyaan }}" class="badge bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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
