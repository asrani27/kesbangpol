@extends('layouts.master')

@push('add_css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('konten')
<a href="{{route('user.addriset')}}" class="btn btn btn-success"><i class="fa fa-plus"></i>  Ajukan Permohonan</a> 
<br /><br />
<div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Daftar Surat Rekomendasi Penelitian</h3>

      <div class="pull-right box-tools">
        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>No Pendaftaran</th>
          <th>Nama Pemohon</th>
          <th>No HP</th>
          <th>Universitas</th>
          <th>Status</th>
          <th>Keterangan</th>
          <th>Aksi</th>
          {{-- <th>Print / PDF</th> --}}
        </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
          @foreach ($data as $dt)  
            <tr>
              <td>{{$no++}}</td>
              <td>RISET0{{$dt->id}}</td>
              <td>{{$dt->datas['nama']}}</td>
              <td>{{$dt->datas['no_hp']}}</td>
              <td>{{$dt->datas['universitas']}}</td>
              <td>
                @if($dt->status == 'pending')
                <span class="badge bg-orange">Di Proses</span>
                @elseif($dt->status == 'revisi')
                <span class="badge bg-aqua">Di Revisi</span>
                @elseif($dt->status == 'approved')
                <span class="badge bg-green">Di Terima</span>
                @elseif($dt->status == 'cancel')
                <span class="badge bg-red">Di Tolak</span>
                @endif
              </td>
              <td>
                @if($dt->keterangan == null)
                -
                @else
                  {{$dt->keterangan}}
                @endif
              </td>
              <td>
                  @if($dt->status == 'approved') 
                  <a href="#" class="btn btn-xs btn-primary view-data" data-id="{{$dt->id}}" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                  @elseif($dt->status == 'cancel')
                  <a href="#" class="btn btn-xs btn-primary view-data" data-id="{{$dt->id}}" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                  @else    
                  <a href="#" class="btn btn-xs btn-primary view-data" data-id="{{$dt->id}}" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                  <a href={{url("riset/edit/{$dt->id}")}} class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                  <a href={{url("riset/delete/{$dt->id}")}} class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                  @endif
              </td>
              {{-- <td>
                <a href={{url("riset/printpdfuser")}} target="_blank">
                  <img src="{{url('assets/print.png')}}">
                </a>
                <a href={{url("riset/pdf")}}>
                  <img src="{{url('assets/pdf.png')}}">
                </a>
              </td>asd --}}
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      <!-- /.box-body -->
</div>

<div class="modal fade" id="viewRiset">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Data Riset </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" >
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Item</th>
                      <th>Value</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Nama Universitas/Lembaga/Perusahaan</td>
                      <td><label for="viewuniversitas"></label></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Nomor Surat</td>
                      <td><label for="viewnomorsurat" ></label></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Tanggal Surat</td>
                      <td><label for="viewtglsurat" ></label></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Nama</td>
                      <td><label for="viewnama" ></label></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>NIK/NIP/NIM/NPM</td>
                      <td><label for="viewnik" ></label></td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>Alamat Rumah</td>
                      <td><label for="viewalamat" ></label></td>
                    </tr>
                    <tr>
                      <td>7.</td>
                      <td>No HP</td>
                      <td><label for="viewnohp" ></label></td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>Pekerjaan</td>
                      <td><label for="viewpekerjaan" ></label></td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>Jurusan</td>
                      <td><label for="viewjurusan" ></label></td>
                    </tr>
                    <tr>
                      <td>10.</td>
                      <td>Data Dalam Rangka</td>
                      <td><label for="viewdalamrangka" ></label></td>
                    </tr>
                    <tr>
                      <td>11.</td>
                      <td>Judul Skripsi/Makalah</td>
                      <td><label for="viewjudul" ></label></td>
                    </tr>
                    <tr>
                      <td>12.</td>
                      <td>Penanggung Jawab</td>
                      <td><label for="viewpenanggungjawab" ></label></td>
                    </tr>
                    <tr>
                      <td>13.</td>
                      <td>Tempat/Objek/Riset</td>
                      <td><label for="viewtempat" ></label></td>
                    </tr>
                    <tr>
                      <td>14.</td>
                      <td>Lama Waktu</td>
                      <td><label for="viewlamawaktu" ></label></td>
                    </tr>
                    <tr>
                      <td>15.</td>
                      <td>Tembusan</td>
                      <td><label for="viewtembusan" ></label></td>
                    </tr>
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
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
  $(document).on('click', '.view-data', function() {
    var iddata = $(this).data('id');
    $.ajax({
                type: "GET",
                url: 'riset/view/'+iddata,
                success: function(resp){
                  $("label[for*='viewuniversitas']").html(resp.datas.universitas);
                  $("label[for*='viewnomorsurat']").html(resp.datas.no_surat);
                  $("label[for*='viewtglsurat']").html(resp.datas.tgl_surat);
                  $("label[for*='viewnama']").html(resp.datas.nama);
                  $("label[for*='viewnik']").html(resp.datas.nik);
                  $("label[for*='viewalamat']").html(resp.datas.alamat);
                  $("label[for*='viewnohp']").html(resp.datas.no_hp);
                  $("label[for*='viewpekerjaan']").html(resp.datas.pekerjaan);
                  $("label[for*='viewjurusan']").html(resp.datas.jurusan);
                  $("label[for*='viewdalamrangka']").html(resp.datas.riset);
                  $("label[for*='viewjudul']").html(resp.datas.judul);
                  $("label[for*='viewpenanggungjawab']").html(resp.datas.penanggung_jawab);
                  $("label[for*='viewtempat']").html(resp.datas.tempat);
                  $("label[for*='viewlamawaktu']").html(resp.datas.lama_waktu + " Bulan");
                  $("label[for*='viewtembusan']").html(resp.datas.tembusan);
                }
            });
    $('#viewRiset').modal('show');
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