@extends("blankpage")

@section('title')
@endsection

@section('body')
@endsection

@section('isi')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Hasil Penilaian Fasilitas</h3>
            <a href="/quesioneredom" class="btn btn-primary rounded-pill" onclick="printDiv('cetakse')"><i class="fa fa-print"> </i>Cetak Laporan</a>
                                
        </div>
    </div>
</div>
    <section class="section">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12 ">
                    <div class="card" id="cetakse">
                        <div class="card-header">
                            <h4 class="card-title" align="center">DATA RAPOR DOSEN<br>TEKNOLOGI REKAYASA PERANGKAT LUNAK<br>
                                POLITEKNIK ENJINERING INDORAMA PURWAKARTA<br>2022 / 2023
                            </h4>
                            <br>
                            <table align="center" width="100%">
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($data as $x)
                                @if ($no==1)
                                <tr>
                                    <td>Fasilitas</td>
                                    <td> : </td>
                                    <td>{{$x->nama_fasilitas}}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td> : </td>
                                    <td>{{$x->tahun}}</td>
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
                                                @if ( $y->tipe_pertanyaan=='Text Field')
                                                    <tr>
                                                        <td><strong> {{  $y->pertanyaan  }}</strong></td>
                                                        <td colspan="3">
                                                            {{$y->jawaban}}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
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
