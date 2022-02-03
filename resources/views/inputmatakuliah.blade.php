@extends("blankpage")

@section("title")
@endsection

@section('menu')
<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li
        class="sidebar-item ">
        <a href="dashboard" class='sidebar-link'>
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
                <a href="datadosen">Dosen</a>
            </li>
            <li class="submenu-item ">
                <a href="datamatkul">Mata Kuliah</a>
            </li>
            <li class="submenu-item ">
                <a href="datafasilitas">Fasilitas</a>
            </li>
            <li class="submenu-item ">
                <a href="datapertanyaan">Pertanyaan</a>
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
                <a href="listquesioneredom">Quesioner EDOM</a>
            </li>
            <li class="submenu-item ">
                <a href="listquesionerfas">Quesioner Fasilitas</a>
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
                <a href="laporanedom">Laporan EDOM</a>
            </li>
            <li class="submenu-item ">
                <a href="laporanfas">Laporan Fasilitas</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="logout" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
@endsection
@section("body")
@endsection

@section("isi")
<section>
<div class=" col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input Data Mata Kuliah</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/simpandatamatkul" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">No Mata Kuliah</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="id_matkul" placeholder="No Matata Kuliah" id="first-name-icon">
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
                                        <input type="text" class="form-control" name="nama_matkul" placeholder="Nama Mata Kuliah" id="email-id-icon">
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
                                        <input type="number" class="form-control" name="SKS" placeholder="SKS" id="mobile-id-icon">
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
                                        <input type="text" class="form-control" name="semester" placeholder="Semester" id="mobile-id-icon">
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
@endsection
