<?php

// use App\RekapModel;
// Route::get('tes', function(){
//     $model= new RekapModel();
//     $tes = $model->record_bulanan(76,7604,760402,7,2020);
//     print_r($tes);
// });

Route::get('session', function () {
    $sess = [
        'id' => session("id"),
        'username' => session("username"),
        'nama' => session("nama"),
        'leveluser_id' => session("leveluser_id"),
        'leveluser' => session("leveluser"),
        'level' => session("level"),
        'prov_id' => session("prov_id"),
        'kab_id' => session("kab_id"),
        'kantor_unit_id' => session("kantor_unit_id"),
        'pelabuhan_id' => session("pelabuhan_id"),
        'token' => session("token")
    ];
    print_r($sess);
});


Route::get('login', "LoginController@login");
Route::post('login/cek', "LoginController@cek");
Route::get('logout', "LoginController@logout");


Route::get('/template', function () {
    return redirect('http://localhost/disposisi/public/sbadmin/');
});

Route::group(["middleware" => "autentikasi"], function(){

// ============================================================== //
//                         Dashboard                              //
// ============================================================== //

    Route::get('/', 'Dashboard@index');
    Route::get('/dashboard', 'Dashboard@index');

// ============================================================== //
//                         Laporan Bulanan                        //
// ============================================================== //

Route::get('laporan', 'LaporanController@index');

Route::get('laporan/generate', 'LaporanController@generate')->middleware("leveluser:5");
Route::post('laporan/generate/list', 'LaporanController@generate_list')->middleware("leveluser:5");
Route::post('laporan/generate/list2', 'LaporanController@generate_list2')->middleware("leveluser:5");
Route::post('laporan/generate/process', 'LaporanController@generate_process')->middleware("leveluser:5");

// ============================================================== //
//                         Manajemen Data                         //
// ============================================================== //

Route::get('entri/view', 'EntriController@view');
Route::post('entri/view/list', 'EntriController@view_list');
Route::post('entri/view/detil', 'EntriController@view_detil');
Route::post('entri/edit', 'EntriController@edit');
Route::post('entri/edit/process', 'EntriController@edit_process');

Route::post('entri/hapus', 'EntriController@hapus');

Route::get('entri/add', 'EntriController@add');
Route::post('entri/add/process', 'EntriController@add_process');

Route::get('approval/view', 'ApprovalController@view');
Route::post('approval/view/list', 'ApprovalController@view_list');
Route::post('approval/view/process', 'ApprovalController@view_process');

// ============================================================== //
//                            Publikasi                           //
// ============================================================== //

Route::get('publikasi/bulanan', 'PublikasiController@bulanan');
Route::POST('publikasi/bulanan/list', 'PublikasiController@bulanan_list');

// ============================================================== //
//                           Manajemen User                       //
// ============================================================== //

Route::get('user', 'UserController@view');
Route::get('user/view', 'UserController@view');
Route::post('user/add', 'UserController@add')->middleware("leveluser:5");;
Route::post('user/add/process', 'UserController@add_process')->middleware("leveluser:5");;
Route::post('user/edit', 'UserController@edit')->middleware("leveluser:5");;
Route::post('user/edit/process', 'UserController@edit_process')->middleware("leveluser:5");;
Route::post('user/hapus', 'UserController@hapus')->middleware("leveluser:5");;
Route::post('user/hapus/process', 'UserController@hapus_process')->middleware("leveluser:5");;

});







Route::get('generate-pdf', 'PDFController@generatePDF');

// =================================================
// DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});
