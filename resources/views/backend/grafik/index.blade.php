@extends('layouts.master')

@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
<a href="{{url('grafikadmin/add')}}" class="btn btn btn-success"><i class="fa fa-plus"></i>  Tambah Grafik</a> 
<br /><br />
<div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Grafik</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Gunakan</th>
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
              <td>{{$dt->judul}}</td>
              <td>{{$dt->aktif}}</td>
                <td>
                    @if($dt->aktif == 'Y')  
                    <a href={{url("grafikadmin/data/{$dt->id}")}} class="btn btn-xs btn-success" data-toggle="tooltip" title="Data">Data</a>
                    <a href={{url("grafikadmin/edit/{$dt->id}")}} class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                    @else
                    <a href={{url("grafikadmin/aktif/{$dt->id}")}} class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit">Aktifkan </a>
                    <a href={{url("grafikadmin/data/{$dt->id}")}} class="btn btn-xs btn-success" data-toggle="tooltip" title="Data">Data</a>
                    <a href={{url("grafikadmin/edit/{$dt->id}")}} class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                    <a href={{url("grafikadmin/delete/{$dt->id}")}} class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                    @endif
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