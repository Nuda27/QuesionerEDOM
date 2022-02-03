<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;
use App\Models\QEdom;
use App\Models\Matkul;
use App\Models\User;
use App\Models\JawabanEdom;
use GrahamCampbell\ResultType\Success;
//use Illuminate\Database\MySqlConnection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toastr;
use Barryvdh\DomPDF\PDF;

class quesioner extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function indexdas(){

        $quesioner_edom = DB::table('quesioner_edom')->count();
        $quesioner_fas = DB::table('quesioner_fasilitas')->count();
        $diagramedom= ($quesioner_edom/($quesioner_edom+$quesioner_fas))*100;
        $diagramfas= ($quesioner_fas/($quesioner_edom+$quesioner_fas))*100;
        $diagramdosen = DB::table('quesioner_edom')
        ->join('dosen', 'quesioner_edom.id_dosen', '=', 'dosen.id_dosen')
        ->select('quesioner_edom.id_dosen','dosen.nama_dosen',
        DB::raw('count(*) as jmlresponden'))
        ->groupBy('quesioner_edom.id_dosen')
        ->get();
        $users = DB::table('users')->count();
        $dosen = DB::table('dosen')->count();
        return view('dashboard',compact('quesioner_edom','users','quesioner_fas','diagramedom','diagramfas','diagramdosen','dosen'));
    }

    public function indexlogin(){
        return view('login');
    }

    public function login(Request $a){
        $cek = $a -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($cek)){
            $a -> session() -> regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('alert-danger', 'Maaf Username atau Password Salah');
        //dd('Login Berhasil');
        //return request()->all();
    }

    public function logout(Request $a){
        Auth::logout();

        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('/login');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerPost(Request $a)
    {
        $validate = $a->validate([
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        //$validate['password'] = bcrypt($validate['password']);
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        //$a->session()->flash('Success', 'Registration Successfully!! Lets Start to Login');
        //dd('Regis Berhasil');
        //return request()->all();
        return redirect('/login')->with('alert-success','Registration Successfully!! Lets Ready to Login');
    }

    //Dosen
    public function index()
    {
        $dataDsn = DB::table('dosen')->get();
        return view ('datadosen',['data' => $dataDsn]);
    }

    public function tambah(){
        return view('inputdosen');
    }

    public function simpan(Request $a){
        //session()->flash('Message', 'Data Berhasil Disimpan');
        //Alert::success('Success', 'Berhasil Disimpan');
        //return redirect('/datadosen')->with('alert-success','Data Berhasil Disimpan');
        try {
            DB::table('dosen')->insert([
                'id_dosen' => $a->id_dosen,
                'nama_dosen' => $a->nama_dosen,
                'alamat' => $a->alamat,
                'jenis_kelamin' => $a->jenis_kelamin,
                'no_hp' => $a->nohp,
                'email' => $a->email,
                'keahlian' => $a->keahlian
            ]);

            return redirect('/datadosen')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Error Data Tidak Valid');
        }
    }

    public function edit($id_dosen){
        $data = DB::table('dosen')->where('id_dosen',$id_dosen)->get();
        return view('editdatadosen',['kirim'=> $data]);
    }

    public function update(Request $a){

        //return redirect('/datadosen');
        try {
            DB::table('dosen')->where('id_dosen',$a->id_dosen)->update([
                'id_dosen' => $a->id_dosen,
                'nama_dosen' => $a->nama_dosen,
                'alamat' => $a->alamat,
                'jenis_kelamin' => $a->jenis_kelamin,
                'no_hp' => $a->nohp,
                'email' => $a->email,
                'keahlian' => $a->keahlian
            ]);

            return redirect('/datadosen')->with('success', 'Data Berhasil Diedit');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Error Data Tidak Valid');
        }
    }


    public function hapus($id){
        //return redirect('/datadosen');
        try {
            DB::table('dosen')->where('id_dosen',$id)->delete();
            return redirect('/datadosen')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Error Data Tidak Valid');
        }
    }

    //Matkul
    public function indexmk()
    {
        $dataMk = DB::table('matakuliah')->get();
        return view ('datamatkul',['data' => $dataMk]);
    }

    public function tambahmk(){
        return view('inputmatakuliah');
    }

    public function simpanmk(Request $a){

        //return redirect('/datamatkul');
        try {
            DB::table('matakuliah')->insert([
                'id_matkul' => $a->id_matkul,
                'nama_matkul' => $a->nama_matkul,
                'SKS' => $a->SKS,
                'semester' => $a->semester
            ]);
            return redirect('/datamatkul')->with('success', 'Mata Kuliah Berhasil Ditambahkan');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Mata Kuliah Tidak Valid');
        }
    }

    public function editmk($id){
        $data = DB::table('matakuliah')->where('id_matkul',$id)->get();
        return view('editdatamatkul',['kirim'=> $data]);
    }

    public function updatemk(Request $a){

        //return redirect('/datamatkul');
        try {
            DB::table('matakuliah')->where('id_matkul',$a->id_matkul)->update([
                'nama_matkul' => $a->nama_matkul,
                'SKS' => $a->SKS,
                'semester' => $a->semester
            ]);
            return redirect('/datamatkul')->with('success', 'Data Mata Kuliah Berhasil Diubah');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Mata Kuliah Tidak Valid');
        }
    }

    public function hapusmk($id){
       // return redirect('/datamatkul');
        try {
            DB::table('matakuliah')->where('id_matkul',$id)->delete();
            return redirect('/datamatkul')->with('success', 'Data Mata Kuliah Berhasil Dihapus');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Mata Kuliah Tidak Valid');
        }
    }

    //Fasilitas
    public function indexfas()
    {
        $dataFas = DB::table('fasilitas')->get();
        return view ('datafasilitas',['data' => $dataFas]);
    }

    public function tambahfas(){
        return view('inputfasilitas');
    }

    public function simpanfas(Request $a){
        //return redirect('/datafasilitas');
        try {
            $kode = DB::table('fasilitas')->max('id_fasilitas');
            $addNol = '';
            $kode = str_replace("F", "", $kode);
            $kode = (int) $kode + 1;
            $incrementKode = $kode;

            if (strlen($kode) == 1) {
                $addNol = "00";
            } elseif (strlen($kode) == 2) {
                $addNol = "0";
            }
            $kodeBaru = "F".$addNol.$incrementKode;

            DB::table('fasilitas')->insert([
                'id_fasilitas' => $kodeBaru,
                'nama_fasilitas' => $a->nama_fasilitas,
                'kapasitas' => $a->kapasitas,
                'keterangan' => $a->keterangan
            ]);
            return redirect('/datafasilitas')->with('success', 'Data Fasilitas Berhasil Disimpan');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Fasilitas Tidak Valid');
        }
    }

    public function editfas($id){
        $data = DB::table('fasilitas')->where('id_fasilitas',$id)->get();
        return view('editdatafasilitas',['kirim'=> $data]);
    }

    public function updatefas(Request $a){

        //return redirect('/datafasilitas');
        try {
            DB::table('fasilitas')->where('id_fasilitas',$a->id_fasilitas)->update([
                'nama_fasilitas' => $a->nama_fasilitas,
                'kapasitas' => $a->kapasitas,
                'keterangan' => $a->keterangan
            ]);
            return redirect('/datafasilitas')->with('success', 'Data Fasilitas Berhasil Diubah');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Fasilitas Tidak Valid');
        }
    }

    public function hapusfas($id){
        //return redirect('/datafasilitas');
        try {
            DB::table('fasilitas')->where('id_fasilitas',$id)->delete();
            return redirect('/datafasilitas')->with('success', 'Data Fasilitas Berhasil Dihapus');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Fasilitas Tidak Valid');
        }
    }

    public function indextan()
    {
        $dataTan = DB::table('pertanyaan')->get();
        return view ('datapertanyaan',['data' => $dataTan]);
    }

    public function tambahtan(){
        return view('inputpertanyaan');
    }

    public function simpantan(Request $a){
        //return redirect('/datapertanyaan');
        try {
            DB::table('pertanyaan')->insert([
                'id_pertanyaan' => $a->id_pertanyaan,
                'pertanyaan' => $a->pertanyaan,
                'tipe_pertanyaan' => $a->tipe_pertanyaan,
                'jenis_pertanyaan' => $a->jenis_pertanyaan,
                'status' => 'Tampilkan'
            ]);
            return redirect('/datapertanyaan')->with('success', 'Data Pertanyaan Berhasil Disimpan');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Pertanyaan Tidak Valid');
        }
    }

    public function edittan($id){
        $data = DB::table('pertanyaan')->where('id_pertanyaan',$id)->get();
        return view('editdatapertanyaan',['kirim'=> $data]);
    }

    public function updatetan(Request $a){

        //return redirect('/datapertanyaan');
        try {
            DB::table('pertanyaan')->where('id_pertanyaan',$a->id_pertanyaan)->update([
                'pertanyaan' => $a->pertanyaan,
                'tipe_pertanyaan' => $a->tipe_pertanyaan,
                'jenis_pertanyaan' => $a->jenis_pertanyaan,
                'status' => 'Tampilkan'
            ]);
            return redirect('/datapertanyaan')->with('success', 'Data Pertanyaan Berhasil Diubah');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Pertanyaan Tidak Valid');
        }
    }

    public function hapustan($id){

        //return redirect('/datapertanyaan');
        try {
            DB::table('pertanyaan')->where('id_pertanyaan',$id)->delete();
            return redirect('/datapertanyaan')->with('success', 'Data Pertanyaan Berhasil Dihapus');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Pertanyaan Tidak Valid');
        }
    }

    //quesioner edom
    public function dataedom(){
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        return view('dataquesioneredom',['data'=> $data]);
    }

    public function sembunyikandataedom(Request $a){
        DB::table('pertanyaan')->where('id_pertanyaan',$a->id)->update([
            'status' => 'Sembunyikan'
        ]);
        return redirect('/listquesioneredom');
    }

    public function tampilkandataedom(Request $a){
        DB::table('pertanyaan')->where('id_pertanyaan',$a->id)->update([
            'status' => 'Tampilkan'
        ]);
        return redirect('/listquesioneredom');
    }

    public function isiedom(){
        $dataDsn = DB::table('dosen')->get();
        $dataMk = DB::table('matakuliah')->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        return view ('quesioneredomadmin',['data'=> $data,'datadsn' => $dataDsn,'datamk' => $dataMk]);
    }

    public function tambahedom(Request $a){
        $kode = DB::table('quesioner_edom')->max('id_quesioner_edom');
    	$addNol = '';
    	$kode = str_replace("QE", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
        } elseif (strlen($kode) == 3) {
    		$addNol = "0";
        }
    	$idquesioner = "QE".$addNol.$incrementKode;

        DB::table('quesioner_edom')->insert([
            'id_quesioner_edom' => $idquesioner,
            'id_dosen' => $a->dosen,
            'id_matkul' => $a->mk,
            'semester' => $a->smt,
            'tahun' => "2022"
        ]);
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Radio Button'){
                if ($x->status == 'Tampilkan'){
                    $db=$x->id_pertanyaan;
                    DB::table('jawaban_edom')->insert([
                        'id_quesioner' => $idquesioner,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$db")
                    ]);
                }
            }
        }
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Text Field'){
                if ($x->status == 'Tampilkan'){
                    $db=$x->id_pertanyaan;
                    DB::table('jawaban_edom')->insert([
                        'id_quesioner' => $idquesioner,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$db")
                    ]);
                }
            }
        }
        return redirect('/listquesioneredom');
    }


    //laporan edom
    public function datalaporanedom(){
        $dat = QEdom::select('id_dosen', 'id_matkul', DB::raw('count(*) as dosen'),'tahun')
        ->groupBy('id_dosen', 'id_matkul','tahun')->get();
        $dosen = DB::table('dosen')->get();
        $mk = DB::table('matakuliah')->get();

        return view ('laporanedom',['data' => $dat,'dosen' => $dosen,'mk' => $mk]);
    }


    //EDOM
    public function datafas(){
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        return view('dataquesionerfasilitas',['data'=> $data]);
    }

    public function sembunyikandatafas(Request $a){
        DB::table('pertanyaan')->where('id_pertanyaan',$a->id)->update([
            'status' => 'Sembunyikan'
        ]);
        return redirect('/listquesionerfas');
    }

    public function tampilkandatafas(Request $a){
        DB::table('pertanyaan')->where('id_pertanyaan',$a->id)->update([
            'status' => 'Tampilkan'
        ]);
        return redirect('/listquesionerfas');
    }

    public function isifas(){
        $dataFas = DB::table('fasilitas')->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        return view ('quesionerfas',['data'=> $data,'datafas' => $dataFas]);
    }

    public function tambahfasi(Request $a){
        $kode = DB::table('quesioner_fasilitas')->max('id_quesioner_fas');
    	$addNol = '';
    	$kode = str_replace("QF", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
        } elseif (strlen($kode) == 3) {
    		$addNol = "0";
        }
    	$idquesioner = "QF".$addNol.$incrementKode;
        $idku=$idquesioner;
        $th=date('Y');
        DB::table('quesioner_fasilitas')->insert([
            'id_quesioner_fas' => $idquesioner,
            'id_fasilitas' => $a->fas,
            'semester' => $a->smt,
            'tahun' => $th
        ]);
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Radio Button'){
                if ($x->status == 'Tampilkan'){
                    $hasil=$x->id_pertanyaan;
                    DB::table('jawaban_fasilitas')->insert([
                        'id_quesioner' => $idku,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$hasil")
                    ]);
                }
            }
        }
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Text Field'){
                if ($x->status == 'Tampilkan'){
                    $hasil=$x->id_pertanyaan;
                    DB::table('jawaban_fasilitas')->insert([
                        'id_quesioner' => $idku,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$hasil")
                    ]);
                }
            }
        }
        return redirect('/listquesionerfas');
    }

    public function indexmhs(){
        return view('mahasiswa');
    }

    public function isiedommhs(){
        $dataDsn = DB::table('dosen')->get();
        $dataMk = DB::table('matakuliah')->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        return view ('quesioneredommhs',['data'=> $data,'datadsn' => $dataDsn,'datamk' => $dataMk]);
    }

    public function tambahedommhs(Request $a){
        $kode = DB::table('quesioner_edom')->max('id_quesioner_edom');
    	$addNol = '';
    	$kode = str_replace("QE", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
        } elseif (strlen($kode) == 3) {
    		$addNol = "0";
        }
    	$idquesioner = "QE".$addNol.$incrementKode;

        DB::table('quesioner_edom')->insert([
            'id_quesioner_edom' => $idquesioner,
            'id_dosen' => $a->dosen,
            'id_matkul' => $a->mk,
            'semester' => $a->smt,
            'tahun' => "2022"
        ]);

        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Radio Button'){
                if ($x->status == 'Tampilkan'){
                    $db=$x->id_pertanyaan;
                    DB::table('jawaban_edom')->insert([
                        'id_quesioner' => $idquesioner,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$db")
                    ]);
                }
            }
        }
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Text Field'){
                if ($x->status == 'Tampilkan'){
                    $db=$x->id_pertanyaan;
                    DB::table('jawaban_edom')->insert([
                        'id_quesioner' => $idquesioner,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$db")
                    ]);
                }
            }
        }
        return redirect('/quesioneredommhs')->with('alert-success','Data Saved!! Thank You For Evaluation');;
    }

    public function datanilai(){
        $dat = QEdom::select('id_dosen', 'id_matkul', DB::raw('count(*) as dosen'),'tahun')
        ->groupBy('id_dosen', 'id_matkul','tahun')->get();
        $dosen = DB::table('dosen')->get();
        $mk = DB::table('matakuliah')->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        return view ('nilai',['data' => $dat,'dosen' => $dosen,'mk' => $mk,'datas' => $data]);
    }

    public function raportedom($id_dosen,$id_matkul){
        $dat = DB::table('quesioner_edom')
        ->join('jawaban_edom', 'quesioner_edom.id_quesioner_edom', '=', 'jawaban_edom.id_quesioner')
        ->join('pertanyaan', 'jawaban_edom.id_pertanyaan', '=', 'pertanyaan.id_pertanyaan')
        ->select('quesioner_edom.id_dosen', 'quesioner_edom.id_matkul', 'pertanyaan.pertanyaan'
        ,'pertanyaan.id_pertanyaan','jawaban_edom.jawaban','pertanyaan.tipe_pertanyaan',
        DB::raw('count(quesioner_edom.id_quesioner_edom) as jmlresponden'),DB::raw('sum(jawaban_edom.jawaban) as skor_didapat'),DB::raw('(count(quesioner_edom.id_quesioner_edom)*5) as skor_penuh'),DB::raw('sum(jawaban_edom.jawaban)/(count(quesioner_edom.id_quesioner_edom)*5)*100 as nilai_akhir'))

        ->where('quesioner_edom.id_dosen','=',"$id_dosen")
        ->where('quesioner_edom.id_matkul','=',"$id_matkul")
        ->groupBy('pertanyaan.id_pertanyaan','quesioner_edom.id_dosen','quesioner_edom.id_matkul')
        ->get();

        $dataskor = JawabanEdom::all();
        $dosen = DB::table('dosen')->where('id_dosen',$id_dosen)->get();
        $mk = DB::table('matakuliah')->where('id_matkul',$id_matkul)->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','EDOM')->get();
        return view ('nilai',['data' => $dat,'dosen' => $dosen,'mk' => $mk,'datas' => $data,'jawaban'=>$dataskor]);
    }

    public function datalaporanfas(){
        $dat = DB::table('quesioner_fasilitas')
        ->join('fasilitas', 'quesioner_fasilitas.id_fasilitas', '=', 'fasilitas.id_fasilitas')
        ->select('quesioner_fasilitas.id_quesioner_fas', 'quesioner_fasilitas.id_fasilitas', 'fasilitas.nama_fasilitas','quesioner_fasilitas.tahun')
        ->groupBy('quesioner_fasilitas.id_fasilitas','quesioner_fasilitas.tahun')
        ->get();

        $dosen = DB::table('dosen')->get();
        $mk = DB::table('matakuliah')->get();

        return view ('laporanfas',['data' => $dat,'dosen' => $dosen,'mk' => $mk]);
    }

    public function raportfas($id_fasilitas){
        $dat = DB::table('quesioner_fasilitas')
        ->join('jawaban_fasilitas', 'quesioner_fasilitas.id_quesioner_fas', '=', 'jawaban_fasilitas.id_quesioner')
        ->join('pertanyaan', 'jawaban_fasilitas.id_pertanyaan', '=', 'pertanyaan.id_pertanyaan')
        ->join('fasilitas', 'quesioner_fasilitas.id_fasilitas', '=', 'fasilitas.id_fasilitas')
        ->select('quesioner_fasilitas.id_fasilitas','fasilitas.nama_fasilitas', 'pertanyaan.pertanyaan'
        ,'pertanyaan.id_pertanyaan','jawaban_fasilitas.jawaban','pertanyaan.tipe_pertanyaan','quesioner_fasilitas.tahun',
        DB::raw('count(quesioner_fasilitas.id_quesioner_fas) as jmlresponden'),DB::raw('sum(jawaban_fasilitas.jawaban) as skor_didapat'),DB::raw('(count(quesioner_fasilitas.id_quesioner_fas)*5) as skor_penuh'),DB::raw('sum(jawaban_fasilitas.jawaban)/(count(quesioner_fasilitas.id_quesioner_fas)*5)*100 as nilai_akhir'))

        ->where('quesioner_fasilitas.id_fasilitas','=',"$id_fasilitas")
        ->groupBy('pertanyaan.id_pertanyaan','quesioner_fasilitas.id_fasilitas','quesioner_fasilitas.tahun')
        ->get();
        $dataskor = DB::table('jawaban_fasilitas')->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        return view ('nilaifasilitas',['data' => $dat,'datas' => $data,'jawaban' => $dataskor]);
    }

    public function datafasmhs(){
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        return view('dataquesionerfasilitas',['data'=> $data]);
    }

    public function isifasmhs(){
        $dataFas = DB::table('fasilitas')->get();
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        return view ('quesionerfasmhs',['data'=> $data,'datafas' => $dataFas]);
    }

    public function tambahfasimhs(Request $a){
        $kode = DB::table('quesioner_fasilitas')->max('id_quesioner_fas');
    	$addNol = '';
    	$kode = str_replace("QF", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
        } elseif (strlen($kode) == 3) {
    		$addNol = "0";
        }
    	$idquesioner = "QF".$addNol.$incrementKode;
        $idku=$idquesioner;
        $th=date('Y');
        DB::table('quesioner_fasilitas')->insert([
            'id_quesioner_fas' => $idquesioner,
            'id_fasilitas' => $a->fas,
            'semester' => $a->smt,
            'tahun' => $th
        ]);
        $data = DB::table('pertanyaan')->where('jenis_pertanyaan','Fasilitas')->get();
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Radio Button'){
                if ($x->status == 'Tampilkan'){
                    $hasil=$x->id_pertanyaan;
                    DB::table('jawaban_fasilitas')->insert([
                        'id_quesioner' => $idku,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$hasil")
                    ]);
                }
            }
        }
        foreach($data as $x){
            if ($x->tipe_pertanyaan == 'Text Field'){
                if ($x->status == 'Tampilkan'){
                    $hasil=$x->id_pertanyaan;
                    DB::table('jawaban_fasilitas')->insert([
                        'id_quesioner' => $idku,
                        'id_pertanyaan' => $x->id_pertanyaan,
                        'jawaban'=> $a->input("$hasil")
                    ]);
                }
            }
        }
        return redirect('/quesionerfasmhs')->with('alert-success','Data Saved!! Thank You For Evaluation');;
    }
}

