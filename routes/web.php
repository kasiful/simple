<?php

Route::get('login', function() {
    return view('login');
});

Route::post('login/cek', function() {

    function generateRandomString($length = 50) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $username = addslashes($_POST['username']);
    $password = sha1(addslashes($_POST['password']));
    
    

    $hasil = DB::select("SELECT a.*, b.leveluser, b.level FROM `user` a inner join master_leveluser b on a.leveluser_id = b.id where a.username = '$username' and a.password = '$password'");

//    print_r($hasil);

    $ada = false;

    foreach ($hasil as $x) {
        $ada = true;
        $temp = $x;
        break;
    }

    if ($ada) {

        // bugs disini, jika di db ada token -> pakai, jika kosong -> update

        $token = generateRandomString(30);
        $hasil = DB::insert("INSERT INTO `user_token`(`user_id`, `username`, `token`) VALUES ("
                        . "{$temp->id},"
                        . "'{$temp->username}',"
                        . "'{$token}'"
                        . ")");

        if ($hasil) {
            session([
                'id' => $temp->id,
                'username' => $temp->username,
                'nama' => $temp->nama,
                'leveluser_id' => $temp->leveluser_id,
                'leveluser' => $temp->leveluser,
                'level' => $temp->level,
                'token' => $token
            ]);
            return redirect('/dashboard');
        } else {
            return redirect('login');
        }
    } else {
        return redirect('login');
    }
});

Route::get('logout', function() {
    $token = session('token');
    $hasil = DB::delete("delete from user_token where token = '$token'");
    session()->flush();
    return redirect('login');
});


// ============================================================== //
//                                                                //
//                         Dashboard                              //
//                                                                //
// ============================================================== //


Route::get('/template', function() {
    return redirect('http://localhost/disposisi/public/sbadmin/');
});

//Route::get('/dashboard', function() {
//    return view('welcome');
//})->middleware('autentikasi');

Route::get('/', 'Dashboard@index')->middleware('autentikasi');
Route::get('/dashboard', 'Dashboard@index')->middleware('autentikasi');




// ============================================================== //
//                                                                //
//                         Laporan Bulanan                        //
//                                                                //
// ============================================================== //


Route::get('laporan', 'LaporanController@index');







// =================================================
// DocumentViewer Library
Route::any('ViewerJS/{all?}', function() {
    return View::make('ViewerJS.index');
});

