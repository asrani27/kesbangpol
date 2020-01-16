@extends('layouts.master')

@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
<a href="{{route('admin.addpejabat')}}" class="btn btn btn-success"><i class="fa fa-plus"></i>  Tambah Pejabat</a> 
<br /><br />
<div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Daftar Pejabat</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Pangkat</th>
          <th>Gunakan</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <?php
        $no = 1;
        ?>
        <tbody>
          @foreach ($p as $dt)
          <tr>
              <td>{{$no++}}</td>
              <td>{{$dt->data['nip']}}</td>  
              <td>{{$dt->data['nama']}}</td>
              <td>{{$dt->data['jabatan']}}</td>
              <td>{{$dt->data['pangkat']}}</td>
              <td>
                @if($dt->status == 'Y')  
                <small class="label bg-green"><i class="fa fa-check"></i>  Ya</small>
                 @else
                 <small class="label bg-red"><i class="fa fa-close"></i>  Tidak</small>
                 @endif
            
                </td>
              <td> 
                    @if($dt->status == 'Y')  
                    <a href={{url("pejabat/edit/{$dt->id}")}} class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                    @else
                    <a href={{url("pejabat/aktif/{$dt->id}")}} class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit">Aktifkan </a>
                    <a href={{url("pejabat/edit/{$dt->id}")}} class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                    <a href={{url("pejabat/delete/{$dt->id}")}} class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>  
             
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