@extends('layouts.pendaftaran')

@section('page-header', 'Daftar Pasien')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar List Pasien</div>

                <div class="card-body">
                <table id="dataTable" class="table table-hover table-striped table-bordered" cellspacing="0">
                <thead >
                    <tr>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Jenis Kelamin</th>
                        <th scope="col" class="text-center">Alamat</th>
                        <th scope="col" class="text-center" width="50%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pasiens as $pasien)
                    <tr>
                        @php
                            $id = $pasien->id
                        @endphp
                        <th scope="row" class="text-center">{{$pasien->id}}</th>
                        <td class="text-center">{{$pasien->nama_lengkap}}</td>
                        <td class="text-center">
                        @if ($pasien->jenis_kelamin===1)
                            {{"Laki-laki"}}
                        @else
                            {{"Wanita"}}
                        @endif
                        </td>
                        <td class="text-center">{!! str_limit($pasien->alamat, 72, '...') !!}</td>
                        <td class="text-center">
                            <a href="#" style="color:white" class="mb-1 btn btn-primary btn-sm">
                                Periksa Dokter
                            </a>
                            <a href="{{ route('periksa',$id) }}" style="color:white" class="mb-1 btn btn-primary btn-sm">
                                Cek Laboratorium
                            </a>
                            <a href="{{ route('pendaftaran.detail',$id) }}" style="color:white" class="btn btn-secondary btn-sm">
                                Detail Data
                            </a>
                            
                        </td>
                    </tr>        
                    @endforeach          
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection