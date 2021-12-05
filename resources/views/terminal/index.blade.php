@extends('layout.master')

@section('active-terminal')
    active
@endsection

@section('content')

@section('head')
<style>
    .all{
        background: #000;
        color: #22ff00;
        direction: ltr;
        width: 100%;
        min-height: 350px;
        text-align: left
    }
    .all input{
        background: #000;
        color: #22ff00;
        direction: ltr;
        width: 100%;
        border: 0;
    }
    label{
        width: 100%;
    }
    input:focus {
        outline: none !important;
    }
</style>
@endsection

  <!-- Content Wrapper. Contains page content -->





    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="p-3 mb-2 bg-danger text-white">در استفاده از این بخش احتیاط کنید</div>
    <label for="text">
        <div class="all">
            @isset($command)
                <p>{{ $command }}</p>
                <br>
                <p><b style="color: #f00;">{{$response}}</b> {{ $buffer }}</p>
                <br>

            @endisset
            <p><b> Enter command $</b></p>

            <form method="POST">
                @csrf
                <input type="text" id="text" name="command" placeholder="-->">
            </form>
        </div>
    </label>

    </section>
    <!-- /.content -->


@endsection
