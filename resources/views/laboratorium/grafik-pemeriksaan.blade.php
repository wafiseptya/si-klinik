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
                
                {{-- grafik --}}
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Bar Chart</h6>
                  <div class="mT-30">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                      <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                        </div>
                      </div>
                      <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                        </div>
                      </div>
                    </div>
                    <canvas id="dataGrafik" height="574" width="784" class="chartjs-render-monitor" style="display: block; height: 287px; width: 392px;"></canvas>
                  </div>
                </div>
                {{-- end of grafik --}}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

    <script>
      var ctx = document.getElementById('dataGrafik').getContext('2d');
      
      var key = <?php echo $key; ?>;
      var nilai = <?php echo $nilai; ?>;
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: key,
              datasets: [{
                  label: '# of Votes',
                  data: nilai,
                  backgroundColor: 'rgba(255, 99, 132, 0.8)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true,
                          precision:0
                      }
                  }],
                  xAxes: [{
                      beginAtZero: true,
                      ticks: {
                        autoSkip: false
                      }
                  }]
              }
          }
      });
    </script>

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