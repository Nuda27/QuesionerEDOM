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
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Hasil Penilaian Fasilitas</h3>
        </div>
    </div>
</div>
    <section class="section">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12 ">
                    <div class="card" id="cetakse">
                        <div class="card-header">
                            <h4 class="card-title" align="center">DATA RAPOR FASILITAS<br>TEKNOLOGI REKAYASA PERANGKAT LUNAK<br>
                                POLITEKNIK ENJINERING INDORAMA PURWAKARTA<br>2022 / 2023
                            </h4>
                            <br>
                            <table>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($data as $x)
                                @if ($no==1)
                                <tr>
                                    <td>Fasilitas &nbsp;</td>
                                    <td> : </td>
                                    <td>&nbsp;&nbsp;{{$x->nama_fasilitas}}</td>
                                </tr>
                                <tr>
                                    <td>Tahun &nbsp;</td>
                                    <td> : </td>
                                    <td>&nbsp;&nbsp;{{$x->tahun}}</td>
                                </tr>
                                @endif
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                            </table>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Pertanyaan</th>
                                                <th>Responden</th>
                                                <th>Skor</th>
                                                <th>Nilai Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $y)
                                            @if ($y->pertanyaan)
                                                @if ( $y->tipe_pertanyaan=='Radio Button')
                                                    <tr>
                                                        <td>{{ $y->pertanyaan }}</td>
                                                        <td>
                                                            {{$y->jmlresponden}}
                                                        </td>
                                                        <td>
                                                            {{$y->skor_didapat}}/{{$y->skor_penuh}}
                                                        </td>
                                                        <td>{{$y->nilai_akhir}}</td>
                                                    </tr>
                                                @endif
                                                <!--DATA SARAN BANYAK-->
                                                @if ( $y->tipe_pertanyaan=='Text Field')
                                                @foreach ($jawaban as $item)
                                                    
                                                @if ( $item->id_pertanyaan==$y->id_pertanyaan )
                                                <tr>
                                                    <td><strong> {{  $y->pertanyaan  }}</strong></td>
                                                    <td colspan="3">
                                                        {{$item->jawaban}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                                <!--DATA SARAN SATU
                                                @if ( $y->tipe_pertanyaan=='Text Field')
                                                <tr>
                                                    <td><strong> {{  $y->pertanyaan  }}</strong></td>
                                                    <td colspan="3">
                                                        {{$y->jawaban}}
                                                    </td>
                                                </tr>
                                                @endif-->
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                <br>
                                    <a href="/quesioneredom" class="btn btn-primary rounded-pill" onclick="printDiv('cetakse')" ><i class="fa fa-print"></i>Cetak Laporan</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
    @endsection
