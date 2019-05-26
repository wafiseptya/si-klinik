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
                          No<br/>
                          Nama<br/>
                          No. RM<br/>
                          Umur<br/>
                          Jenis Kelamin<br/>
                        </div>
                        <div class="col-sm-8">
                          : 01<br/>
                          : {{$pasien->nama_lengkap}}<br/>
                          @php
                            $idRM = sprintf('%05d', $rekamMedis->id);
                          @endphp
                          : {{$idRM}}<br/>
                          @php
                                $dob = new DateTime($pasien->tanggal_lahir);
                                $now = new DateTime();
                                $interval = $now->diff($dob);
                                echo ": ".$interval->y . "<br/>";
                          @endphp
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
                          Alamat<br/>
                          Kiriman dari<br/>
                          Jam masuk<br/>
                          Jam keluar<br/>
                        </div>
                        <div class="col-sm-8">
                            : {{$pasien->alamat}}<br/>
                            
                            @php
                              date_default_timezone_set('Asia/Jakarta');
                              $timeNow = date("H:i"); 
                            @endphp
                            @if ($rekamMedis->dengan_pemeriksaan_dokter == 1)
                                : Dokter<br/>
                            @else
                                : APS<br/>
                            @endif
                            @if ($rekamMedis->enter_time)
                            @php
                              echo ": " . date('H:i', strtotime($rekamMedis->enter_time)) . " WIB<br/>";
                            @endphp
                            @else
                              : {{$timeNow}} WIB<br/>
                            @endif
                            
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
                        <td class="text-center">{{$h->jenis_pemeriksaan}}</td>
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