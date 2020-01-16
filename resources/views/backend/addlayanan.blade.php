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
          <h3 class="box-title">Layanan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('admin.savelayanan')}}>
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Nama Layanan</label>
            <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group"> 
                <label>Isi / Deskripsi</label>
                <textarea  id="summernote" name="isi" rows="10" cols="80">
                    
                </textarea>
            </div>
            <div class="form-group">
                    <label>Publish</label>
                    <select class="form-control" name="publish">
                        <option value="Ya" selected>Ya</option>
                        <option value="Tidak" >Tidak</option>
                    </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.layanan')}}" class="btn btn-danger">Kembali</a>
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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

@endpush    