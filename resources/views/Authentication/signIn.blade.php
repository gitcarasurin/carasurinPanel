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
                    <option value="real">حقیقی</option>
                    <option value="commercial_law">حقوقی تجاری</option>
                    <option value="legals_non_com">حقوقی غیر تجاری</option>
                    <option value="governmental">دولتی و  سازمان ها </option>
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


                <div class="commercial_law all-form">
                    <form role="form" method="POST">
                        @csrf
                        <input class="tabclass" type="hidden" name="tab" value="">
                        <div class="card-body">
                            <div class="form-group company-name">
                                <label for="exampleInputEmail1"> نام <span class="chtype" >شخصیت</span>  </label>
                                <input type="text" class="form-control chtypeinp" id="exampleInputEmail1" name="name_legal" placeholder="  نام سازمان">
                            </div>
                            <hr>
                    <!-- <h3>مشخصات نماینده <span class="chtype" >سازمان</span></h3> -->
                            <br>
                        <label for="representative_nationality">ملیت مدیر عامل</label>
                        <select name="representative_nationality" id="representative_nationality" class="form-select2 col-md-12" aria-label="Default select example">
                            <option selected value="-"> انتخاب کنید </option>
                            <option value="real_ir"> ایرانی</option>
                            <option value="real_foreign">اتباع خارجی</option>
                        </select>
                    <!-- <div class="form-group company-name">
                        <label for="exampleInputEmail1">  نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="  نام و نام خانوادگی">
                    </div> -->
                    <br>
                    <br>
                    <div class="form-group company-name">
                        <label for="company_type">نوع شرکت</label>
                        <select name="company_type" id="company_type" class="form-select2 col-md-12" aria-label="Default select example">
                            <option selected value="-"> انتخاب کنید </option>
                            <option value="private_equity"> سهامی خاص </option>
                            <option value="public_stock"> سهامی عام </option>
                            <option value="limited_responsibility"> با مسئولیت محدود </option>
                            <option value="solidarity"> تضامنی </option>
                            <option value="mixed_stock"> مختلط سهامی </option>
                            <option value="Non_joint_stock_mixed"> مختلط غیر سهامی </option>
                            <option value="relative">  نسبی </option>
                            <option value="cooperative">  تعاونی </option>
                        </select>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1" class="legallabel"> شماره تلفن</label>
                            <input type="tel" class="form-control legalname" id="exampleInputphone" name="phone" placeholder="09123456789 ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ایمیل  </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email@nail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="نام کاربری">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">کلمه عبور</label>
                        <input type="password" class="form-control pass" id="exampleInputPassword1" name="pass" placeholder="پسورد را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> تکرار کلمه عبور</label>
                            <input type="password" class="form-control repass" name="repass" placeholder="پسورد را وارد کنید">
                        </div>
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

                <div class="governmental all-form">
                    <form role="form" method="POST">
                        @csrf
                        <input class="tabclass" type="hidden" name="tab" value="">
                        <div class="card-body">
                            <div class="form-group company-name">
                                <label for="exampleInputEmail1"> نام <span class="chtype" >سازمان</span>  </label>
                                <input type="text" class="form-control chtypeinp" id="exampleInputEmail1" name="name_legal" placeholder="  نام سازمان">
                            </div>
                            <hr>

                    <br>
                    <div class="form-group company-name">
                        <label for="company_type">نوع سازمان</label>
                        <select name="company_type" id="company_type" class="form-select2 col-md-12" aria-label="Default select example">
                            <option selected value="-"> انتخاب کنید </option>
                            <option value="real_ir"> دولتی </option>
                            <option value="real_foreign"> نهاد عمومی غیر دولتی </option>
                        </select>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1" class="legallabel"> شماره تلفن</label>
                            <input type="tel" class="form-control legalname" id="exampleInputphone" name="phone" placeholder="09123456789 ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ایمیل  </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email@nail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="نام کاربری">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">کلمه عبور</label>
                        <input type="password" class="form-control pass" id="exampleInputPassword1" name="pass" placeholder="پسورد را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> تکرار کلمه عبور</label>
                            <input type="password" class="form-control repass"  name="repass" placeholder="پسورد را وارد کنید">
                        </div>
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

                <div class="legals_non_com all-form">
                    <form role="form" method="POST">
                        @csrf
                        <input class="tabclass" type="hidden" name="tab" value="">
                        <div class="card-body">
                            <div class="form-group company-name">
                                <label for="exampleInputEmail1"> نام <span class="chtype" >شرکت</span>  </label>
                                <input type="text" class="form-control chtypeinp" id="exampleInputEmail1" name="name_legal" placeholder="  نام سازمان">
                            </div>
                            <hr>
                    <!-- <h3>مشخصات نماینده <span class="chtype" >سازمان</span></h3> -->

                    <!-- <div class="form-group company-name">
                        <label for="exampleInputEmail1">  نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="  نام و نام خانوادگی">
                    </div> -->
                    <br>

                    <div class="form-group company-name">
                        <label for="representative_nationality">نوع شخصیت</label>
                        <select name="representative_nationality" id="representative_nationality" class="form-select2 col-md-12" aria-label="Default select example">
                            <option selected value="-"> انتخاب کنید </option>
                            <option value="institute"> موسسه </option>
                            <option value="publishers"> انتشارات </option>
                            <option value="canon"> کانون </option>
                            <option value="union"> انجمن </option>
                            <option value="chamber_commerce"> اتحادیه اتاق بازرگانی </option>
                            <option value="NGO"> سازمان های مردم نهاد </option>
                        </select>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1" class="legallabel"> شماره تلفن</label>
                            <input type="tel" class="form-control legalname" id="exampleInputphone" name="phone" placeholder="09123456789 ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ایمیل  </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email@nail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="نام کاربری">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">کلمه عبور</label>
                        <input type="password" class="form-control pass" id="exampleInputPassword1" name="pass" placeholder="پسورد را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> تکرار کلمه عبور</label>
                            <input type="password" class="form-control repass"  name="repass" placeholder="پسورد را وارد کنید">
                        </div>
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


                <div class="all-real all-form">
                    <form role="form" method="POST">
                        @csrf
                        <input class="tabclass" type="hidden" name="tab" value="">
                        <div class="card-body">

                    <div class="form-group company-name">
                        <label for="exampleInputEmail1">  نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="  نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label for="representative_nationality" class="legallabel"> تابعیت </label>
                        <select name="representative_nationality" id="representative_nationality" class="form-select" aria-label="Default select example">
                            <option selected value="-">انتخاب کنید</option>
                            <option value="real_ir"> ایرانی</option>
                            <option value="real_foreign">غیر ایررانی</option>
                        </select>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="legallabel"> شماره تلفن</label>
                            <input type="tel" class="form-control legalname" id="exampleInputphone" name="phone" placeholder="09123456789 ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ایمیل  </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="ایمیل">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="نام کاربری">
                            </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">کلمه عبور</label>
                        <input type="password" class="form-control pass" id="pass" name="pass" placeholder="پسورد را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> تکرار کلمه عبور</label>
                            <input type="password" class="form-control repass"  name="repass" placeholder="پسورد را وارد کنید">
                        </div>
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

            $(".all-form").hide();
            $(".form-select").change(function () {
            $(".all-form").hide();

                let type = $(this).val();
                $(".tabclass").val(type);
                if ($(".form-select").val() == '-') {
                    $(".all-real").hide();
                    $(".all-legal").hide();
                }

                if ($(".form-select").val() == 'real') {
                    $(".all-real").show();
                }

                if ($(".form-select").val() == 'commercial_law') {
                    $(".commercial_law").show();
                }
                if ($(".form-select").val() == 'legals_non_com') {
                    $(".legals_non_com").show();
                }
                if ($(".form-select").val() == 'governmental') {
                    $(".governmental").show();
                }

            });

             // برسی تکرار پسورد
            $(".all-real .repass").keyup(function(){

                let mainPass = $(".all-real .pass").val();
                let repass = $(".all-real .repass").val();
                if (mainPass === repass) {
                    $(".all-real .repass").css("border", "2px solid #28a745");
                }else{
                    $(".all-real .repass").css("border", "2px solid #f00");
                }
            });

            $(".all-real .repass").keyup(function(){

                let mainPass = $(".all-real .pass").val();
                let repass = $(".all-real .repass").val();
                if (mainPass === repass) {
                    $(".all-real .repass").css("border", "2px solid #28a745");
                }else{
                    $(".all-real .repass").css("border", "2px solid #f00");
                }
            });

            $(".commercial_law .repass").keyup(function(){

                let mainPass = $(".commercial_law .pass").val();
                let repass = $(".commercial_law .repass").val();
                if (mainPass === repass) {
                    $(".commercial_law .repass").css("border", "2px solid #28a745");
                }else{
                    $(".commercial_law .repass").css("border", "2px solid #f00");
                }
            });

            $(".legals_non_com .repass").keyup(function(){

                let mainPass = $(".legals_non_com .pass").val();
                let repass = $(".legals_non_com .repass").val();
                if (mainPass === repass) {
                    $(".legals_non_com .repass").css("border", "2px solid #28a745");
                }else{
                    $(".legals_non_com .repass").css("border", "2px solid #f00");
                }
            });

            $(".governmental .repass").keyup(function(){

                let mainPass = $(".governmental .pass").val();
                let repass = $(".governmental .repass").val();
                if (mainPass === repass) {
                    $(".governmental .repass").css("border", "2px solid #28a745");
                }else{
                    $(".governmental .repass").css("border", "2px solid #f00");
                }
            });


        });
    </script>
    <!-- ver=1.0.0 -->
</body>
</html>
