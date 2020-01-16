@extends('layouts.master')

@push('add_css')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
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
        <form role="form" method="post" action={{route('admin.updateprofil', $data->id)}}>
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="{{$data->judul}}">
            </div>
            <div class="form-group"> 
                <label>Isi / Deskripsi</label>
                <textarea id="summernote" name="isi">
                    {{$data->isi}}
                </textarea>

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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

@endpush 