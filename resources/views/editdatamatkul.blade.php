@extends("blankpage")

@section("title")
@endsection

@section("body")
@endsection

@section("isi")
@foreach ($kirim as $isi)
<section>
<div class=" col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Mata Kuliah</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/updatedatamatkul" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">No Mata Kuliah</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="id_matkul" value="{{ $isi->id_matkul}}" placeholder="No Matata Kuliah" id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Nama Mata Kuliah</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="nama_matkul" value="{{ $isi->nama_matkul }}"placeholder="Nama Mata Kuliah" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">SKS</label>
                                    <div class="position-relative">
                                        <input type="number" class="form-control" name="SKS" value="{{ $isi->SKS }}" placeholder="SKS" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">Semester</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="semester" value="{{ $isi->semester }}" placeholder="semester" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endforeach
@endsection
