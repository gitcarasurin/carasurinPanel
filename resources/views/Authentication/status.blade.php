<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>هشدار</title>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">







    <style>
        body{
            font-family: 'Vazir', sans-serif !important;
        }
        @font-face {
            font-family: irsens;
            src: url(font/IRANSansWeb.woff);
        }
        body{
            background:#f0f0f0;
            font-family: irsens;
        }
        .all{
            position: relative;
            width: 100%;
            top: calc(50% - 100px);
        }
        .all .boxx{
            position: relative;
            width:600px;
            height: 200px;
            right: calc(50% - 300px);
        }
        @media(max-width:600px){
            body{
                background: #fff;

            }
            .all .boxx{
                width: 100%;
                right:0;
            }
        }
        .small-box{
            border-radius:20px;
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="boxx">





            {{--  @isset ($_GET['emailcodeno'])
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> دسترسی ندارید</h3>

                    <p>لطفا ابتدا ایمیل خود را تایید کنید.</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-ban"></i>
                  </div>
                  <a href="/resendCode" class="small-box-footer">
                    برای تایید  ایمیل کلیک کنید. <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
            @endisset  --}}

            @isset ($_GET['emailcodeno'])
            <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> دسترسی ندارید</h3>

                    <p>لطفا ابتدا شماره تلفن خود را تایید کنید.</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-ban"></i>
                  </div>
                  <a href="/resendCode" class="small-box-footer">
                    برای تلفن  ایمیل کلیک کنید. <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
            @endisset






            @isset ($_GET['denyAccess'])
            <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> دسترسی ندارید</h3>

                    <p>شما به این بخش دسترسی ندارید</p>
                    <p>ابتدا به حساب کاربری خود <b><a href="/login"><button>وارد</button></a></b> شوید</p>
                    <p>یا در صورت اطمینان نسبت به دسترسی خود با واحد پشتیبانی تماس بگیرید</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-ban"></i>
                  </div>
                  {{--  <a href="/resendCode" class="small-box-footer">
                    برای تایید  ایمیل کلیک کنید. <i class="fa fa-arrow-circle-right"></i>
                  </a>  --}}
                </div>
            @endisset






        </div>
    </div>
</body>
</html>
