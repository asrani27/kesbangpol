@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
@endsection

@section('content')
<br /><br />


<div id="contact" class="content bg-silver-lighter" data-scrollview="true">
    <!-- begin container -->
    <div class="container">
    <h2 class="content-title">{{$data->datas['judul']}}</h2>
        {{-- <p class="content-desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
            sed bibendum turpis luctus eget
        </p> --}}
        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-6" data-animation="true" data-animation-type="fadeInLeft">
                <h3>Jika Anda memiliki hal yang ingin Anda diskusikan, Silahkan hubungi kami..</h3>
                
                <p>
                    <strong>{{$data->datas['instansi']}}</strong><br />
                    {{$data->datas['alamat']}}<br />
                    Banjarmasin<br />
                    Fax: {{$data->datas['fax']}}<br />
                </p>
                <p>
                    <span class="phone">Telp: {{$data->datas['telp']}}</span><br />
                    <a href="mailto:{{$data->datas['email']}}">{{$data->datas['email']}}</a>
                </p>
            </div>
            <!-- end col-6 -->
            <!-- begin col-6 -->
            <div class="col-md-6 form-col" data-animation="true" data-animation-type="fadeInRight">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Telp <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Pesan <span class="text-theme">*</span></label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-9 text-left">
                            <button type="submit" class="btn btn-theme btn-block">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
@endsection