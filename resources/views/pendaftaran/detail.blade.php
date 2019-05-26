@extends('layouts.pendaftaran')

@section('page-header', 'Form Pendaftaran')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 class="text-center">Detail Data Pasien</h2></div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input readonly value="{{$pasien->nama_lengkap}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_id">Nomor BPJS</label>
                            <input readonly value="@if($pasien->no_id===null){{"Data Tidak Ada"}}@else{{$pasien->no_id}}@endif" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input readonly value="{{$pasien->tempat_lahir}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input readonly value="{{$pasien->tanggal_lahir}}" class="date form-control" type="date">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input readonly value="@if($pasien->jenis_kelamin===1){{"Laki-laki"}}@else{{"Wanita"}}@endif" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input readonly value="{{$pasien->agama}}" class="form-control" id="agama" name="agama">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input readonly value="@if($pasien->jenis_email===null){{"Data Tidak Ada"}}@else{{$pasien->email}}@endif" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input readonly value="@if($pasien->no_hp===null){{"Data Tidak Ada"}}@else{{$pasien->no_hp}}@endif" type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Contoh : 081111000123">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" rows="3" readonly>{{$pasien->alamat}}</textarea>
                        </div>
                        <br>
                        @php
                            $id = $pasien->id
                        @endphp
                        <div class="text-center">
                            <a href="{{ route('pendaftaran.detail-edit',$id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit Data Pasien</a>
                            <a href="{{ route('pendaftaran.delete',$id) }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Hapus Data Pasien</a>
                        </div>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
