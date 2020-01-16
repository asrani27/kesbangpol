@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
@endsection

@section('content')
<br /><br />
<div id="profil" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">Dokumen : {{$kat->nama}}</h2>
        <!-- begin row -->
        <div class="row">
           
<table id="example" class="display" style="width:100%">
    <thead>
            <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Judul</th>
                    <th>Size</th>
                    <th>#</th>
                  </tr>
    </thead>
    <?php
    $no = 1;
    ?>
    <tbody>
            @foreach ($data as $dt)
            <tr>
                <td width="10px">{{$no++}}</td>
                <td width="10px">
                    @if($dt->jenis == 'zip')
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_zip.png">
                    @elseif($dt->jenis == 'pdf')
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32x32/file_extension_pdf.png">
                    @elseif($dt->jenis == 'ppt')
                    <img src="https://cdn1.iconfinder.com/data/icons/Momentum_MatteEntireSet/32/ppt.png">
                    @elseif($dt->jenis == 'png')
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_png.png">
                    @elseif($dt->jenis == 'docx' OR 'doc')
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_doc.png">
                    @elseif($dt->jenis == 'rar')
                    <img src="https://cdn0.iconfinder.com/data/icons/fatcow/32/file_extension_rar.png">
                    @else
                    {{$dt->jenis}}
                    @endif
                </td>
                <td>{{$dt->judul}}</td>
                <td>{{$dt->size}} MB</td>
                <td>
                    <a href={{url('storage', $dt->filename)}}><b>Unduh </b></a>
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
