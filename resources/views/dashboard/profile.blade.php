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
        <div class="col-12">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info-active">
                  <h3 class="widget-user-username">{{ session('userInfo')[0]['name'] }}</h3>
                  <h5 class="widget-user-desc" style="text-decoration: underline;"><?php echo (session('userInfo')[0]['character_type'] == 'real') ? '' : '<a href="a" >تکمیل اطلاعات حساب حقوقی.</a>'; ?></h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src={{"../dist/img/user_image/".session('userInfo')[0]['img'] }} alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-4 border-left">
                      <div class="description-block">
                        <h5 class="description-header">۳,۲۰۰</h5>
                        <span class="description-text">موجودی کیف پول</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-left">
                        <div class="description-block">

                        <form method="post" enctype="multipart/form-data" >
                            @csrf
                            <label for="imageUser">
                                    <h5>برای ویرایش</h5>
                                    <b> تصویر <b style="color: #0087ff;">کلیک</b> کنید </b>
                              <input style="display: none;" accept=".png,.jpg" type="file" name="imageUser" id="imageUser" onchange="this.form.submit()" >
                            </label>
                        </form>
                        </div>

                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        @if (session('userInfo')[0]['document_authentication'])
                                <h5 class="description-header text-success">حساب کاربری تایید شده <i class="fas fa-check-circle"></i></h5>
                            @else
                                <h5 class="description-header text-danger">هنوز تایید نشده <i class="fas fa-times-circle"></i></h5>
                        @endif
                        <span class="description-text">وضعیت حساب کاربری</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>
        </div>
    </div>

@if(!isset(session('userInfo')[0]['phone']))

    <div class="row">
        <div class="col-md-6 box">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">تکمیل ثبت نام </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="email">آدرس ایمیل</label>
                      <input type="email" class="form-control" name="email" readonly id="email" placeholder="ایمیل را وارد کنید" value="{{ session('userInfo')[0]['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">شماره موبایل </label>
                        <input type="tel" class="form-control" name="phone"  id="phone" placeholder="09123456789">
                    </div>
                    <div class="form-group">
                        <label for="national_number">شماره شناسنامه </label>
                        <input type="number" class="form-control" name="national_number"  id="national_number" placeholder="1234567890">
                    </div>
                    <div class="form-group">
                        <label for="national_id">شماره ملی </label>
                        <input type="number" class="form-control" name="national_id"  id="national_id" placeholder="1234567890">
                    </div>
                    <div class="form-group">
                        <label for="birthday">تولد </label>
                        <input type="text" class="form-control" name="birthday"  id="birthday" placeholder="20-02-1365">
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
                        <label for="postal_code">شماره پستی </label>
                        <input type="tel" class="form-control" name="postal_code"  id="postal_code" placeholder="12345678901">
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
