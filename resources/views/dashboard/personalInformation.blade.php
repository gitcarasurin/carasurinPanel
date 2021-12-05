@extends('layout.master')

@section('head')
<style>
    .box{
        margin: 0 auto;
    }
</style>
@endsection

@section('title')
    تکمیل اطلاعات فردی
    @if (session('userInfo')[0]['character_type'] != 'real')
       <mark class="h6">(مدیر شرکت)</mark>
    @endif
@endsection

@section('content')



@if(!isset(session('userInfo')[0]['email_status']))

    <div class="row">
        <div class="col-md-6 box">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">تکمیل ثبت نام </h3>
                  <small>اطلاعات فردی  </small>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="email">آدرس ایمیل</label>
                      <input type="email" class="form-control" name="email" readonly id="email" placeholder="ایمیل را وارد کنید" value="{{ session('userInfo')[0]['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">شماره موبایل </label>
                        <input type="tel" class="form-control" name="phone"  id="phone" value="{{ session('userInfo')[0]['phone'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">نام ونام خانوادگی </label>
                        <input type="tel" class="form-control" name="name"  id="name" placeholder="حسین حسینی">
                    </div>
                    <div class="form-group">
                        <label for="national_number">@if (session('userInfo')[0]['nationality'] == 'real_ir') شماره شناسنامه @else شماره پاسپورت  @endif </label>
                        <input type="number" class="form-control" name="national_number"  id="national_number" placeholder="1234567890">
                    </div>
                    @if (session('userInfo')[0]['nationality'] == 'real_ir')
                    <div class="form-group">
                        <label for="national_id">شماره ملی </label>
                        <input type="number" class="form-control" name="national_id"  id="national_id" placeholder="1234567890">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="birthday">تولد </label>
                        <div class="row">
                            <div class="col-md-4">روز</div>
                            <div class="col-md-4">ماه</div>
                            <div class="col-md-4">سال</div>
                        </div>
                        <input type="number" style="width: 28%; display: inline;" class="form-control" name="birthd" min="2"  id="birthday" placeholder="02">/
                        <input type="number" style="width: 28%; display: inline;" class="form-control" name="birthm"  min="2" id="birthday" placeholder="05">/
                        <input type="number" style="width: 28%; display: inline;" class="form-control" name="birthh" min="4"  id="birthday" placeholder="1365">
                    </div>
                    <div class="form-group">
                        <label for="place_birth">محل تولد </label>
                        <input type="tel" class="form-control" name="place_birth"  id="place_birth" placeholder="تهران">
                    </div>

                    <div class="form-group">
                        <label for="addres">آدرس </label>
                        <input type="tel" class="form-control" name="addres"  id="addres" placeholder="خراسان رضوی - مشهد - خیابان 10 - کوچه 3 - پلاک 2">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">کدپستی </label>
                        <input type="number" class="form-control" name="postal_code"  id="postal_code" placeholder="12345678901">
                    </div>

                    <div class="form-group">
                        <label for="job">شغل </label>
                        <input type="tel" class="form-control" name="job"  id="job" placeholder="پزشک">
                    </div>
                    <div class="form-group">
                        <label for="education">تحصیلات  </label>
                        <input type="tel" class="form-control" name="education"  id="education" placeholder="  لیسانس  ">
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endif



@isset($_GET['okComplete'])
    <script>
        alert("اطلاعات با موقت ثبت شد");
        window.location.href="profile";
    </script>
@endisset

@endsection
