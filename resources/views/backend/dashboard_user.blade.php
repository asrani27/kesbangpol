@extends('layouts.master')

@section('konten')
 <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12 col-xs-6">
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
        
              <!-- ./col -->
    </div>

    <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable"> 
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
          </div>
@endsection

@push('add_js')

@endpush    