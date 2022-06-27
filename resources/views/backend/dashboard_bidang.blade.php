@extends('layouts.master')

@section('konten')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>0</h3>

                <p>Kegiatan</p>
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="{{url('/bidang/jadwal')}}" class="small-box-footer">More info <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>0</h3>

                <p>Dokumen</p>
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="{{url('/bidang/dokumen')}}" class="small-box-footer">More info <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

@endsection

@push('add_js')

@endpush