@extends('layouts.laboratorium')

@section('page-header', 'Laboratorium - Data Pemriksaan
')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jumlah Permintaan Pemeriksaan</div>

                <div class="card-body">
                <div class="p-5 mb-3">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row mb-2 ">
                        <div class="col-sm-4 align-self-center">
                          Bulan
                        </div>
                        <div class="col-sm-8">
                          <select id="month" class="custom-select" name="month">
                              @php
                              setlocale(LC_ALL, 'id_ID');
                              for ($i = 1; $i <= 12; $i++) {
                                  // $time = strtotime(sprintf('%d months', $i));
                                  $label = strftime('%B', mktime(0, 0, 0, $i, 1, 2000));
                                  $value = strftime('%m', mktime(0, 0, 0, $i, 1, 2000));
                                  echo '<option value="'.$value.'"'.($value == $month ? ' selected' : '').'>'.$label.'</option>';
                              }
                              @endphp
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-4 align-self-center">
                          Tahun
                        </div>
                        <div class="col-sm-8">
                          @php 
                            // Year to start available options at
                            $earliest_year = 2000; 
                            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                            $latest_year = date('Y'); 

                            echo '<select id="year" class="custom-select" name="year">';
                            // Loops over each int[year] from current year, back to the $earliest_year [1950]
                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                              // Prints the option with the next year in range.
                              echo '<option value="'.$i.'"'.($i == $year ? ' selected' : '').'>'.$i.'</option>';
                            }
                            echo '</select>';
                          @endphp
                        </div>
                      </div>
  
                    </div>
                  </div>

                </div>
                
                <table id="dataTable" class="table table-bordered table-hover mt-3">
                <thead>
                    <th scope="col" width="5%" class="text-center">No</th>
                    <th scope="col" class="">Nama Pemeriksaan</th>
                    <th scope="col" class="text-center">Jumlah</th>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                    @foreach ($jenisPemeriksaan as $h)
                    <tr>
                        <th scope="row" class="text-center">{{$no}}</th>
                        <td class="">{{$h->nama_jenis}}</td>
                        <td class="text-center">
                            {{$h->hasil->count()}}
                        </td>
                    </tr>
                    @php
                    
                        $no++
                    @endphp     
                    @endforeach       
                    
                </tbody>
                </table>

                <a href="{{route('grafik-pemeriksaan',[$month ,$year])}}" class="btn btn-success">
                    Grafik
                </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
      $('.custom-select').change(function(){
      
      var url = window.location.origin;
      var month = '<?php echo($month);?>';
      var year = '<?php echo($year);?>';
      url+='/data/'
      // if($("#month").val() != month)
      url+=encodeURIComponent($("#month").val())+'/';
      url+=encodeURIComponent($("#year").val())+'/';
      
      // if($("#year").val() != year)
      
      // url = url.replace(/\&$/,'');
      // alert(url);
      window.location.href=url;
      
      });
    </script>
@endsection