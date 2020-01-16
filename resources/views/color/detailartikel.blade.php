@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
@endsection

@section('content')
<br /><br />
        <!-- begin tabs / accordion -->
        <div id="layanan" class="content bg-silver">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">DETAIL KEGIATAN</h2>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin panel-group -->
                        <div class="panel-group m-b-0" id="accordion">
                            <!-- begin panel -->
                            <?php
                            $no =1;
                            ?>
                            @foreach ($data as $dt)                
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-{{$dt->id}}">
                                                Tgl : {{\Carbon\Carbon::parse($dt->created_at)->format('d M Y')}}, Posting By : Admin </a>
                                        </h4>
                                    </div>
                                    <div id="accordion-{{$dt->id}}" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                               <h3> {{strtoupper($dt->judul)}} </h3>
                                            <p>
                                                    <img src="{{url('storage/artikel/'.$dt->gambar)}}" width="90%" style="float:justify; padding-right:20px;">
                                                   
                                                    {!!$dt->isi!!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- end panel-->
                        </div>
                        <!-- end panel-group -->
                    </div>
                    <!-- end col-6 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end tabs / accordion -->
@endsection