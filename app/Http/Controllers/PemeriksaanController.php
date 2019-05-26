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
        $rekamMedis->status = "cek Lab";
        $rekamMedis->save();
        return view('laboratorium.form-pemeriksaan',compact('rekamMedis'));
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
            $hasilPemeriksaan->id_rekam_medis = $request->input('id_rekam_medis');
            $hasilPemeriksaan->jenis_pemeriksaan = $request->input('periksa')[$i];
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
        
        $hasilPemeriksaan = DB::table('hasil_pemeriksaan')->where('id_rekam_medis', $id)->get();
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
        
        $hasilPemeriksaan = DB::table('hasil_pemeriksaan')->where('id_rekam_medis', $id)->get();
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
        $hasilPemeriksaan = DB::table('hasil_pemeriksaan')->where('id_rekam_medis', $id)->get();
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
        $hasilPemeriksaan = DB::table('hasil_pemeriksaan')->where('id_rekam_medis', $id)->get();
        
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
