@extends("blankpage")

@section('title')
@endsection
@section('menu')
<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li
        class="sidebar-item ">
        <a href="../../dashboard" class='sidebar-link'>
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
                <a href="../../datadosen">Dosen</a>
            </li>
            <li class="submenu-item ">
                <a href="../../datamatkul">Mata Kuliah</a>
            </li>
            <li class="submenu-item ">
                <a href="../../datafasilitas">Fasilitas</a>
            </li>
            <li class="submenu-item ">
                <a href="../../datapertanyaan">Pertanyaan</a>
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
                <a href="../../listquesioneredom">Quesioner EDOM</a>
            </li>
            <li class="submenu-item ">
                <a href="../../listquesionerfas">Quesioner Fasilitas</a>
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
                <a href="../../laporanedom">Laporan EDOM</a>
            </li>
            <li class="submenu-item ">
                <a href="../../laporanfas">Laporan Fasilitas</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="../../logout" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
@endsection
@section('body')
@endsection

@section('isi')
    <section>
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fasilitas TRPL</h4>
                    <p>Fill in according to your respective assessments</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="/simpanquesionerfas" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama Fasilitas</label>
                                            <div class="position-relative">
                                                <select class="default-select form-control wide" name="fas">
                                                    <option value="-" disabled selected>Pilih Fasilitas</option>
                                                    @foreach ($datafas as $z)
                                                        <option value="{{ $z->id_fasilitas }}">{{ $z->nama_fasilitas }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-key"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Semester</label>
                                            <div class="position-relative">
                                                <input type="number" class="form-control" name="smt" placeholder="Semester" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-key"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                        @foreach ($data as $x)
                                            @if ($x->tipe_pertanyaan == 'Radio Button')
                                                @if ($x->status == 'Tampilkan')
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td width="75%"><h4 for="mobile-id-icon">{{ $x->pertanyaan }}</h4></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> <input type="radio" name="{{ $x->id_pertanyaan }}" value="1"> (1) Tidak Di Hiraukan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> <input type="radio" name="{{ $x->id_pertanyaan }}" value="2"> (2) Kurang Dihiraukan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> <input type="radio" name="{{ $x->id_pertanyaan }}" value="3"> (3) Respond Biasa Saja</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> <input type="radio" name="{{ $x->id_pertanyaan }}" value="4"> (4) Cepat Dalam Perbaikan Fasilitas</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> <input type="radio" name="{{ $x->id_pertanyaan }}" value="5"> (5) Sangat Cepat Dalam Perbaikan Fasilitas</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                        @foreach ($data as $x)
                                            @if ($x->tipe_pertanyaan == 'Text Field')
                                                @if ($x->status == 'Tampilkan')
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="form-group has-icon-left">
                                                                        <h5>
                                                                            <label for="mobile-id-icon">
                                                                                {{ $x->pertanyaan }}</label>
                                                                        </h5>
                                                                        <div class="position-relative">
                                                                            <textarea name="{{ $x->id_pertanyaan }}" class="form-control"
                                                                                id="first-name-icon" rows="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        </div>
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
