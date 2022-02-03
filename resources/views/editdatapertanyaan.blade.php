@extends("blankpage")

@section("title")
@endsection

@section('menu')
<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li
        class="sidebar-item ">
        <a href="../dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Data Master</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="../datadosen">Dosen</a>
            </li>
            <li class="submenu-item ">
                <a href="../datamatkul">Mata Kuliah</a>
            </li>
            <li class="submenu-item ">
                <a href="../datafasilitas">Fasilitas</a>
            </li>
            <li class="submenu-item ">
                <a href="../datapertanyaan">Pertanyaan</a>
            </li>
        </ul>
    </li>
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-file-earmark-text-fill"></i>
            <span>Quesioner</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="../listquesioneredom">Quesioner EDOM</a>
            </li>
            <li class="submenu-item ">
                <a href="../listquesionerfas">Quesioner Fasilitas</a>
            </li>
        </ul>
    </li>
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Laporan</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="../laporanedom">Laporan EDOM</a>
            </li>
            <li class="submenu-item ">
                <a href="../laporanfas">Laporan Fasilitas</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="../logout" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
@endsection

@section("body")
@endsection

@section("isi")
@foreach ($kirim as $isi)
<section>
<div class=" col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Pertanyaan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/updatedatapertanyaan" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">No Pertanyaan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="id_pertanyaan" value="{{ $isi->id_pertanyaan}}" placeholder="No Pertanyaan" id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Pertanyaan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="pertanyaan" value="{{ $isi->pertanyaan}}" placeholder="Pertanyaan" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-patch-question"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Tipe Pertanyaan</label>
                                    <div class="position-relative">
                                        <div class="position-relative">
                                            <select class="default-select form-control wide" name="tipe_pertanyaan" value="{{ $isi->tipe_pertanyaan}}">
                                                <option value="-" disabled selected>Pilih Tipe Pertanyaan</option>
                                                <option value="Radio Button">Radio Button</option>
                                                <option value="Text Field">Textfield</option>
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-card-list"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Jenis Pertanyaan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="jenis_pertanyaan" value="{{ $isi->jenis_pertanyaan}}" placeholder="Jenis Pertanyaan" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-chat-square-text"></i>
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
