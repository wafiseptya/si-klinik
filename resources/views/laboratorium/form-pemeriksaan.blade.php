@extends('layouts.pendaftaran')

@section('page-header', 'Pemeriksaan Lab')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h2>Form Pemeriksaan</h2></div>
                    {{-- <!-- {{$rekamMedis->id}} -->
                    <!-- <input type="text" name="periksa[]" value="{{$rekamMedis->id}}"/> --> --}}
                <div class="card-body">
                    <form action="{{route('kirim-data-pemeriksaan')}}" method="post">
                        <input type="hidden" name="rekam_medis_id" value="{{$rekamMedis->id}}" >
                        <div><!-- make button works :VVV  -->
                            @csrf
                            <div class="row">

                              @foreach ($kategoriPemeriksaan as $kategori)
                              <div class="col-md-4 mb-3">
                                  <div class="card">
                                      <div class="card-header text-center">{{$kategori->nama_kategori}}</div>
                                      <div class="card-body">
                                        @foreach ($kategori->jenis as $jenis)
                                        <label><input type="checkbox" name="periksa[]" value="{{$jenis->id}}"/> {{$jenis->nama_jenis}}</label><br />
                                        @endforeach
                                      </div>    
                                  </div>
                              </div>
                              @endforeach

                            </div>
                            
                            
                            <div class="text-center">
                                <button class="btn btn-primary btn-sx" type="submit">Daftar</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
