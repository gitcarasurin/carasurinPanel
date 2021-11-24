<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ایمیل تایید</title>
    <style>
        .all{
            width: 300px;
            height: 300px;
            margin: 0 auto;
            direction: rtl;
        }
        header{
            width: 100%;
            height: 100px;
            text-align: center;
            color: #84be38;

        }
        header img{
            width: 70px;
            height: 70px;
        }
        .center{
            width: 100%;
            height: 500px;
            text-align: center;
            color: #2c4012;
        }
        .center .code{
            position: relative;
            top: 50px;
            background: #ffb931;
            color: #6f450b;
            border-radius: 5px;
            width: 200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="all">
        <header>
            <img src="https://s4.uupload.ir/files/m-logo_7aod.png">
            <br>
            <b>کد تایید مونوتل</b>
        </header>
        <div class="center">
            <div class="code">
                کد تایید شما
                <br>
                <b>{{ $code }}</b>
            </div>
        </div>
        <footer>

        </footer>
    </div>

</body>
</html>
