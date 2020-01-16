<?php

Auth::routes();
Route::get('logout', function() {
    Auth::logout();
    return redirect()->to('/');
})->name('logout');

Route::get('file-upload', 'FrontController@upload');

Route::post('file-upload/upload', 'FrontController@uploadstore')->name('upload');

//Route Untuk Halaman Depan (Frontend)
Route::get('/', 'FrontController@index');
Route::get('/dok', 'FrontController@dokumen')->name('dokumen');
Route::get('/berita', 'FrontController@artikel')->name('artikel');
Route::get('/chart', 'FrontController@chart');
Route::get('/chartdata', 'FrontController@chartdata');
Route::get('/berita/{id}/detail', 'FrontController@detailartikel');
Route::get('/layanan', 'FrontController@layanan')->name('layanan');
Route::get('/profil', 'FrontController@profil')->name('profil');
Route::get('/galery/album/{id}', 'FrontController@galery')->name('galery');
Route::get('/kontak', 'FrontController@kontak')->name('kontak');
Route::get('/view-ormas', 'FrontController@ormas')->name('ormas');
Route::get('/view-riset', 'FrontController@riset')->name('riset');
Route::get('/kategori/{id}', 'FrontController@kategori')->name('kategori');
\
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/role', 'HomeController@role')->name('role');
Route::post('/daftar', 'RegController@daftar')->name('daftar');
Route::post('/cek/mail', 'RegController@cekmail')->name('cek.mail');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Route Riset For Admin
    Route::get('/riset_admin/download/{filename}', 'DownloadController@download');
    Route::get('/riset_admin/pdf/{id}', 'AdminController@risetPDF');
    Route::get('/riset_admin', 'AdminController@riset')->name('admin.riset');
    Route::get('/riset_admin/get_riset', 'AdminController@getRiset');
    Route::post('/riset_admin/isinomor', 'AdminController@isinomor')->name('admin.isinomor');
    Route::post('/riset_admin/updatenomor', 'AdminController@updatenomor')->name('admin.updatenomor');
    Route::get('/riset_admin/get_riset/diproses', 'AdminController@getRisetProses');
    Route::get('/riset_admin/get_riset/diterima', 'AdminController@getRisetTerima');
    Route::get('/riset_admin/get_riset/direvisi', 'AdminController@getRisetRevisi');
    Route::get('/riset_admin/get_riset/ditolak', 'AdminController@getRisetTolak');
    Route::get('/riset_admin/view/{id}', 'AdminController@viewriset');
    Route::get('/riset_admin/delete/{id}', 'AdminController@delriset');
    Route::get('/riset_admin/edit/{id}', 'AdminController@editriset');
    Route::post('/riset_admin/updatestatus', 'AdminController@updatestatusriset')->name('admin.updatestatusriset');
    Route::post('/riset_admin/update/{id}', 'AdminController@updateriset')->name('admin.updateriset');

    // Route Account For Admin
    Route::get('/account', 'AdminController@account')->name('admin.account');
    Route::get('/account/delete/{id}', 'AdminController@delaccount');
    Route::post('/account/simpan', 'AdminController@saveaccount')->name('admin.saveaccount');
    Route::post('/account/update', 'AdminController@editaccount')->name('admin.editaccount');

    Route::get('/background', 'BackgroundController@index')->name('admin.background');
    Route::post('/background/update', 'BackgroundController@update')->name('admin.updatebackground');

    
    // Route Kegiatan For Admin
    Route::get('/jadwalkegiatan', 'KegiatanController@index')->name('admin.kegiatan');
    Route::get('/jadwalkegiatan/add', 'KegiatanController@add');
    Route::post('/jadwalkegiatan/simpan', 'KegiatanController@store')->name('admin.savekegiatan');
    Route::post('/jadwalkegiatan/update/{id}', 'KegiatanController@update')->name('admin.updatekegiatan');
    Route::get('/jadwalkegiatan/edit/{id}', 'KegiatanController@edit');
    Route::get('/jadwalkegiatan/delete/{id}', 'KegiatanController@delete');
    
    // Route Kategori For Admin
    Route::get('/kategori', 'KategoriController@index')->name('admin.kategori');
    Route::post('/kategori/simpan', 'KategoriController@store')->name('admin.savekategori');
    Route::post('/kategori/update', 'KategoriController@update')->name('admin.editkategori');
    Route::get('/kategori/delete/{id}', 'KategoriController@delete');

    // Route Dokumen For Admin
    Route::get('/dokumen', 'DokumenController@index')->name('admin.dokumen');
    Route::post('/dokumen/simpan', 'DokumenController@store')->name('admin.saveDokumen');
    Route::get('/dokumen/delete/{id}', 'DokumenController@delete');

    // Route Grafik For Admin
    Route::get('/grafikadmin', 'GrafikController@index')->name('admin.grafik');
    Route::get('/grafikadmin/add', 'GrafikController@add');
    Route::post('/grafikadmin/store', 'GrafikController@store')->name('admin.savegrafik');
    Route::post('/grafikadmin/update/{id}', 'GrafikController@update')->name('admin.updategrafik');
    Route::get('/grafikadmin/delete/{id}', 'GrafikController@delete');
    Route::get('/grafikadmin/edit/{id}', 'GrafikController@edit');
    Route::get('/grafikadmin/data/{id}', 'GrafikController@data');
    Route::get('/grafikadmin/aktif/{id}', 'GrafikController@aktifkan');
    Route::post('/grafikdataadmin/store', 'GrafikController@storedatagrafik')->name('admin.savedatagrafik');
    Route::post('/grafikdataadmin/update', 'GrafikController@updatedatagrafik')->name('admin.updatedatagrafik');
    Route::get('/grafikdata/delete/{id}', 'GrafikController@deletedatagrafik');
    

    // Route Artikel For Admin
    Route::get('/artikel', 'ArtikelController@index')->name('admin.artikel');
    Route::get('/artikel/add', 'ArtikelController@add');
    Route::get('/artikel/edit/{id}', 'ArtikelController@edit');
    Route::get('/artikel/delete/{id}', 'ArtikelController@delete');
    Route::post('/artikel/simpan', 'ArtikelController@store')->name('admin.saveartikel');
    Route::post('/artikel/update/{id}', 'ArtikelController@update')->name('admin.updateartikel');

    // Route Ormas For Admin
    Route::get('/ormas_admin', 'AdminController@ormas')->name('admin.ormas');
    Route::get('/ormas_admin/add', 'AdminController@addormas')->name('admin.addormas');
    Route::get('/ormas_admin/delete/{id}', 'AdminController@deleteormas');
    Route::get('/ormas_admin/edit/{id}', 'AdminController@editormas');
    Route::get('/ormas_admin/galery/{id}', 'AdminController@galery');
    Route::post('/ormas_admin/galery/{id}/store', 'GaleryController@store')->name('saveGalery');
    Route::get('/ormas_admin/galery/{id}/delete', 'GaleryController@delete');
    Route::post('/ormas_admin/save', 'AdminController@saveormas')->name('admin.saveormas');
    Route::post('/ormas_admin/update/{id}', 'AdminController@updateormas')->name('admin.updateormas');

    // Route Pejabat For Admin
    Route::get('/pejabat', 'AdminController@pejabat')->name('admin.pejabat');
    Route::get('/pejabat/add', 'AdminController@addpejabat')->name('admin.addpejabat');
    Route::get('/pejabat/delete/{id}', 'AdminController@delpejabat');
    Route::get('/pejabat/edit/{id}', 'AdminController@editpejabat');
    Route::get('/pejabat/aktif/{id}', 'AdminController@aktifpejabat');
    Route::post('/pejabat/save', 'AdminController@storepejabat')->name('admin.savepejabat');
    Route::post('/pejabat/update/{id}', 'AdminController@updatepejabat')->name('admin.updatepejabat');

    //Route For Layanan, Profil Dan Kontak
    Route::get('/profil_admin', 'AdminController@profil')->name('admin.profil');
    Route::post('/profil_admin/update/{id}', 'AdminController@updateprofil')->name('admin.updateprofil');
    Route::get('/beranda_admin', 'AdminController@beranda')->name('admin.beranda');
    Route::post('/beranda_admin/update/{id}', 'AdminController@updateberanda')->name('admin.updateberanda');
    Route::get('/layanan_admin', 'AdminController@layanan')->name('admin.layanan');
    Route::get('/layanan_admin/add', 'AdminController@addlayanan')->name('admin.addlayanan');
    Route::post('/layanan_admin/save', 'AdminController@savelayanan')->name('admin.savelayanan');
    Route::get('/layanan_admin/delete/{id}', 'AdminController@deletelayanan');
    Route::get('/layanan_admin/edit/{id}', 'AdminController@editlayanan');
    Route::post('/layanan_admin/update/{id}', 'AdminController@updatelayanan')->name('admin.updatelayanan');
    Route::get('/kontak_admin', 'AdminController@kontak')->name('admin.kontak');
    Route::post('/kontak_admin/update/{id}', 'AdminController@updatekontak')->name('admin.updatekontak');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route Riset For User
    Route::get('/riset', 'UserController@riset')->name('user.riset');
    Route::get('/riset/add', 'UserController@addriset')->name('user.addriset');
    Route::get('/riset/delete/{id}', 'UserController@delriset');
    Route::get('/riset/edit/{id}', 'UserController@editriset');
    Route::get('/riset/view/{id}', 'UserController@viewriset');
    Route::post('/riset/save', 'UserController@saveriset')->name('user.saveriset');
    Route::post('/riset/update/{id}', 'UserController@updateriset')->name('user.updateriset');
    Route::get('/riset/pdf', 'UserController@risetPDF');
    Route::get('/riset/printpdfuser', 'UserController@printbiodata');

    // Route Ormas For User
    Route::get('/ormas', 'UserController@ormas')->name('user.ormas');
    Route::get('/ormas/add', 'UserController@addormas')->name('user.addormas');

    //Route Ganti Password
    Route::get('/gantipass', 'UserController@gantipass')->name('gantipass');
    Route::post('/gantipass/save', 'UserController@updatepass')->name('gantipass.save');
});