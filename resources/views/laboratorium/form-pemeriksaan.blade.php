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
                        <input type="hidden" name="id_rekam_medis" value="{{$rekamMedis->id}}" >
                        <div><!-- make button works :VVV  -->
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-header text-center">HEMATOLOGI RUTIN</div>
                                        <div class="card-body">
                                          <label><input type="checkbox" name="periksa[]" value="Hematologi Rutin"/> Hematologi Rutin</label><br />
                                          <label><input type="checkbox" name="periksa[]" value="Hemoglobin"/> Hemoglobin</label><br />
                                          <label><input type="checkbox" name="periksa[]" value="Leukosit"/> Leukosit</label><br /> 
                                          <label><input type="checkbox" name="periksa[]" value="Diff / LED"/> Diff / LED</label><br />
                                          <label><input type="checkbox" name="periksa[]" value="Trombosit"/> Trombosit</label><br />
                                          <label><input type="checkbox" name="periksa[]" value="Gol. Darah / Rhesus Faktor"/> Gol. Darah / Rhesus Faktor</label><br />
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-header text-center">FAKTOR KUAGULASI</div>
                                        <div class="card-body">
                                            <label><input type="checkbox" name="periksa[]" value="Waktu Pendarahan"/> Waktu Pendarahan</label><br />
                                            <label><input type="checkbox" name="periksa[]" value="Waktu Pembekuan"/> Waktu Pembekuan</label><br />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-header text-center">ANEMIA</div>
                                        <div class="card-body">    
                                            <label><input type="checkbox" name="periksa[]" value="Retikulosit"/> Retikulosit</label><br />
                                            <label><input type="checkbox" name="periksa[]" value="Gambaran Darah Tepi"/> Gambaran Darah Tepi</label><br />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        KIMIA DARAH DIABETES
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Glukosa Puasa*"/> Glukosa Puasa*</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Glukosa 2 Jam PP"/> Glukosa 2 Jam PP</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Glukosa Sewaktu"/> Glukosa Sewaktu</label><br />
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        FAAL GINJAL
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Umum"/> Umum</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Creatinine"/> Creatinine</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Uric Acid"/> Uric Acid</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        LEMAK
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Kolesterol Total"/> Kolesterol Total *</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Trihlyceride (Puasa)"/> Trihlyceride (Puasa)*</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        FAAL HATI
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="SGOT/SGPT"/> SGOT/SGPT</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        INFEKSI LAIN
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Widal"/> Widal</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Malaria"/> Malaria</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        NARKOBA
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Ampetamine"/> Ampetamine</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        URNALISA
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Urine Rutin"/> Urine Rutin</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Urine Lengkap"/> Urine Lengkap</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Test Kehamilan(PP Test)"/> Test Kehamilan(PP Test)</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Test Kehamilan HCG"/> Test Kehamilan HCG</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        FEACESS
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Rutin"/> Rutin</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        SPUTUM
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Dir Prep BTA"/> Dir Prep BTA</label><br />                                            
                                        <label><input type="checkbox" name="periksa[]"> Malaria</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        SEKRET
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Uretra(GO)"/> Uretra(GO)</label><br />
                                        <label><input type="checkbox" name="periksa[]" value="Vagina(GO,Candida)"/> Vagina(GO,Candida)</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        RADIOLOGI
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="Foto Toraks"/> Foto Toraks</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        FAAL HATI
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label>
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label><br />
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label>
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label><br />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        FAAL HATI
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label>
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label><br />
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label>
                                        <label><input type="checkbox" name=""/> SGOT/SGPT</label><br />

                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-header text-center">
                                        LAIN
                                    </div>
                                    <div class="card-body">
                                        <label><input type="checkbox" name="periksa[]" value="EKG"/> EKG</label><br />
                                    </div>
                                  </div>
                                </div>

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
