@extends('layouts.master')

@section('konten')
 <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>{{$countRiset}}</h3>

              <p>Surat Rekomendasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{url('/riset')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>1</h3>
      
                    <p>SPANDUK</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-group"></i>
                  </div>
                  <a href="{{url('/ormas')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
              <!-- ./col -->
    </div>

    <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable"> 
                <!-- Map box -->
                <div class="box box-solid bg-green-gradient">
                  <div class="box-header">
                    <h3 class="box-title">
                      Syarat Permohonan Rekomendasi
                    </h3>
                  </div>
                  <div class="box-body">
                    
                  </div>
                </div>
                <!-- /.box -->    
              </section>
            <!-- /.Left col -->


            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable"> 
              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <h3 class="box-title">
                    Syarat Pendaftaran SPANDUK
                  </h3>
                </div>
                <div class="box-body">
                  
                </div>
              </div>
              <!-- /.box -->    
            </section>
            <!-- right col -->
          </div>
@endsection

@push('add_js')

@endpush    