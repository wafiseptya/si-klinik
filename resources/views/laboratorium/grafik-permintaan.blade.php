@extends('layouts.laboratorium')

@section('page-header', 'Laboratorium')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar List Pasien</div>

                <div class="card-body">
                
                <table class="table table-bordered mt-3">
                <thead class="bg-success text-white">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Pemeriksaan</th>
                    <th scope="col" class="text-center">Jumlah</th>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                    @foreach ($hasilPemeriksaan as $h)
                    <tr>
                        <th scope="row" class="text-center">{{$no}}</th>
                        <td class="text-center">
                            
                        </td>
                        <td class="text-center">
                          {{$h->hasil}}
                        </td>
                        
                    </tr>
                    @php
                    
                        $no++
                    @endphp     
                    @endforeach       
                    
                </tbody>
                </table>
                <a href="{{route('edit-cek',$rekamMedis->id)}}" class="btn btn-success">
                    Edit
                </a>
                <a href="{{route('print-cek',$rekamMedis->id)}}" class="btn btn-primary">
                    Print
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection