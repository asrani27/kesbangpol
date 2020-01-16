@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
@endsection

@section('content')
<br /><br />

<div id="profil" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">{{$data->judul}}</h2>
        {{-- <p class="content-desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
            sed bibendum turpis luctus eget
        </p> --}}
        <!-- begin row -->
        <div class="row">
                {!!$data->isi!!}
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
@endsection