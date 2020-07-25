<?php

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


// =================================================
// DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});
