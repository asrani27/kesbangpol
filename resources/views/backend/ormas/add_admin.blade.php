@extends('layouts.master')

@push('add_css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush

@section('konten')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Organisasi Masyarakat</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('admin.saveormas')}}>
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Nama Organisasi Masyarakat</label>
              <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
              <label>Aktif Mulai Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right"  name="mulai" id="datepicker" value={{\Carbon\Carbon::today()->format('d/m/Y')}}>
              </div>
            </div>
            <div class="form-group">
                <label>Masa Berlaku</label>
                <input type="text" class="form-control"  maxlength="2" name="masa_berlaku">
            </div>
            {{-- <div class="form-group">
              <label>Sampai Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right"  name="sampai" id="datepicker1" value={{\Carbon\Carbon::today()->format('d/m/Y')}}>
              </div>
            </div> --}}
            <!---- ----------------------------->
            
            <div class="form-group">
              <label>Dasar Hukum Pendirian</label>
              <input type="text" class="form-control"  name="dasar_hukum">
            </div>
            <div class="form-group">
              <label>Bidang</label>
              <input type="text" class="form-control"  name="bidang">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control"  name="status">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control"  name="keterangan">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.ormas')}}" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

@push('add_js')
<!-- bootstrap datepicker -->
<script src="{{url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    //Date picker
    $('#datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    })
    $('#datepicker1').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    })
</script>
@endpush    