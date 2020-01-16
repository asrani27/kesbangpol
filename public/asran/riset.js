$(document).ready(function() {
    $('#example1').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.origin+"/riset_admin/get_riset",
        columns: [
            { data: 'id'},
            { data: 'nopendaftaran'},
            { data: 'nomorsurat'},
            { data: 'datas.nama'},
            { data: 'datas.no_hp'},
            { data: 'datas.universitas'},
            { data: 'labelStatus'},
            { data: 'ubah'},
            { data: 'action', orderable:false, searchable:false },            
            { data: 'pdf'},
        ]
    });
});

$(document).on('click', '.diproses', function() {
  $('#example1').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: window.location.origin+"/riset_admin/get_riset/diproses",
        columns: [
            { data: 'id'},
            { data: 'nopendaftaran'},
            { data: 'nomorsurat'},
            { data: 'datas.nama'},
            { data: 'datas.no_hp'},
            { data: 'datas.universitas'},
            { data: 'labelStatus'},
            { data: 'ubah'},
            { data: 'action', orderable:false, searchable:false },            
            { data: 'pdf'},
        ]
    });
});

$(document).on('click', '.diterima', function() {
  $('#example1').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: window.location.origin+"/riset_admin/get_riset/diterima",
        columns: [
            { data: 'id'},
            { data: 'nopendaftaran'},
            { data: 'nomorsurat'},
            { data: 'datas.nama'},
            { data: 'datas.no_hp'},
            { data: 'datas.universitas'},
            { data: 'labelStatus'},
            { data: 'ubah'},
            { data: 'action', orderable:false, searchable:false },            
            { data: 'pdf'},
        ]
    });
});

$(document).on('click', '.direvisi', function() {
  $('#example1').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: window.location.origin+"/riset_admin/get_riset/direvisi",
        columns: [
            { data: 'id'},
            { data: 'nopendaftaran'},
            { data: 'nomorsurat'},
            { data: 'datas.nama'},
            { data: 'datas.no_hp'},
            { data: 'datas.universitas'},
            { data: 'labelStatus'},
            { data: 'ubah'},
            { data: 'action', orderable:false, searchable:false },            
            { data: 'pdf'},
        ]
    });
});

$(document).on('click', '.ditolak', function() {
  $('#example1').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: window.location.origin+"/riset_admin/get_riset/ditolak",
        columns: [
            { data: 'id'},
            { data: 'nopendaftaran'},
            { data: 'nomorsurat'},
            { data: 'datas.nama'},
            { data: 'datas.no_hp'},
            { data: 'datas.universitas'},
            { data: 'labelStatus'},
            { data: 'ubah'},
            { data: 'action', orderable:false, searchable:false },            
            { data: 'pdf'},
        ]
    });
});
$(document).on('click', '.semua', function() {
  $('#example1').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: window.location.origin+"/riset_admin/get_riset",
        columns: [
            { data: 'id'},
            { data: 'nopendaftaran'},
            { data: 'nomorsurat'},
            { data: 'datas.nama'},
            { data: 'datas.no_hp'},
            { data: 'datas.universitas'},
            { data: 'labelStatus'},
            { data: 'ubah'},
            { data: 'action', orderable:false, searchable:false },            
            { data: 'pdf'},
        ]
    });
});

  
$(document).on('click', '.ubah-status', function() {
    $('#iddata').val($(this).data('id'));
    $('#keterangan').val($(this).data('keterangan'));
    $('#status').empty();
    var status = $(this).data('status');
    if(status === 'pending')
    {
      $('#status').append('<option value="pending" selected>Di Proses</option>');
      $('#status').append('<option value="approved">Di Terima</option>');
      $('#status').append('<option value="revisi">Di Revisi</option>');
      $('#status').append('<option value="cancel">Di Tolak</option>');
    }
    else if(status === 'approved')
    {
      $('#status').append('<option value="pending">Di Proses</option>');
      $('#status').append('<option value="approved" selected>Di Terima</option>');
      $('#status').append('<option value="revisi">Di Revisi</option>');
      $('#status').append('<option value="cancel">Di Tolak</option>');
    }
    else if(status === 'revisi')
    {
      $('#status').append('<option value="pending">Di Proses</option>');
      $('#status').append('<option value="approved">Di Terima</option>');
      $('#status').append('<option value="revisi" selected>Di Revisi</option>');
      $('#status').append('<option value="cancel">Di Tolak</option>');
    }
    else if(status === 'cancel')
    {
      $('#status').append('<option value="pending">Di Proses</option>');
      $('#status').append('<option value="approved">Di Terima</option>');
      $('#status').append('<option value="revisi">Di Revisi</option>');
      $('#status').append('<option value="cancel" selected>Di Tolak</option>');
    }
    $('#ubahStatus').modal('show');
  });

  $(document).on('click', '.view-data', function() {
    var iddata = $(this).data('id');
    $.ajax({
                type: "GET",
                url: 'riset_admin/view/'+iddata,
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
                  $("label[for*='viewtujuan']").html(resp.datas.tujuan);
                }
            });
    $('#viewRiset').modal('show');
  });

  $(document).on('click', '.isi-nomor', function() {
    $('#iddata2').val($(this).data('id'));
    $('#isiNomor').modal('show');
  });
  
  $(document).on('click', '.edit-nomor', function() {
    $('#iddata3').val($(this).data('id'));
    $('#nosuratedit').val($(this).data('nosurat'));
    $('#editNomor').modal('show');
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