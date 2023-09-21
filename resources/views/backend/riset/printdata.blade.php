<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<meta content="en-us" http-equiv="Content-Language" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	{{-- <title>PEMERINTAH KOTA BANJARMASIN</title> --}}
	<style type="text/css">
		.auto-style5 {
			font-size: large;
		}

		.auto-style6 {
			font-size: x-large;
		}

		.auto-style7 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px;
		}

		.auto-style8 {
			text-align: center;
		}

		.auto-style11 {
			background-color: #64642A;
		}

		.auto-style13 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: large;
			text-align: center;
		}

		.auto-style14 {
			text-align: left;
		}

		.auto-style15 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: medium;
		}

		.auto-style21 {
			text-align: left;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px;
		}

		.auto-style23 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px;
		}

		.auto-style24 {
			text-decoration: underline;
			font-size: medium;
		}

		.auto-style25 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px;
			text-decoration: underline;
		}

		.auto-style26 {
			font-size: x-small;
		}

		.auto-style27 {
			font-family: Arial, Helvetica, sans-serif;
		}

		.auto-style28 {
			text-decoration: underline;
		}

		.auto-style30 {
			text-align: center;
			border-style: solid;
			border-width: 1px;
		}

		.auto-style31 {
			border-width: 0px;
			margin-left: 150px;
		}
	</style>
</head>

