@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
@endsection

@section('content') 
<br />
<br />
<div id="work" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
    <h2 class="content-title">Galery {{$namaOrmas}}</h2>
        <p class="content-desc">
            
        </p>
        <?php
            $values = $data->toArray();
            $rowsregion = array_chunk($values, 4);
        ?>
        @foreach ($rowsregion as $row)
        <div class="row row-space-10">
            @foreach ($row as $item)
            
                <div class="col-md-3 col-sm-6">
                    <!-- begin work -->
                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="{{url('storage/'.$item['filename'])}}" width="300px" height="200px"/></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">{{$item['judul']}}</span>
                            <span class="desc-text">Tgl Upload :{{\Carbon\Carbon::parse($item['created_at'])->format('d M Y')}} </span>
                        </div>
                    </div>
                    <!-- end work -->
                </div>
            @endforeach
        </div>
        @endforeach
        
    </div>
    <!-- end container -->
</div>
<!-- end #work -->
@endsection