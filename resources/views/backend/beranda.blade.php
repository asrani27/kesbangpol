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
          <h3 class="box-title">Beranda</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('admin.updateberanda', $data->id)}}>
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="{{$data->judul}}">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{$data->deskripsi}}">
            </div>
          </div>

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
@endpush    