<body>

	<div class="auto-style8">
		<table style="width: 100%">
			<tr>
				<td style="width: 10%" valign="top">
					{{-- <img src="{{ url('/assets/logk.jpg') }}" height="100px"> --}}

					<img src="http://4.bp.blogspot.com/-VzfWlC-3IYQ/T6u3HQL6i4I/AAAAAAAABWc/JW8NDkz4D4k/s1600/LOGO_BANJARMASIN.JPG"
						height="100px">
				</td>
				<td>

					<div class="auto-style8">
						<span class="auto-style5"><strong>PEMERINTAH KOTA BANJARMASIN</strong></span><br />
						<span class="auto-style6"><strong>BADAN KESATUAN BANGSA DAN POLITIK
								<br />
								KOTA BANJARMASIN</strong></span><br />
						<span class="auto-style7">Jln. RE. Martadinata No1. Banjarmasin 70111
							E-mail : kesbangpol@banjarmasinkota.go.id</span> <br />
						<strong><span class="auto-style25">www.banjarmasinkota.go.id</span></strong>
					</div>
				</td>
			</tr>
		</table>
		<hr class="auto-style11">
	</div>

	<p class="auto-style13"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<strong><span class="auto-style24">REKOMENDASI PELAKSANAAN
				PENDATAAN/PENELITIAN/SURVEY<br />
			</span></strong><span class="auto-style26"><strong>NOMOR : 072/{{$dt->nosurat}} -
				Sekr/Bakesbangpol</strong></span>
	</p>
	<p class="auto-style14"><span class="auto-style23">Membaca&nbsp;&nbsp;&nbsp; : Surat
			dari &nbsp; {{$dt->data->universitas}}<br />
			Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$dt->data->no_surat}}<br />
			Perihal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Ijin Penelitian/
			Permintaan Data/ Survey/ Observasi<br />
			<br />
			<strong>Mengingat&nbsp; :<br />
			</strong>
			<table style="width: 100%">
				<tr>
					<td style="width: 23px">1.</td>
					<td class="auto-style23">Peraturan Menteri dalam Negeri RI Nomor 7/2014
						Tentang Perubahan atas Peraturan Menteri Dalam Negeri RI Nomor 64/2011
						Tentang&nbsp;&nbsp; Pedoman Penerbitan Rekomendasi Penelitian.</td>
				</tr>
				<tr>
					<td style="width: 23px">2.</td>
					<td class="auto-style23">Peraturan Daerah Kota Banjarmasin Nomor 7 Tahun
						2016 Tentang Pembentukan Dan Susunan Perangkat Daerah Kota Banjarmasin</td>
				</tr>
				<tr>
					<td style="width: 23px">3.</td>
					<td class="auto-style23">Peraturan Walikota Banjarmasin Nomor 71 Tahun
						2014 Tentang Uraian Tugas Unsur Unsur Organisasi Badan Kesatuan Bangsa
						Dan Politik kota Banjarmasin</td>
				</tr>
			</table>
		</span></p>
	<p class="auto-style14"><span class="auto-style23"><strong>Memberikan
				Rekomendasi Pendataan/ Penelitian/ Survey Kepada :</strong></span><span class="auto-style15"><br />
		</span>
	<table style="width: 100%; height: 125px">
		<tr>
			<td class="auto-style7" style="width: 15px">a.</td>
			<td class="auto-style7" style="width: 30%">Nama</td>
			<td class="auto-style7" style="width: 13px"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->nama}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">b.</td>
			<td class="auto-style7">NIK/NIP/NIM/NPM</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->nik}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">c.</td>
			<td class="auto-style7">Alamat</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->alamat}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">d.</td>
			<td class="auto-style7">Judul Penelitian</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->judul}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">e.</td>
			<td class="auto-style7">Tujuan Penelitian</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->tujuan}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">f.</td>
			<td class="auto-style7">Lokasi/ Tempat Penelitian</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->tempat}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">g.</td>
			<td class="auto-style7">Lamanya Pelaksanaan Penelitian</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->lama_waktu}} Bulan</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">h.</td>
			<td class="auto-style7">Bidang Penelitian</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->jurusan}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">i.</td>
			<td class="auto-style7">Pekerjaan Peneliti</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->pekerjaan}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">j.</td>
			<td class="auto-style7">Nama Dan Jabatan Penanggung jawab</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->penanggung_jawab}}</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">k.</td>
			<td class="auto-style7">Anggota Penelitian</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">
				@foreach ($dt->data->anggota as $a)
				{{ $a}},
				@endforeach
			</td>
		</tr>
		<tr>
			<td class="auto-style7" style="width: 15px">l</td>
			<td class="auto-style7">Nama Organisasi/Lembaga</td>
			<td class="auto-style7"><strong>:</strong></td>
			<td class="auto-style7">{{$dt->data->universitas}}</td>
		</tr>
	</table>
	</p>
	<p class="auto-style21">Ketentuan :<br />
	<table style="width: 100%">
		<tr>
			<td class="auto-style7">1.</td>
			<td class="auto-style21">Sebelum Melakukan kegiatan tersebut harus melaporkan kedatangannya
				kepada pejabat yang berwenang setempat</td>
		</tr>
		<tr>
			<td class="auto-style7">2.</td>
			<td class="auto-style21">Tidak dibenarkan melakukan kegiatan yang tidak sesuai/tidak ada
				kaitannya dengan tujuan kegiatan dimaksud</td>
		</tr>
		<tr>
			<td class="auto-style7">3.</td>
			<td class="auto-style21">Harus mentaati segala ketentuan yang berlaku setempat dan
				kegiatannya tidak boleh memberatkan bagi pemerintah dan Masyarakat.</td>
		</tr>
		<tr>
			<td class="auto-style7">4.</td>
			<td class="auto-style21">Kepada instansi terkait dimohon bantuannya untuk kepentingan dan
				kelancaran kegiatan pendataan/ penelitian dimaksud.</td>
		</tr>
		<tr>
			<td class="auto-style7">5.</td>
			<td class="auto-style21">Setelah selesai melakukan riset/ penelitian / survey dan membuat
				proposal/ skripsi/ tesis maka diwajibkan menyerahkan hasilnya kepada
				Badan Kesbangpol kota Banjarmasin.</td>
		</tr>
	</table>
	</p>

	<table style="width: 100%">
		<tr>
			<td style="width: 422px" class="auto-style7">Tembusan :<br />
				<?php
			$no =1;
			?>
				@foreach ($dt->data->tembusan as $tembusan)
				{{$no++}}. {{$tembusan}}<br>
				@endforeach
				<br />
				<br />
				<br />
				<br />
				<br />
			</td>
			<td><span class="auto-style23">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DIKELUARKAN di&nbsp;&nbsp;&nbsp;
					: Banjarmasin</span><br />
				<span class="auto-style23">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="auto-style28">PADA TANGGAL&nbsp;&nbsp;&nbsp;&nbsp; :</span></span><span
					class="auto-style28"><br />
				</span><span class="auto-style23">

					@if(strtolower($map->data->jabatan) == 'Kepala Badan')
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$map->data->jabatan}}<br />
					<br />
					<br />
					<br />
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{$map->data->nama}}</strong><br />
					&nbsp;&nbsp;&nbsp;&nbsp; {{$map->data->pangkat}}<br />
					&nbsp;&nbsp;&nbsp;&nbsp; NIP. {{$map->data->nip}} </span>
			</td>

			@elseif(strtolower($map->data->jabatan) == 'sekretaris')

			<strong>a.n Kepala Badan</strong><br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$map->data->jabatan}}<br />
			<br />
			<br />
			<br />
			<br />
			&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{$map->data->nama}}</strong><br />
			&nbsp;&nbsp;&nbsp;&nbsp; {{$map->data->pangkat}}<br />
			&nbsp;&nbsp;&nbsp;&nbsp; NIP. {{$map->data->nip}} </span></td>

			@else
			&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<strong>Kepala Badan<br />
				{{-- &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</strong>Sekretaris<br />

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; u.b<br /> --}}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$map->data->jabatan}}<br />
			<br />
			<br />
			<br />
			<br />
			&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{$map->data->nama}}</strong><br />
			&nbsp;&nbsp;&nbsp;&nbsp; {{$map->data->pangkat}}<br />
			&nbsp;&nbsp;&nbsp;&nbsp; NIP. {{$map->data->nip}} </span></td>
		</tr>
		@endif
	</table>


</body>

<script>
	$( document ).ready(function() {
		  window.print();
	});
</script>

</html>