@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
@endsection

@section('content')
<br /><br />
<div id="profil" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">Organisasi Masyarakat Terdaftar</h2>
        <!-- begin row -->
        <div class="row">
           
<table id="example" class="display" style="width:100%">
    <thead>
            <tr>
                    <th>No</th>
                    <th>Nama Ormas</th>
                    <th>Dasar Hukum Pendirian</th>
                    <th>Bidang</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th></th>
                  </tr>
    </thead>
    <?php
    $no = 1;
    ?>
    <tbody>
            @foreach ($d as $dt)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$dt->datas['nama']}}</td>
                <td>{{$dt->datas['dasar_hukum']}}</td>
                <td>{{$dt->datas['bidang']}}</td>
                <td>{{$dt->datas['status']}}</td>
                <td>{{$dt->datas['keterangan']}}</td>
                <td>
                    <a href={{url("galery/album/{$dt->id}")}}><b>Galery </b></a>
                </td>
              </tr>      
            @endforeach
          
    </tfoot>
</table>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<script>
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>
@endsection
