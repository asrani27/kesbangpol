@extends('layouts.master')

@push('add_css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush

@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ganti Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{route('gantipass.save')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password1" id="pass1" onkeyup="cekPass()" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Masukkan Password Lagi</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password2" id="pass2" onkeyup="cekPass()" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" onclick="showPass()"> Tampilkan Password
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <div id="cekPassword">
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
</div>
@endsection

@push('add_js')
<!-- bootstrap datepicker -->
<script src="{{url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    function showPass()
    {
        var x = document.getElementById("pass1");
        var z = document.getElementById("pass2");
        if (x.type === "password" && z.type === "password") {
            x.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            z.type = "password";
        }
    }

    function cekPass()
    {
        var pass1 = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;
        if (pass1 != pass2)
        {
            document.getElementById('cekPassword').innerHTML = '<b><font color=red>Password Tidak Sama</font></b>';
        }
        else
        {
            document.getElementById('cekPassword').innerHTML = '<b><font color=green>Password Sesuai</font></b>';
        }
    }
</script>
@endpush    