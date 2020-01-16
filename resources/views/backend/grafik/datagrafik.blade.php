@extends('layouts.master')

@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
<a href="#" onclick="addData()" class="btn btn btn-success"><i class="fa fa-plus"></i>  Tambah Data</a>
<a href="{{url('grafikadmin')}}" class="btn btn btn-danger">Kembali</a> 
<br /><br />
<div class="box box-danger">
    <div class="box-header">
    <h3 class="box-title">Judul Grafik : {{$data->judul}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Label</th>
          <th>Value</th>
          <th>Warna</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <?php
        $no = 1;
        ?>
        <tbody>
          @foreach ($data->datagrafik as $dt)
          <tr>
              <td>{{$no++}}</td>
              <td>{{$dt->label}}</td>
              <td>{{$dt->value}} %</td>
              <td>{{$dt->warna}}</td>
              <td>
                  <button type="button"  class="btn btn-xs btn-warning  edit-data" data-warna="{{$dt->warna}}"  data-id="{{$dt->id}}" data-label="{{$dt->label}}" data-value="{{$dt->value}}" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </button>
                  <a href={{url("grafikdata/delete/{$dt->id}")}} class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
              </td>
            </tr>      
          @endforeach
        
        </tbody>
       </table>
    </div>
      <!-- /.box-body -->
</div>
<div class="modal fade" id="addData">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Data </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action={{route('admin.savedatagrafik')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="grafik_id" value="{{$data->id}}">
                      <input type="text" class="form-control" id="tambahlabel" name="label" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tambahvalue" name="value" required onkeypress="return hanyaAngka(event)">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Warna</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="warna">
                        <option value="merah" selected>Merah</option>
                        <option value="biru">Biru</option>
                        <option value="kuning">Kuning</option>
                        <option value="hijau">Hijau</option>
                        <option value="ungu">Ungu</option>
                        <option value="orange">Orange</option>
                    </select>
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

<div class="modal fade" id="editData">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit User </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action={{route('admin.updatedatagrafik')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-10">     
                      <input type="hidden" class="form-control" id="idedit" name="idedit">
                      <input type="text" class="form-control" id="label" name="label" placeholder="nama">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="value" name="value" onkeypress="return hanyaAngka(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Warna</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="warna" name="warna">
                        <option value="merah" selected>Merah</option>
                        <option value="biru">Biru</option>
                        <option value="kuning">Kuning</option>
                        <option value="hijau">Hijau</option>
                        <option value="ungu">Ungu</option>
                        <option value="orange">Orange</option>
                    </select>
                  </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
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
  function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
		    return true;
		  return false;
		}
   function addData()
  {
    document.getElementById("tambahlabel").value = "";
    document.getElementById("tambahvalue").value = "";
    $('#addData').modal('show');
    document.getElementById("tambahlabel").value = "";
    document.getElementById("tambahvalue").value = "";
  }
  $(document).on('click', '.edit-data', function() {
    $('#idedit').val($(this).data('id'));
    $('#label').val($(this).data('label'));
    $('#value').val($(this).data('value'));
    var warna = $(this).data('warna');
    $('#warna').empty();
    console.log(warna);
    if(warna == 'merah')
    {
      $('#warna').append( '<option value="'+warna+'" selected>Merah</option>' );
      $('#warna').append( '<option value="biru">Biru</option>' );
      $('#warna').append( '<option value="kuning">Kuning</option>' );
      $('#warna').append( '<option value="hijau">Hijau</option>' );
      $('#warna').append( '<option value="ungu">Ungu</option>' );
      $('#warna').append( '<option value="orange">Orange</option>' );
    }
    else if(warna == 'biru')
    {
      $('#warna').append( '<option value="merah" >Merah</option>' );
      $('#warna').append( '<option value="'+warna+'" selected>Biru</option>' );
      $('#warna').append( '<option value="kuning">Kuning</option>' );
      $('#warna').append( '<option value="hijau">Hijau</option>' );
      $('#warna').append( '<option value="ungu">Ungu</option>' );
      $('#warna').append( '<option value="orange">Orange</option>' );
    }
    else if(warna == 'kuning')
    {
      $('#warna').append( '<option value="merah" >Merah</option>' );
      $('#warna').append( '<option value="biru">Biru</option>' );
      $('#warna').append( '<option value="'+warna+'" selected>Kuning</option>' );
      $('#warna').append( '<option value="hijau">Hijau</option>' );
      $('#warna').append( '<option value="ungu">Ungu</option>' );
      $('#warna').append( '<option value="orange">Orange</option>' );
    }
    else if(warna == 'hijau')
    {
      $('#warna').append( '<option value="merah" >Merah</option>' );
      $('#warna').append( '<option value="biru">Biru</option>' );
      $('#warna').append( '<option value="kuning">Kuning</option>' );
      $('#warna').append( '<option value="'+warna+'" selected>Hijau</option>' );
      $('#warna').append( '<option value="ungu">Ungu</option>' );
      $('#warna').append( '<option value="orange">Orange</option>' );
    }
    else if(warna == 'ungu')
    {
      $('#warna').append( '<option value="merah" >Merah</option>' );
      $('#warna').append( '<option value="biru">Biru</option>' );
      $('#warna').append( '<option value="kuning">Kuning</option>' );
      $('#warna').append( '<option value="hijau">Hijau</option>' );
      $('#warna').append( '<option value="'+warna+'" selected>Ungu</option>' );
      $('#warna').append( '<option value="orange">Orange</option>' );
    }
    else
    {
      $('#warna').append( '<option value="merah" >Merah</option>' );
      $('#warna').append( '<option value="biru">Biru</option>' );
      $('#warna').append( '<option value="kuning">Kuning</option>' );
      $('#warna').append( '<option value="hijau">Hijau</option>' );
      $('#warna').append( '<option value="ungu">Ungu</option>' );
      $('#warna').append( '<option value="'+warna+'" selected>Orange</option>' );
    }
    $('#editData').modal('show');
  });

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