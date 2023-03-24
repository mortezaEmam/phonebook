@extends('layout.home')

@section('title')
   ویرایش دفترچه تلفن
@endsection

@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">ویرایش دفترچه تلفن</h5>
            </div>
            <hr>

            @include('home.sections.errors')

            <form action="{{route('home.update',['home'=>$person['id']])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-row" id="form_data">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" type="text" value="{{$person['name']}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">نام خانوادگی</label>
                        <input class="form-control" name="famili" type="text" value="{{$person['famili']}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">تلفن 1</label>
                        <input class="form-control" name="tel1" type="text" value="{{$person['tel1']}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">تلفن 2</label>
                        <input class="form-control" name="tel2" type="text" value="{{$person['tel2']}}">
                    </div>
                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{route('home.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
