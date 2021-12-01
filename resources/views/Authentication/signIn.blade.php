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
    </style>
</head>
<body>








    <div class="row">
        <div class="col-lg-6 col-md-8 col-md-10 box">
            <div class="card card-primary">

                <select class="form-select" aria-label="Default select example">
                    <option selected value="-">نوع شخصیت را انتخاب کنید</option>
                    <option value="real_ir">حقیقی</option>
                    <option value="commercial_law">حقوقی تجاری</option>
                    <option value="legals_non_com">حقوقی غیر تجاری</option>
                    <option value="governmental">سازمان دولتی </option>
                </select>
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



                <div class="all-legal">
                    <form role="form" method="POST">
                        @csrf
                        <input class="tabclass" type="hidden" name="tab" value="">
                        <div class="card-body">
                            <div class="form-group company-name">
                                <label for="exampleInputEmail1"> نام <span class="chtype" >سازمان</span>  </label>
                                <input type="text" class="form-control chtypeinp" id="exampleInputEmail1" name="name_legal" placeholder="  نام سازمان">
                            </div>
                            <hr>
                    <h3>مشخصات نماینده <span class="chtype" >سازمان</span></h3>
                            <br>
                        <select name="representative_nationality" class="form-select2" aria-label="Default select example">
                            <option selected value="-">ملیت نماینده <span class="chtype">سازمان</span></option>
                            <option value="real_ir"> ایرانی</option>
                            <option value="real_foreign">اتباع خارجی</option>
                        </select>
                    <div class="form-group company-name">
                        <label for="exampleInputEmail1">  نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="  نام و نام خانوادگی">
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
                        </div>
                    <div class="card-footer" style="text-align: center;">
                        <button type="submit" class="btn  btn-lg" style="background: #84be38; color: #2c4012;width: 40%; ">ثبت نام</button>
                    </div>
                    </form>
                </div>

                <div class="all-real">
                    <form role="form" method="POST">
                        @csrf
                        <input class="tabclass" type="hidden" name="tab" value="">
                        <div class="card-body">

                    <div class="form-group company-name">
                        <label for="exampleInputEmail1">  نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="  نام و نام خانوادگی">
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
                            <label for="representative_nationality" class="legallabel"> ملیت </label>
                            <select name="representative_nationality" id="representative_nationality" class="form-select" aria-label="Default select example">
                                <option selected value="-">ملیت</option>
                                <option value="real_ir"> ایرانی</option>
                                <option value="real_foreign">اتباع خارجی</option>
                            </select>
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
                </div>




              </div>
        </div>
        <a href="/login">حساب کاربری دارید؟</a>

    </div>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $(".all-real").hide();
            $(".all-legal").hide();
            $(".form-select").change(function () {
                let type = $(this).val();
                $(".tabclass").val(type);
                if ($(".form-select").val() == '-') {
                    $(".all-real").hide();
                    $(".all-legal").hide();
                }

                if ($(".form-select").val() == 'real_ir') {
                    $(".all-real").show();
                    $(".all-legal").hide();
                }
                if ($(".form-select").val() == 'real_foreign') {
                    $(".all-real").show();
                    $(".all-legal").hide();
                }

                if ($(".form-select").val() == 'commercial_law') {
                    $(".all-legal").show();
                    $(".all-real").hide();
                    $(".chtype").html("شرکت");
                    $('.chtypeinp').attr("placeholder", "نام شرکت");

                }
                if ($(".form-select").val() == 'legals_non_com') {
                    $(".all-legal").show();
                    $(".all-real").hide();
                    $(".chtype").html("شخصیت حقوقی");
                    $('.chtypeinp').attr("placeholder", "نام شخصیت حقوقی");

                }
                if ($(".form-select").val() == 'governmental') {
                    $(".all-legal").show();
                    $(".all-real").hide();
                    $(".chtype").html("سازمان");
                    $('.chtypeinp').attr("placeholder", "نام سازمان");

                }




            });
        });
    </script>
    <!-- ver=1.0.0 -->
</body>
</html>
