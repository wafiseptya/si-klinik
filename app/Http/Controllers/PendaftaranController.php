<?php

namespace App\Http\Controllers;

use App\Pasien;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pendaftaran.form');
    }

    public function home()
    {
        return view('pendaftaran.home');
    }

    public function detail($id)
    {
        $pasien = Pasien::find($id);
        // dd($pasien  );
        return view('pendaftaran.detail', compact('pasien'));
    }

    public function list(Request $request)
    {
        // $pasien = Pasien::find($id);
        $pasiens = DB::table('pasiens')->whereNull('deleted_at')->orderBy('created_at','desc')->get();
        return view('pendaftaran.list', ['pasiens' => $pasiens]);
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
        $validatedData = $request->validate(
            [
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            ],
            [
            'nama_lengkap.required' => 'Silahkan isi Nama Lengkap',
            'no_id.required'=> 'Silahkan isi Nomor ID',
            'tempat_lahir.required' => 'Silahkan isi Tempat Lahir',
            'tanggal_lahir.required' => 'Silahkan isi Tanggal Lahir',
            'jenis_kelamin.required' => 'Silahkan isi Jenis Kelamin',
            'agama.required' => 'Silahkan isi Agama',
            'alamat.required' => 'Silahkan isi Alamat',
            'email.unique' => 'Alamat email sudah digunakan',
            ]
        );

        $pasien = new Pasien;
        $pasien->nama_lengkap = $request->input('nama_lengkap'); 
        $pasien->no_id = $request->input('no_id'); 
        $pasien->tempat_lahir = $request->input('tempat_lahir'); 
        $pasien->tanggal_lahir = $request->input('tanggal_lahir'); 
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        if ( empty($pasien->email) ) {
            $pasien->email = NULL;
        } else {
            $pasien->email = $request->input('email');
        }
         
        $pasien->no_hp = $request->input('no_hp');
        $pasien->agama = $request->input('agama');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();

        return redirect()->route('pendaftaran.home')->with('status', 'Data pasien barus berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDataDetailNow($id)
    { 
        $pasien = Pasien::find($id);
        // dd($pasien  );
        return view('pendaftaran.edit', compact('pasien'));
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
        // dd($id);
        $validatedData = $request->validate(
            [
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            ],
            [
            'nama_lengkap.required' => 'Silahkan isi Nama Lengkap',
            'no_id.required'=> 'Silahkan isi Nomor ID',
            'tempat_lahir.required' => 'Silahkan isi Tempat Lahir',
            'tanggal_lahir.required' => 'Silahkan isi Tanggal Lahir',
            'jenis_kelamin.required' => 'Silahkan isi Jenis Kelamin',
            'agama.required' => 'Silahkan isi Agama',
            'alamat.required' => 'Silahkan isi Alamat',
            'email.unique' => 'Alamat email sudah digunakan',
            ]
        );
        $pasien = Pasien::find($id);
        $pasien->nama_lengkap = $request->input('nama_lengkap'); 
        $pasien->no_id = $request->input('no_id'); 
        $pasien->tempat_lahir = $request->input('tempat_lahir'); 
        $pasien->tanggal_lahir = $request->input('tanggal_lahir'); 
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        if ( empty($pasien->email) ) {
            $pasien->email = NULL;
        } else {
            $pasien->email = $request->input('email');
        }
         
        $pasien->no_hp = $request->input('no_hp');
        $pasien->agama = $request->input('agama');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();
        return redirect()->route('pendaftaran.home')->with('status', 'Data pasien barus berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        // dd($pasien  );
        return redirect()->route('list');
    }
}
