@extends('layouts.master')

@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
<a href="{{route('user.addormas')}}" class="btn btn btn-danger"><i class="fa fa-plus"></i>  Ajukan Permohonan</a> <br /><br />
<div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Daftar ORMAS</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama ORMAS</th>
          <th>Bentuk Organisasi</th>
          <th>Nama Pemohon</th>
          <th>Status</th>
          <th>Aksi</th>
          <th>Export to PDF</th>
        </tr>
        </thead>
        <tbody>

        <tr>
          <td>1</td>
          <td>FTAPS</td>
          <td>LSM</td>
          <td>FTAPS</td>
          <td><span class="badge bg-yellow">Pending</span></td>
          <td>
              <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
              <a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> </a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
          </td>
          <td><a href="#" class="btn btn-sm bg-maroon"><i class="fa fa-file-pdf-o"></i> </a></td>
        </tr>
        <tr>
          <td>2</td>
          <td>ORMAS WA</td>
          <td>LSM</td>
          <td>FTAPS</td>
          <td><span class="badge bg-green">Approved</span></td>
          <td>
              <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
              <a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> </a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
          </td>
          <td><a href="#" class="btn btn-sm bg-maroon"><i class="fa fa-file-pdf-o"></i> </a></td>
        </tr>
        <tr>
          <td>3</td>
          <td>ORMAS SAKTI</td>
          <td>LSM</td>
          <td>FTAPS</td>
          <td><span class="badge bg-red">Denied</span></td>
          <td>
              <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
              <a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> </a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
          </td>
          <td><a href="#" class="btn btn-sm bg-maroon"><i class="fa fa-file-pdf-o"></i> </a></td>
        </tr>
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