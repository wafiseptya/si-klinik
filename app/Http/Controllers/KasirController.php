<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekamMedis;
use App\HasilPemeriksaan;
use App\Pasien;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rekamMedis = RekamMedis::
        with('hasilpem.jenis')
        ->join('pasiens','rekam_medis.id_pasien','=','pasiens.id')
        ->select('rekam_medis.*','rekam_medis.id AS rekam_medis_id','pasiens.nama_lengkap','pasiens.alamat','pasiens.jenis_kelamin','pasiens.tanggal_lahir')
        ->where('status', 'kasir')
        ->orderBy('created_at','desc')
        ->get();

      // return $rekamMedis[0]->hasilpem[0]->jenis->sum('harga');
      return view('kasir.list', ['rekamMedis' => $rekamMedis]);
    }

    public function riwayat()
    {
      $rekamMedis = RekamMedis::
        with('hasilpem.jenis')
        ->join('pasiens','rekam_medis.id_pasien','=','pasiens.id')
        ->select('rekam_medis.*','rekam_medis.id AS rekam_medis_id','pasiens.nama_lengkap','pasiens.alamat','pasiens.jenis_kelamin','pasiens.tanggal_lahir')
        ->where('status', 'cek Lab')
        ->orWhere('status', 'selesai')
        ->orderBy('updated_at','desc')
        ->get();
        return view('kasir.history', ['rekamMedis' => $rekamMedis]);
    }

    public function print($id)
    {

        $bayar = RekamMedis::findOrFail($id);
        $bayar->status = 'cek Lab';
        $bayar->save();

        return redirect()->route('kasir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $rekamMedis = RekamMedis::where('id', $id)->first();
      
      // if(!$rekamMedis->enter_time){
      //   date_default_timezone_set('Asia/Jakarta');
      //   $timeNow = date("Y-m-d H:i:s"); 
      //   $bayar = RekamMedis::findOrFail($id);
      //   $bayar->status = 'cek Lab';
      //   $bayar->save();
      // }
      
      // dd($rekamMedis[]);
      $pasien = Pasien::where('id', $rekamMedis->id_pasien)->get();
      // dd($pasien);
      return view('kasir.print', ['hasilPemeriksaan' => $hasilPemeriksaan, 'pasien'=>$pasien[0], 'rekamMedis'=>$rekamMedis]);
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
        //
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
        //
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
