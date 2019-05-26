@extends('layouts.laboratorium')

@section('page-header', 'Laboratorium')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Hasil Pasien</div>

                <div class="card-body">
                <form method="POST" action="{{route('proses-lab',$rekamMedis->id)}}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  @foreach ($hasilPemeriksaan as $h)
                    <div class="form-group">
                      <label for="{{$h->id}}">{{$h->jenis_pemeriksaan}}</label>
                      <input type="text" class="form-control" name="{{$h->id}}" id="{{$h->id}}" placeholder="Masukkan hasil pemeriksaan">
                    </div>     
                  @endforeach       
                  <button type="submit" class="btn btn-success">
                      Save
                  </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection