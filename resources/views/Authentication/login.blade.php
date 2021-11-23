<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="dist/css/custom-style.css">

    <link rel="icon" href="dist/img/logo.jpg" type="image/jpg">
    <style>
        .box{
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>



{{-- regester --}}

{{--
        <div class="row" style="text-align: center;">
            <div class="card-header col-6" style="background:#ffb931;color:#6f4506 ; ">
                <h3 class="card-title">مثال ساده</h3>
            </div>
            <div class="card-header col-6" style="background:#ffffff;color:#6f4506 ; border: 1px solid #ffb931;">
                <h3 class="card-title">مثال ساده</h3>
            </div>
        </div> --}}


    <div class="row">
        <div class="col-lg-6 col-md-8 col-md-10 box">
            <div class="card card-primary">
                    <div class="card-header" style="background:#ffb931;color:#6f4506 ; text-align: center;">
                        <h3 class="card-title">ورود </h3>
                    </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">نام کاربری</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="user" placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="پسورد را وارد کنید">
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">مرا بخاطر بسپار</label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" class="btn  btn-lg" style="background: #84be38; color: #2c4012;width: 40%; ">ورود</button>
                  </div>
                </form>
                <a href="/signIn">حساب کاربری ندارید؟</a>

              </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- ver = 1.0.0 -->
</body>
</html>
