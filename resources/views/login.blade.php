<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SIMPLE</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo asset('sbadmin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo asset('sbadmin') ?>/css/sb-admin-2.min.css" rel="stylesheet">

        <style>
            .bg-login-image {
                /*background: url('<?php echo asset('sbadmin') ?>/img/cat.jpg');*/
                background: url('<?php echo asset('sbadmin') ?>/img/mail.gif');
                background-position: center;
                background-size: cover;
            }
        </style>

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">SIMPLE</h1>
                                            <p>Sistem Informasi Data Pelabuhan Berbasis Elektronik</p>
                                        </div>
                                        <form class="user" method="POST" action="<?php echo url("login/cek") ?>">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan username disini">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            </div>

                                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Login"/>
                                            <hr>

                                        </form>

                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="#" data-toggle="modal" data-target="#exampleModal">Saya tidak bisa login (?)</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>




        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--Untuk login, bapak/ibu bisa menggunakan akun community BPS dengan password community. Jika masih belum bisa login, silakan klik <a href="https://docs.google.com/forms/d/e/1FAIpQLScs8ykpWoKKJThyZ1VwINtFFyTwunciCXlT4Jo9sirWDgibtw/viewform?usp=sf_link">disini</a>-->
                        Jika tidak bisa login, silakan menghubungi admin dengan klik <b><a href="https://docs.google.com/forms/d/e/1FAIpQLScs8ykpWoKKJThyZ1VwINtFFyTwunciCXlT4Jo9sirWDgibtw/viewform?usp=sf_link">disini</a></b> atau bisa menghubungi tim IPDS, terima kash :)
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Baik, Terima Kasih</button>
                    </div>
                </div>
            </div>
        </div>





        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo asset('sbadmin') ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo asset('sbadmin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo asset('sbadmin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo asset('sbadmin') ?>/js/sb-admin-2.min.js"></script>

    </body>

</html>
