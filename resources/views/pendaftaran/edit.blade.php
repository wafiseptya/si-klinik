@extends('layouts.pendaftaran')

@section('page-header', 'Edit Pasien')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger text-center  ">
                    Ada Error, silahkan cek data kembali !
                </div>
            @endif
                <div class="card-header"><h2 class="text-center">Form Pendaftaran Pasien</h2></div>
                <div class="card-body">
                    @php
                        $id = $pasien->id;
                    @endphp
                    <form action="{{route('pendaftaran.update',$id)}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="nama_lengkap"><span style="color:red">*</span>Nama Lengkap</label>
                        @if ($errors->has('nama_lengkap'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('nama_lengkap')}}
                            </div>
                        @endif
                            <input value="{{$pasien->nama_lengkap}}" type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Data Tidak Ada">
                        </div>
                        <div class="form-group">
                            <label for="no_id">Nomor BPJS</label>
                        @if ($errors->has('no_id'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('no_id')}}
                            </div>
                        @endif
                            <input value="{{$pasien->no_id}}" type="text" class="form-control" id="no_id" name="no_id" placeholder="Data Tidak Ada">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir"><span style="color:red">*</span>Tempat Lahir</label>
                        @if ($errors->has('tempat_lahir'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('tempat_lahir')}}
                            </div>
                        @endif
                            <input value="{{$pasien->tempat_lahir}}" type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Data Tidak Ada">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir"><span style="color:red">*</span>Tanggal Lahir</label>
                        @if ($errors->has('tanggal_lahir'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('tanggal_lahir')}}
                            </div>
                        @endif
                            <input value="{{$pasien->tanggal_lahir}}" class="date form-control" type="date"  name="tanggal_lahir" id="example-date-input">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin"><span style="color:red">*</span>Jenis Kelamin</label>
                        @if ($errors->has('jenis_kelamin'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('jenis_kelamin')}}
                            </div>
                        @endif
                            <select value="{{ old('jenis_kelamin') }}" class="form-control" id="jenis_kelamin" name="jenis_kelamin">    
                                <option value="{{$pasien->jenis_kelamin}}">@if($pasien->jenis_kelamin===1){{"Laki-laki"}}@else{{"Wanita"}}@endif</option>
                                <option value="1">Laki-Laki</option>
                                <option value="0">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama"><span style="color:red">*</span>Agama</label>
                        @if ($errors->has('agama'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('agama')}}
                            </div>
                        @endif
                            <select value="{{ old('agama') }}" class="form-control" id="agama" name="agama">
                                <option value="{{$pasien->agama}}">{{$pasien->agama}}</option>
                                <option value="Islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('email')}}
                            </div>
                        @endif
                            <input value="{{$pasien->email}}" type="email" class="form-control" id="email" name="email" placeholder="Data Tidak Ada">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                        @if ($errors->has('no_hp'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('no_hp')}}
                            </div>
                        @endif
                            <input value="{{ old('no_hp') }}" type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Data Tidak Ada">
                        </div>
                        <div class="form-group">
                            <label for="alamat"><span style="color:red">*</span>Alamat</label>
                        @if ($errors->has('alamat'))
                            <div class="alert alert-danger">
                                   {{ $errors->first('alamat')}}
                            </div>
                        @endif
                            <textarea class="form-control" id="nama" name="alamat" placeholder="Data Tidak Ada" rows="3">{{ $pasien->alamat }}</textarea>
                        </div>
                        <p><span style="color:red">*</span> harus diisi</p>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-sx" type="submit">Update Data</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
