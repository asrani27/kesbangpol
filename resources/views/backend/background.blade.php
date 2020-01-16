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
          <h3 class="box-title">Profil</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('admin.updatebackground')}} enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Upload Gambar</label>
                <input type="file" name="file" class="form-control" name="background">
            </div>
            <div class="form-group">
              <label>Gambar</label>
                <img src={{url("storage/background/{$image}")}} width="300px">
            </div>
          </div>
               
                       
    
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
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