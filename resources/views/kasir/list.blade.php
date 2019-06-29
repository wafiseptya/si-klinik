@extends('layouts.kasir')

@section('page-header', 'Kasir')

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
                    <th scope="col" class="text-center">Tanggal</th>
                    <th scope="col" class="text-center">No RM</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Parameter</th>
                    <th scope="col" class="text-center">Total Harga</th>
                    <th scope="col" class="text-center"> </th>
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
                        @php
                            $tgl = $r->created_at;
                            $tgl = time();
                            $custom_tgl = date('d-m-Y',$tgl)
                        @endphp
                        <td scope="row" class="text-center">{{$custom_tgl}}</td>
                        <td scope="row" class="text-center">
                            @php
                              $idRM = sprintf('%05d', $r->rekam_medis_id);
                            @endphp
                            {{$idRM}}
                        </td>
                        <td scope="row" class="text-center">{{$r->nama_lengkap}}</td>
                        <td scope="row" class="text-center">
                          @php
                              foreach ($r->hasilpem as $x) {
                                echo $x->jenis->nama_jenis . '<br>' ;
                              }
                          @endphp
                        </td>
                        <td scope="row" class="text-center">
                          @php
                            $total = 0;
                            foreach ($r->hasilpem as $q) {
                              $total+= $q->jenis->harga ;
                            }
                            echo 'Rp ' . number_format($total, 0, ',', '.') . ',-';
                          @endphp
                        </td>
                        <td scope="row" class="text-center">
                          <a href="{{route('kasir.show',$id)}}" style="color:white" class="btn btn-primary btn-sm">
                              Print
                          </a>
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