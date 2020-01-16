@extends('layouts.master')
@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('konten')
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Data Ormas</h3>
                <a href="{{ url('/ormas_admin') }}" class="btn btn-sm btn-danger pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <table border="0" width="100%">
                        <tr>
                            <td width="15%" style="font-weight: bold;">Nama Ormas</td>
                            <td width="2%">:</td>
                            <td>{{$data->data['nama']}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Masa Berlaku</td>
                            <td>:</td>
                            <td>{{$data->data['masa_berlaku']}} Tahun</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Mulai</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($data->data['mulai'])->format('d-M-Y')}} Sampai : {{\Carbon\Carbon::parse($data->data['sampai'])->format('d-M-Y')}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Status</td>
                            <td>:</td>
                            <td>{{$data->data['status']}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Keterangan</td>
                            <td>:</td>
                            <td>{{$data->data['keterangan']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Foto</h3>
                <button class="btn btn-sm btn-success upload-gambar pull-right">Tambah Foto</button>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($foto as $fot)
                       <tr>
                        <td width="10px">{{ $no++ }}</td>
                        <td width="40px"><img src="{{url('storage/'.$fot->filename)}}" width="50px" height="50px"></td>
                        <td>{{$fot->judul}}</td>
                        <td width="10%">  <a href={{ url("ormas_admin/galery/{$fot->id}/delete") }} class="btn btn-xs btn-danger" style="margin-left: 10px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>

<div class="modal fade" id="uploadGambar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Gambar </h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="{{route('saveGalery', $data->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- <input type="hidden" class="form-control" id="idormas" name="idormas"> --}}
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Judul Gambar</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="judul" name="judul" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">upload</label>
                  <div class="col-sm-8">
                    <input type="file" name="file[]" required>
                  </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection

@push('add_js')

<!-- DataTables -->
<script src="{{url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    
  $(document).on('click', '.upload-gambar', function() {
    $('#uploadGambar').modal('show');
  });
  
    $(function () {
      $('#example1').DataTable({
        'searching'   : false,
        "lengthChange": false
      })
      
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endpush    