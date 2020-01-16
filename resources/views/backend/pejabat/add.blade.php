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
          <h3 class="box-title">Form Tambah Pejabat</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('admin.savepejabat')}}>
          {{csrf_field()}}
          <div class="box-body">
            <!---- ----------------------------->
            <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" name="nip">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control"  name="nama">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" name="jabatan">
            </div>
            <div class="form-group">
                <label>Pangkat</label>
                <input type="text" class="form-control" name="pangkat">
            </div>
        
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.pejabat')}}" class="btn btn-danger">Kembali</a>
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
      autoclose: true
    })
</script>
@endpush    