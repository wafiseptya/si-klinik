@extends('layouts.print')

@section('page-header', 'Laboratorium')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hasil Pemeriksaan Lab</div>

                <div class="card-body">
                    <div class="p-5 border border-dark">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">
                              No
                            </div>
                            <div class="col-sm-8">
                              : 01
                            </div>
                          </div>
    
                          <div class="row">
                            <div class="col-sm-4">
                              Nama
                            </div>
                            <div class="col-sm-8">
                              : {{$pasien->nama_lengkap}}
                            </div>
                          </div>
    
                          <div class="row">
                            <div class="col-sm-4">
                              No. RM
                            </div>
                            <div class="col-sm-8">
                              @php
                                $idRM = sprintf('%05d', $rekamMedis->id);
                              @endphp
                              : {{$idRM}}
                            </div>
                          </div>
                          
    
                          <div class="row">
                            <div class="col-sm-4">
                              Umur
                            </div>
                            <div class="col-sm-8">
                            @php
                              $dob = new DateTime($pasien->tanggal_lahir);
                              $now = new DateTime();
                              $interval = $now->diff($dob);
                              echo ": ".$interval->y;
                            @endphp
                            </div>
                          </div>
    
                          <div class="row">
                            <div class="col-sm-4">
                              Jenis Kelamin
                            </div>
                            <div class="col-sm-8">
                            @if ($pasien->jenis_kelamin == 1)
                              : L
                            @else
                              : P
                            @endif
                            </div>  
                          </div>
    
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-4">
                                Alamat
                              </div>
                              <div class="col-sm-8">
                                : {{$pasien->alamat}}
                              </div>
                            </div>
      
                            <div class="row">
                              <div class="col-sm-4">
                                Kiriman dari
                              </div>
                              <div class="col-sm-8">
                                
                                @if ($rekamMedis->dengan_pemeriksaan_dokter == 1)
                                  : Dokter<br/>
                                @else
                                  : APS<br/>
                                @endif
                              </div>
                            </div>
      
                            
                            @php
                              date_default_timezone_set('Asia/Jakarta');
                              $timeNow = date("H:i"); 
                            @endphp
    
                            <div class="row">
                              <div class="col-sm-4">
                                Jam masuk
                              </div>
                              <div class="col-sm-8">
                                @if ($rekamMedis->enter_time)
                                @php
                                  echo ": " . date('H:i', strtotime($rekamMedis->enter_time)) . " WIB<br/>";
                                @endphp
                                @else
                                  : {{$timeNow}} WIB<br/>
                                @endif
                                
                              </div>
                            </div>
                            
      
                            <div class="row">
                              <div class="col-sm-4">
                                Jam keluar
                              </div>
                              <div class="col-sm-8">
                                @if ($rekamMedis->exit_time)
                                @php
                                  echo ": " . date('H:i', strtotime($rekamMedis->exit_time)) . " WIB<br/>";
                                @endphp
                                @else
                                  : -
                                @endif
                              </div>
                            </div>
      
                        </div>
                      </div>
    
                    </div>
                    
                    <table class="table table-bordered mt-3">
                    <thead class="bg-success text-white">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Pemeriksaan</th>
                        <th scope="col" class="text-center">Hasil</th>
                        <th scope="col" class="text-center">Nilai Rujukan</th>
                        <th scope="col" class="text-center">Satuan</th>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                        @foreach ($hasilPemeriksaan as $h)
                        <tr>
                            <th scope="row" class="text-center">{{$no}}</th>
                            <td class="text-center">{{$h->jenis->nama_jenis}}</td>
                            <td class="text-center">
                              {{$h->hasil}}
                            </td>
                            <td class="text-center">-</td>
                            <td class="text-center">-</td>
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