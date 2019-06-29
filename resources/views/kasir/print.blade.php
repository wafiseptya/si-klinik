@extends('layouts.print')

@section('page-header', 'Laboratorium')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" id="printPage">
                <div class="card-header">Hasil Pemeriksaan Lab</div>

                <div class="card-body">
                  <div class="col-6">
                      <table style="border-color:black" class="table table-bordered">
                        <tbody>
                          <tr style="border-color:black">
                            <td style="border-color:black; width:1%;">
                              Nama
                            </td>
                            <td style="border-color:black">
                              {{$pasien->nama_lengkap}}
                            </td>
                          </tr>
                          <tr style="border-color:black">
                            <td style="border-color:black">
                              No. RM
                            </td>
                            <td style="border-color:black">
                              @php
                                $idRM = sprintf('%05d', $rekamMedis->id);
                              @endphp
                              {{$idRM}}
                            </td>
                          </tr>
                          <tr style="border-color:black">
                            <td style="border-color:black">
                              Tanggal
                            </td>
                            <td style="border-color:black">
                              @php
                                echo date('d/m/Y', strtotime($rekamMedis->created_at));
                              @endphp
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                    <div class="col-12">
                      
                      <table class="table table-bordered mt-3">
                      <thead class="">
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Pemeriksaan</th>
                          <th scope="col" class="text-center">Harga</th>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                            $total = 0;
                        @endphp
                          @foreach ($hasilPemeriksaan as $h)
                          <tr>
                              <th scope="row" class="text-center">{{$no}}</th>
                              <td class="text-center">{{$h->jenis->nama_jenis}}</td>
                              <td class="text-center">
                                @php
                                  $total+= $h->jenis->harga ;
                                  echo 'Rp ' . number_format($h->jenis->harga, 0, ',', '.') . ',-';
                                @endphp
                              </td>
                          </tr>
                          @php
                          
                              $no++
                          @endphp     
                          @endforeach       
                          
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2">
                            Total
                          </th>
                          <th class="text-center">
                            @php
                                echo 'Rp ' . number_format($total, 0, ',', '.') . ',-';
                            @endphp
                          </th>
                        </tr>
                      </tfoot>
                      </table>
                    </div>
                  </div>
                
            </div>

            <button id="hide" onclick="printDiv(this)">Print</button>

        </div>
    </div>
</div>
@endsection
@section('js')
<script>
  function printDiv(btn){
    
    btn.style.display = 'none';
    window.print();
    
    var url = window.location.origin;
    var id = <?php echo($rekamMedis->id);?>;
    url+='/kasir/print/'+ id;

    window.location.href=url;
  }
</script>    
@endsection