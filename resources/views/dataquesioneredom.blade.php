@extends("blankpage")

@section("title")
@endsection

@section("body")
@endsection

@section("isi")
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
                                <a href="/quesioneredom" class="btn btn-primary rounded-pill">Quesioner EDOM</a>
                                <a href="/laporanedom" class="btn btn-secondary rounded-pill text-end">Lihat Hasil Quesioner</a><br><br>
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Pertanyaan</th>
                                            <th>Tampilkan/Sembunyikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $x)
                                        @if ( $x->tipe_pertanyaan=='Radio Button')
                                        <tr>
                                            <td>{{  $x->pertanyaan  }}</td>
                                            <td class="text-center">
                                                @if ( $x->status=='Tampilkan')
                                                    <a href="sembunyikanpertanyaanedom/{{ $x->id_pertanyaan }}" title="Sembunyikan"><i class="bi bi-eye-slash"></i></a>
                                                @else
                                                    <a href="tampilkanpertanyaanedom/{{ $x->id_pertanyaan }}" title="Tampilkan"><i class="bi bi-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @foreach ($data as $x)
                                        @if ( $x->tipe_pertanyaan=='Text Field')
                                        <tr>
                                            <td>{{  $x->pertanyaan  }}</td>
                                            <td class="text-center">
                                                @if ( $x->status=='Tampilkan')
                                                    <a href="sembunyikanpertanyaanedom/{{ $x->id_pertanyaan }}" title="Sembunyikan"><i class="bi bi-eye-slash"></i></a>
                                                @else
                                                    <a href="tampilkanpertanyaanedom/{{ $x->id_pertanyaan }}" title="Tampilkan"><i class="bi bi-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
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
