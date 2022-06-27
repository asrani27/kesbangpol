@extends('layouts.master')

@push('add_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
{{-- <a href="{{url('bidang/add')}}" class="btn btn btn-success"><i class="fa fa-plus"></i> Tambah Artikel</a> --}}
<br />
<div class="box box-danger">
  <div class="box-header">
    <h3 class="box-title">Bidang</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Bidang</th>
          <th>username</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php
        $no = 1;
        ?>
      <tbody>
        @foreach ($data as $dt)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$dt->nama}}</td>
          <td>{{$dt->user == null ? '': $dt->user->username}}</td>
          <td>
            @if ($dt->user == null)
            <a href="/bidang/akun/{{$dt->id}}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Buat Akun"><i
                class="fa fa-key"></i> Buat Akun</a>
            @else
            <a href="/bidang/reset/{{$dt->id}}" class="btn btn-xs btn-info" data-toggle="tooltip" title="Reset Pass"><i
                class="fa fa-key"></i> Reset Pass</a>
            @endif
            </a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
@endsection

@push('add_js')

<!-- DataTables -->
<script src="{{url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
</script>
@endpush