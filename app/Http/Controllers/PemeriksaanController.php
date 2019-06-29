<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\RekamMedis;
use App\HasilPemeriksaan;
use App\KategoriPemeriksaan;
use App\JenisPemeriksaan;
use App\Pasien;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {           
        $rekamMedis = RekamMedis::
        join('pasiens','rekam_medis.id_pasien','=','pasiens.id')
        ->select('rekam_medis.*','rekam_medis.id AS rekam_medis_id','pasiens.nama_lengkap','pasiens.alamat','pasiens.jenis_kelamin','pasiens.tanggal_lahir')
        ->where('status', 'cek Lab')
        ->orderBy('updated_at','desc')->get();
        return view('laboratorium.list', ['rekamMedis' => $rekamMedis]);
    }

    public function home(){
      return view ('laboratorium.home');
    }

    public function data($month, $year){

      $jenisPemeriksaan = JenisPemeriksaan::has('hasil')->with('hasil')
      ->whereYear('created_at', '=', $year)
      ->whereMonth('created_at', '=', $month)
      ->get();
      // $hasilPemeriksaan = HasilPemeriksaan::with('jenis')->get();

      return view('laboratorium.data-pemeriksaan',compact('month','year', 'jenisPemeriksaan'));
    }

    public function grafik($month, $year){

      // $jenisPemeriksaan = JenisPemeriksaan::has('hasil')->with('hasil')
      // ->whereYear('created_at', '=', $year)
      // ->whereMonth('created_at', '=', $month)
      // ->get()->toArray();
      // $jenisPemeriksaan = array_column($jenisPemeriksaan, 'nama_jenis');
      
      $countPemeriksaan = JenisPemeriksaan::has('hasil')->with('hasil')
      ->whereYear('created_at', '=', $year)
      ->whereMonth('created_at', '=', $month)
      ->get();
      $key = array();
      $value = array();
      foreach ($countPemeriksaan as $h) {
        $key[] = $h->nama_jenis;
        $value[] = $h->hasil->count();
      }
      // $click = Click::select(DB::raw("SUM(numberofclick) as count"))
      //     ->orderBy("created_at")
      //     ->groupBy(DB::raw("year(created_at)"))
      //     ->get()->toArray();
      // $click = array_column($click, 'count');

      // $data = $jenisPemeriksaan->toArray();
      // print_r($jenisPemeriksaan);
      // $hasilPemeriksaan = HasilPemeriksaan::with('jenis')->get();

      return view('laboratorium.grafik-pemeriksaan',compact('month','year'))
      ->with('key',json_encode($key))
      ->with('nilai',json_encode($value,JSON_NUMERIC_CHECK));
    }

    public function history(Request $request)
    {           
        $rekamMedis = RekamMedis::
        join('pasiens','rekam_medis.id_pasien','=','pasiens.id')
        ->select('rekam_medis.*','rekam_medis.id AS rekam_medis_id','pasiens.nama_lengkap','pasiens.alamat','pasiens.jenis_kelamin','pasiens.tanggal_lahir')
        ->where('status', 'selesai')->orderBy('updated_at','desc')->get();
        return view('laboratorium.list', ['rekamMedis' => $rekamMedis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rekamMedis = new RekamMedis;
        $rekamMedis->id_pasien = $id;
        $rekamMedis->status = "kasir";
        $rekamMedis->save();
        
        $kategoriPemeriksaan = KategoriPemeriksaan::with('jenis')->get();
        
        return view('laboratorium.form-pemeriksaan',compact('rekamMedis', 'kategoriPemeriksaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $hasilPemeriksaan = new
        $jumlah = count($request->input('periksa'));
        for($i=0;$i<$jumlah;$i++){
            $hasilPemeriksaan = new HasilPemeriksaan;
            $hasilPemeriksaan->rekam_medis_id = $request->input('rekam_medis_id');
            $hasilPemeriksaan->jenis_pemeriksaan_id = $request->input('periksa')[$i];
            $hasilPemeriksaan->save();
        }
        return redirect()->route('pendaftaran.home')->with('status', 'Pasien berhasil diproses ke Laboratorium!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $hasilPemeriksaan = HasilPemeriksaan::with('jenis')->where('rekam_medis_id', $id)->get();
        $rekamMedis = DB::table('rekam_medis')->where('id', $id)->first();
        
        if(!$rekamMedis->enter_time){
          date_default_timezone_set('Asia/Jakarta');
          $timeNow = date("Y-m-d H:i:s"); 
          $updateTime = RekamMedis::findOrFail($id);
          $updateTime->enter_time = $timeNow;
          $updateTime->save();
        }
        
        // dd($rekamMedis[]);
        $pasien = DB::table('pasiens')->where('id', $rekamMedis->id_pasien)->get();
        // dd($pasien);
        return view('laboratorium.insert', ['hasilPemeriksaan' => $hasilPemeriksaan, 'pasien'=>$pasien[0], 'rekamMedis'=>$rekamMedis]);
        // dd($hasilPemeriksaan[0]->id);
    }

    public function print($id)
    {
        
        $hasilPemeriksaan = HasilPemeriksaan::with('jenis')->where('rekam_medis_id', $id)->get();
        $rekamMedis = DB::table('rekam_medis')->where('id', $id)->first();
        
        // dd($rekamMedis[]);
        $pasien = DB::table('pasiens')->where('id', $rekamMedis->id_pasien)->get();
        // dd($pasien);
        return view('laboratorium.print', ['hasilPemeriksaan' => $hasilPemeriksaan, 'pasien'=>$pasien[0], 'rekamMedis'=>$rekamMedis]);
        // dd($hasilPemeriksaan[0]->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hasilPemeriksaan = HasilPemeriksaan::with('jenis')->where('rekam_medis_id', $id)->get();
        $rekamMedis = DB::table('rekam_medis')->where('id', $id)->first();
        $pasien = DB::table('pasiens')->where('id', $rekamMedis->id_pasien)->get();
        return view('laboratorium.edit', ['hasilPemeriksaan' => $hasilPemeriksaan, 'pasien'=>$pasien[0], 'rekamMedis'=>$rekamMedis]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hasilPemeriksaan = DB::table('hasil_pemeriksaan')->where('rekam_medis_id', $id)->get();
        
        foreach ($hasilPemeriksaan as $data) {
          
          $update = HasilPemeriksaan::findOrFail($data->id);
          $update->hasil = $request->{$data->id};
          $update->save();
        }
        
        date_default_timezone_set('Asia/Jakarta');
        $timeNow = date("Y-m-d H:i:s"); 
        $updateTime = RekamMedis::findOrFail($id);
        $updateTime->exit_time = $timeNow;
        $updateTime->status = "selesai";
        $updateTime->save();

        return redirect()->route('insert-cek',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
