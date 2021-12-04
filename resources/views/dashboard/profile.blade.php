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
                  <h5 class="widget-user-desc" style="text-decoration: underline;"><?php echo (session('userInfo')[0]['character_type'] != 'real_ir' && session('userInfo')[0]['character_type'] != 'real_foreign') ? '<a href="a" >جهت تکمیل اطلاعات حساب حقوقی.</a>' : ''; ?></h5>
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



                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        @if (session('userInfo')[0]['status'] == "waiting")
                                <h5 class="description-header text-warning"> در انتظار تایید <i class="fas fa-exclamation-triangle"></i></h5>
                        @endif
                        @if (session('userInfo')[0]['status'] == "active")
                            <h5 class="description-header text-success">  تایید شده(فعال) <i class="fas fa-check-circle"></i></h5>
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




@endsection
