@extends('layouts.pendaftaran')

@section('page-header', 'Pendaftaran')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (Session::get('status'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('status')}}
                        </div>
                    @endif
                    @role('pendaftaran')
                        
                        <div class="text-center my-md-5">
                            <a href="{{ route('pendaftaran.form') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pasien Baru</a>
                            <!-- <br>
                            <br> -->
                            <a href="{{ route('pendaftaran.list') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Pasien Lama</a>
                        </div>
                        <div>
                            <p>
                            <span style="color:red">*</span>Pilih "Pasien Baru" jika ingin memasukan data pasien baru.<br>
                            <span style="color:red">*</span>Pilih "Pasien Lama" jika ingin melihat dan mencari pasien lama.
                            </p>
                        </div>

                    @endrole
                    @role('dokter')
                        Bagian Dokter
                    @endrole
                    @role('laboratorium')
                        <div class="text-center">                        
                            <a href="{{ route('list-cek') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">List Belum Terisi</a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
