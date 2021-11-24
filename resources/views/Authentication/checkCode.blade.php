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
                        <h3 class="card-title">کد تایید </h3>
                    </div>
                <!-- /.card-header -->
                <!-- form start -->


                <form role="form" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">کد تایید را وارد کنید. </label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="code" placeholder=" کد تایید را وارد کنید.">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" class="btn  btn-lg" style="background: #84be38; color: #2c4012;width: 40%; ">برسی</button>
                  </div>
                <a href="resendCode">ارسال مجدد</a>
                </form>

              </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- ver = 1.0.0 -->

    @isset($_GET['codeerr'])
    <script>
        alert("کد اشتباه است.");
        window.location.href="checkCode";

    </script>
@endisset

@isset($_GET['resend'])
<script>
    alert("کد مجدد ارسال شد");
    window.location.href="checkCode";
</script>
@endisset

</body>
</html>
