<?php

// use App\RekapModel;
// Route::get('tes', function(){
//     $model= new RekapModel();
//     $tes = $model->record_bulanan(76,7604,760402,7,2020);
//     print_r($tes);
// });


Route::get('login', "LoginController@login");
Route::post('login/cek', "LoginController@cek");
Route::get('logout', "LoginController@logout");

// ============================================================== //
//                                                                //
//                         Dashboard                              //
//                                                                //
// ============================================================== //

Route::get('/template', function () {
    return redirect('http://localhost/disposisi/public/sbadmin/');
});

Route::get('/', 'Dashboard@index')->middleware('autentikasi');
Route::get('/dashboard', 'Dashboard@index')->middleware('autentikasi');


// ============================================================== //
//                                                                //
//                         Laporan Bulanan                        //
//                                                                //
// ============================================================== //


Route::get('laporan', 'LaporanController@index')->middleware('autentikasi');
Route::get('laporan/generate', 'LaporanController@generate')->middleware('autentikasi');
Route::post('laporan/generate/list', 'LaporanController@generate_list')->middleware('autentikasi');
Route::post('laporan/generate/list2', 'LaporanController@generate_list2')->middleware('autentikasi');
Route::post('laporan/generate/process', 'LaporanController@generate_process')->middleware('autentikasi');

Route::get('generate-pdf','PDFController@generatePDF');

// ============================================================== //
//                                                                //
//                         Manajemen Data                         //
//                                                                //
// ============================================================== //

Route::get('entri/view', 'EntriController@view')->middleware('autentikasi');
Route::post('entri/view/list', 'EntriController@view_list')->middleware('autentikasi');
Route::post('entri/view/detil', 'EntriController@view_detil')->middleware('autentikasi');
Route::post('entri/edit', 'EntriController@edit')->middleware('autentikasi');
Route::post('entri/edit/process', 'EntriController@edit_process')->middleware('autentikasi');

Route::post('entri/hapus', 'EntriController@hapus')->middleware('autentikasi');

Route::get('entri/add', 'EntriController@add')->middleware('autentikasi');
Route::post('entri/add/process', 'EntriController@add_process')->middleware('autentikasi');

Route::get('approval/view', 'ApprovalController@view')->middleware('autentikasi');
Route::post('approval/view/list', 'ApprovalController@view_list')->middleware('autentikasi');
Route::post('approval/view/process', 'ApprovalController@view_process')->middleware('autentikasi');

// ============================================================== //
//                                                                //
//                            Publikasi                           //
//                                                                //
// ============================================================== //

Route::get('publikasi/bulanan', 'PublikasiController@bulanan')->middleware('autentikasi');
Route::post('publikasi/bulanan/list', 'PublikasiController@bulanan_list')->middleware('autentikasi');

// ============================================================== //
//                                                                //
//                           Manajemen User                       //
//                                                                //
// ============================================================== //

Route::get('user/view', 'UserController@view');
Route::post('user/add', 'UserController@add');
Route::post('user/add/process', 'UserController@add_process');
Route::post('user/edit', 'UserController@edit');
Route::post('user/edit/process', 'UserController@edit_process');
Route::post('user/hapus', 'UserController@hapus');
Route::post('user/hapus/process', 'UserController@hapus_process');


// =================================================
// DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});
