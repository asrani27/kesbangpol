@extends('layouts.master')

@push('add_css')
<link rel="stylesheet" href="{{url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

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
          <h3 class="box-title">Tambah Kegiatan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('admin.savekegiatan')}} enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="box-body"><!-- Date -->
            <div class="form-group">
              <label>Tanggal Kegiatan</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <div class="form-group">
              <label>Jam Kegiatan</label>
              <input type="text" class="form-control" name="jam" required>
            </div>
            <div class="form-group">
              <label>Nama Kegiatan</label>
              <input type="text" class="form-control" name="kegiatan" required>
            </div>
            <div class="form-group">
              <label>Tempat Kegiatan</label>
              <input type="text" class="form-control" name="tempat" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" name="keterangan" required>
            </div>
            {{-- <div class="form-group">
                    <label>Publish</label>
                    <select class="form-control" name="publish">
                        <option value="Y" selected>Ya</option>
                        <option value="T" >Tidak</option>
                    </select>
            </div> --}}
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.kegiatan')}}" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

@push('add_js')
<!-- CK Editor -->
<script src="{{url('assets/bower_components/ckeditor/ckeditor.js')}}"></script>

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
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
  })
</script>

@endpush    