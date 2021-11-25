@extends('layout.master')

@section('head')
<style>
    .box{
        margin: 0 auto;
    }
</style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 box">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">تکمیل ثبت نام </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">آدرس ایمیل</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل را وارد کنید">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="پسورد را وارد کنید">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">ارسال فایل</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">مرا بخاطر بسپار</label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection
