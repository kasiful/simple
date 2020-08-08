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


Route::get('laporan', 'LaporanController@index');
Route::get('laporan/generate', 'LaporanController@generate');
Route::post('laporan/generate/list', 'LaporanController@generate_list');
Route::post('laporan/generate/list2', 'LaporanController@generate_list2');
Route::post('laporan/generate/process', 'LaporanController@generate_process');

Route::get('generate-pdf','PDFController@generatePDF');

// ============================================================== //
//                                                                //
//                         Manajemen Data                         //
//                                                                //
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
//                                                                //
//                            Publikasi                           //
//                                                                //
// ============================================================== //

Route::get('publikasi/bulanan', 'PublikasiController@bulanan');
Route::post('publikasi/bulanan/list', 'PublikasiController@bulanan_list');

// ============================================================== //
//                                                                //
//                            Manajemen User                      //
//                                                                //
// ============================================================== //

Route::get('user/view', "UserController@view");
Route::get('user/add', "UserController@add");
Route::get('user/hapus', "UserController@hapus");
Route::get('user/edit', "UserController@edit");

// =================================================
// DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});
