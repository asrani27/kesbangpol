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
        <form role="form" method="post" action={{route('admin.updatekontak', $data->id)}}>
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="{{$data->datas['judul']}}">
            </div>
            <div class="form-group">
              <label>Nama Instansi</label>
                <input type="text" class="form-control" name="instansi" value="{{$data->datas['instansi']}}">
            </div>
            <div class="form-group">
              <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$data->datas['alamat']}}">
            </div>
            <div class="form-group">
              <label>Telp</label>
                <input type="text" class="form-control" name="telp" value="{{$data->datas['telp']}}">
            </div>
            <div class="form-group">
              <label>Fax</label>
                <input type="text" class="form-control" name="fax" value="{{$data->datas['fax']}}">
            </div>
            <div class="form-group">
              <label>E-mail</label>
                <input type="text" class="form-control" name="email" value="{{$data->datas['email']}}">
            </div>
          </div>
               
                       
    
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('home')}}" class="btn btn-danger">Kembali</a>
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