@extends("blankpage")

@section('title')
@endsection

@section('body')
@endsection

@section('isi')
    <section class="section">
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pertanyaan Quesioner EDOM</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Dosen</th>
                                                <th>Mata Kuliah</th>
                                                <th>Presentase</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($data as $x)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>@php $id = $x->id_dosen; @endphp
                                                        @foreach ($dosen as $y)
                                                            @if ($y->id_dosen == $id )
                                                            {{$y->nama_dosen}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @php $idmk = $x->id_matkul; @endphp
                                                        @foreach ($mk as $y)
                                                            @if ($y->id_matkul == $idmk )
                                                            {{$y->nama_matkul}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td><div class="progress mt-1" style="height: 6px;">
                                                        <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width:80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"> </div>
                                                    </div></td>
                                                    <!--<td> date('d/M/Y',strtotime($x->created_at)) }} ngga kepake </td>-->
                                                    <td class="text-center">
                                                        {{$x->tahun}}
                                                    </td>
                                                    <!--<td class="text-center"><a href="/listnilai" title="Lihat Selengkapnya"><i class="bi bi-search"></i><br> Lihat <br> Selengkapnya</a></td>-->
                                                    <td class="text-center"><a href="/raportedom/{{$x->id_dosen}}/{{$x->id_matkul}}" title="Lihat Selengkapnya"><i class="bi bi-search"></i><br> Lihat <br> Selengkapnya</a></td>
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
