<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ثبت نام</title>
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
        .headbox {
            left: -1% !important;
            position: relative;
            width: 100%;
            text-align: center;
        }
        .company-name{
            display: none;
        }
    </style>
</head>
<body>








    <div class="row">
        <div class="col-lg-6 col-md-8 col-md-10 box">
            <div class="card card-primary">
                <div class="row headbox" style="text-align: center; border-bottom: 1px solid #ffb931;">
                    <div class="card-header col-6" type="real" style="background:#ffb931;color:#6f4506 ; border-right: 1px solid #ffb931; ">
                        <h3 class="card-title">حقیقی </h3>
                    </div>
                    <div class="card-header col-6" type="legal" style="background:#ffffff;color:#6f4506 ; border: 2px solid #ffb931;border-left: 0px;">
                        <h3 class="card-title" >حقوقی</h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                {{--  errs  --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            @if ($error == 'نام کاربری یک فرمت معتبر نیست')
                            <b>در نام کاربری برای جدا سازی از ـ یا - استفاده کنید</b>
                            @else
                            <li>{{ $error }}</li>

                            @endif
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form role="form" method="POST">
                    @csrf
                    <input class="tabclass" type="hidden" name="tab" value="real">
                    <div class="card-body">
                  <div class="form-group company-name">
                    <label for="exampleInputEmail1"> نام شرکت | نهاد | ارگان</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="legalName" placeholder="  نام سازمان">
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">نام کاربری </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ایمیل  </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="ایمیل">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1" class="legallabel"> شماره تلفن</label>
                        <input type="tel" class="form-control legalname" id="exampleInputphone" name="phone" placeholder="09123456789 ">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">کلمه عبور</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="پسورد را وارد کنید">
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1"> تکرار کلمه عبور</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="repass" placeholder="پسورد را وارد کنید">
                      </div> --}}
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">مرا بخاطر بسپار</label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" class="btn  btn-lg" style="background: #84be38; color: #2c4012;width: 40%; ">ثبت نام</button>
                  </div>
                </form>
                <a href="/login">حساب کاربری دارید؟</a>
              </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.card-header').click(function (e) {
                $(".company-name").css("display", "none");
                $(".legallabel").html("نام و نام خانوادگی ");
                    $(".legalname").attr("placeholder", "نام و نام خانوادگی");
                $(".card-header").css("background","#fff");
                $(this).css("background", "#ffb931");
                var type = $(this).attr("type");
                $(".tabclass").attr("value", type);
                if (type == "legal") {
                    $(".company-name").css("display", "inline");
                    $(".legallabel").html("نام و نام خانوادگی نماینده سازمان");
                    $(".legalname").attr("placeholder", "نام و نام خانوادگی نماینده سازمان");
                }
            });
        });
    </script>
    <!-- ver=1.0.0 -->
</body>
</html>
