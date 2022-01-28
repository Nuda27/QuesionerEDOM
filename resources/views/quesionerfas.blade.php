@extends("blankpage")

@section('title')
@endsection

@section('body')
@endsection

@section('isi')
    <section>
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fasilitas TRPL</h4>
                </div>
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
                                <div class="row">
                                    <br>
                                    <h5>Quesioner Fasilitas</h1>
                                        <br>
                                        @foreach ($data as $x)
                                            @if ($x->tipe_pertanyaan == 'Radio Button')
                                                @if ($x->status == 'Tampilkan')
                                                    <div class="col-lg-12">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="75%"><label for="mobile-id-icon">{{ $x->pertanyaan }}</label>
                                                                </td>
                                                                <td width="25%">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>2</td>
                                                                            <td>3</td>
                                                                            <td>4</td>
                                                                            <td>5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="20%"><input type="radio"
                                                                                    name="{{ $x->id_pertanyaan }}"
                                                                                    value="1"></td>
                                                                            <td width="20%"><input type="radio"
                                                                                    name="{{ $x->id_pertanyaan }}"
                                                                                    value="2"></td>
                                                                            <td width="20%"><input type="radio"
                                                                                    name="{{ $x->id_pertanyaan }}"
                                                                                    value="3"></td>
                                                                            <td width="20%"><input type="radio"
                                                                                    name="{{ $x->id_pertanyaan }}"
                                                                                    value="4"></td>
                                                                            <td width="20%"><input type="radio"
                                                                                    name="{{ $x->id_pertanyaan }}"
                                                                                    value="5"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                        @foreach ($data as $x)
                                            @if ($x->tipe_pertanyaan == 'Text Field')
                                                @if ($x->status == 'Tampilkan')
                                                    <div class="col-12">
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
                                                @endif
                                            @endif
                                        @endforeach
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
