@extends('color.master')

@section('navbar-transparan')
<div id="header" class="header navbar navbar-transparent navbar-fixed-top">
@endsection
@push('add_css')

<script type="text/javascript" src="{{url('js/Chart.js')}}"></script>
@endpush
@section('content')

<div id="home" class="content has-bg home">
    <!-- begin content-bg -->
    <div class="content-bg">
        <img src={{url("storage/background/{$image}")}} alt="Home" />
    </div>
    <!-- end content-bg -->
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="container" data-animation="true" data-animation-type="fadeInRight">
        <!-- begin row -->
        <div class="row action-box">
            <!-- begin col-9 -->
            <div class="col-md-5 col-sm-5">
                    <h3 class="text-center">JADWAL KEGIATAN KESBANGPOL</h3>
                <table style="border: #ccc 1px solid;">
                    <thead>
                    <th style="padding: 5px 10px;border-bottom: #ccc 1px solid;">No</th>
                    <th style="padding: 5px 15px;border-bottom: #ccc 1px solid;">Hari/Tgl</th>
                    <th style="padding: 5px 15px;border-bottom: #ccc 1px solid;">Jam</th>
                    <th style="padding: 5px 15px;border-bottom: #ccc 1px solid;">Kegiatan</th>
                    <th style="padding: 5px 15px;border-bottom: #ccc 1px solid;">Tempat</th>
                    <th style="padding: 5px 15px;border-bottom: #ccc 1px solid;">Keterangan</th>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        @foreach ($keg as $k)
                            <tr style="border-bottom: #ccc 1px solid;">
                            <td style="font-size:10px;text-align:center;">{{$no++}}</td>
                            <td style="font-size:10px;padding: 2px 2px;">{{$k->hari}}<br>{{\Carbon\Carbon::parse($k->tanggal)->format('d-M-Y')}}</td>
                            <td style="font-size:10px;text-align:center;">{{$k->jam}}</td>
                                <td style="font-size:10px;padding: 2px 2px;">{{$k->kegiatan}}</td>
                                <td style="font-size:10px;">{{$k->tempat}}</td>
                                <td style="font-size:10px;">{{$k->keterangan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end col-9 -->
            <!-- begin col-3 -->
            <div class="col-md-7 col-sm-7">
                <h3 class="text-center">{{$judulchart}}</h3>
                    <canvas id="myChart"></canvas>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>


    <!-- begin container -->
    {{-- <div class="container home-content">
        <h1>{{$data->judul}}</h1>
        <h3>{{$data->deskripsi}}</h3>
       <a href="#" data-toggle="modal" data-target="#modal-daftar" class="btn btn-theme">Daftar </a> <a href="#" data-toggle="modal" data-target="#modal-login" class="btn btn-outline">Masuk</a><br />
        <br />
         <a href="#"></a> 
    </div> --}}
    <!-- end container -->
</div>   

@endsection
@push('add_js')
<script>
$(document).ready(function() {
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    $.ajax({url: window.location.origin+"/chartdata", success: function(result){
        console.log(result);
        var label = result[0];
        var data = result[1];
        var bgcolor = result[2];
        var bordercolor = result[3];
        var ctx = document.getElementById("myChart").getContext('2d'); 
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: label,
                datasets: [{
                    label: '# Persentase',
                    data: data,
                    backgroundColor: bgcolor,
                    borderColor: bordercolor,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                // legend: {
                //     labels: {
                //         fontColor: 'orange'
                //         }
                //     },
                //     title: {
                //         display: true,
                //         fontColor: 'blue',
                //         text: 'Custom Chart Title'
                //     },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index];
                        var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return formatNumber(val)+'%';
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontColor: 'white',
                            fontSize:10
                            //mirror: true
                        }
                    }]
                }
            }
        });
    }});
});
</script>
@endpush
