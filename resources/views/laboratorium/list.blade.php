@extends('layouts.laboratorium')

@section('page-header', 'Laboratorium')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              @php
                $timeNow = date("l, d F Y"); 
              @endphp
                <div class="card-header">Daftar List Pasien <span class="float-right">{{$timeNow}}</span></div>

                <div class="card-body">
                
                <table id="dataTable" class="table table-bordered table-hover">
                <thead >
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">RM</th>
                    <th scope="col" class="text-center">Nama Pasien</th>
                    <th scope="col" class="text-center">Umur</th>
                    <th scope="col" class="text-center">Jenis Kelamin</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Ket. Pemeriksaan</th>
                    {{-- <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Aksi</th> --}}
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                    @foreach ($rekamMedis as $r)
                        @php
                            $id = $r->rekam_medis_id
                        @endphp
                    <tr>
                        <td scope="row" class="text-center">{{$no}}</td>
                        <td scope="row" class="text-center">
                            @php
                              $idRM = sprintf('%05d', $r->rekam_medis_id);
                            @endphp
                            {{$idRM}}                        
                        </td>
                        <td scope="row" class="text-center">{{$r->nama_lengkap}}</td>
                        <td scope="row" class="text-center">
                          @php
                              $date = new DateTime($r->tanggal_lahir);
                              $now = new DateTime();
                              $interval = $now->diff($date);
                              echo $interval->y;
                          @endphp
                        </td>
                        <td scope="row" class="text-center">
                          @if ($r->jenis_kelamin == 1)
                              L
                          @else
                              P
                          @endif
                        </td>
                        <td scope="row" class="text-center">{{$r->alamat}}</td>
                        <td scope="row" class="text-center">
                          @if ($r->dengan_pemeriksaan_dokter == 1)
                          <a href="#" style="cursor:default;color:white" class="btn btn-success btn-sm">
                              Dokter
                          </a>
                            
                          @else
                          <a href="{{route('insert-cek',$id)}}" style="color:white" class="btn btn-primary btn-sm">
                              APS
                          </a>
                              
                          @endif
                        </td>
                        {{-- <td class="text-center">{{$r->status}}</td>
                        <td class="text-center">
                            <a href="{{route('insert-cek',$id)}}" style="color:white" class="btn btn-primary btn-sm">
                                Masukan data
                            </a>
                        </td> --}}
                    </tr>   
                    @php
                        $no++
                    @endphp     
                    @endforeach       
                    
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection