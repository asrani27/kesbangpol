@extends('layouts.master')

@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
<div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-warning" onclick="addUser()"><i class="fa fa-plus"></i> Tambah User</button><br /><br />
    </div>
</div>
<div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title">Daftar Pengguna</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Telp</th>
          <th>Role</th>
          <th>Created</th>
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
              <td>{{$dt->name}}</td>
              <td>{{$dt->email}}</td>
              <td>{{$dt->username}}</td>
              <td>{{$dt->roles->first()->name}}</td>
              <td>{{$dt->created_at}}</td>
              <td> 
                <button type="button" class="btn btn-xs btn-success edit-user"  data-id="{{$dt->id}}" data-username="{{$dt->username}}"  data-name="{{$dt->name}}" data-email="{{$dt->email}}" data-role="{{$dt->roles->first()->name}}"><i class="fa fa-edit"></i> </button>
                <a href={{url("account/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
              </td>
            </tr>
          @endforeach
        </tbody>
       </table>
    </div>
      <!-- /.box-body -->
</div>

<div class="modal fade" id="addUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah User </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action={{route('admin.saveaccount')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" placeholder="nama">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="username" name="username" maxlength="15" placeholder="08xxxxxxx">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="role">
                      @foreach ($role as $r)
                        @if($r->id == 2)
                        <option value="{{$r->id}}" selected>{{$r->name}}</option>
                        @else
                        <option value="{{$r->id}}">{{$r->name}}</option>
                        @endif
                      @endforeach
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

<div class="modal fade" id="editUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit User </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action={{route('admin.editaccount')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">     
                      <input type="hidden" class="form-control" id="idedit" name="idedit">
                      <input type="text" class="form-control" id="name" name="name" placeholder="nama">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="editemail" name="email" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="editpassword" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="editusername" name="username" maxlength="15" placeholder="08xxxxxxx">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="role" id="role">
                      @foreach ($role as $r)
                        @if($r->id == 2)
                        <option value="{{$r->id}}" selected>{{$r->name}}</option>
                        @else
                        <option value="{{$r->id}}">{{$r->name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                   Note : Login menggunakan email<br />
                   Biarkan Pass kosong jika tidak ingin diganti
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
  
  function addUser()
  {
    document.getElementById("inputEmail3").value = "";
    document.getElementById("inputPassword3").value = "";
    $('#addUser').modal('show');
    document.getElementById("inputEmail3").value = "";
    document.getElementById("username").value = "";
    document.getElementById("inputPassword3").value = "";
  }

  $(document).on('click', '.edit-user', function() {
    $('#idedit').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    $('#editemail').val($(this).data('email'));
    $('#editusername').val($(this).data('username'));
    $('#role').empty();
    var role = $(this).data('role');
    $.ajax({
                type: "GET",
                url: "{{ route('role') }}",
                success: function(resp){
                  option = "";
                  for (i=0; i<resp.length; i++) {
                    if(resp[i].name === role)
                    {
                      option += "<option value='" + resp[i].id + "' selected>" + resp[i].name + "</option>";
                    }
                    else
                    {
                      option += "<option value='" + resp[i].id + "'>" + resp[i].name + "</option>";
                    }
                  }
                  $('#role').html(option);
                }
            });
    document.getElementById("editpassword").value = "";
    $('#editUser').modal('show');
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