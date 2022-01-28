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
            <h4 class="card-title">Edit Data Dosen</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/updatedatadosen" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">NIDN</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="id_dosen" value="{{ $isi->id_dosen }}" placeholder="NIDN" id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="nama_dosen" value="{{ $isi->nama_dosen }}" placeholder="Nama" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">Alamat</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="alamat" value="{{ $isi->alamat }}" placeholder="Alamat" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-map"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-group has-icon-left'>
                                    <label for="mobile-id-icon">Jenis Kelamin</label>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value ="Laki-Laki" id="Laki-Laki">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Laki - Laki
                                                </label>
                                            </div>
                                        </li>
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value ="Perempuan" id="Perempuan">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">No Telepon/WhatsApp</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="nohp" value="{{ $isi->no_hp }}" placeholder="No Telepon/WhatsApp" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="email" value="{{ $isi->email }}" placeholder="Email" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">Keahlian</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="keahlian" value="{{$isi->Keahlian }}" placeholder="Keahlian" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-html"></i>
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
