@extends('layouts.laboratorium')

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
