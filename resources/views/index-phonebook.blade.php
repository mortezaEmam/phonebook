@extends('layout.home')

@section('title')
    لیست دفترچه تلفن
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست دفترچه تلفن </h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('home.create') }}">
                    <i class="fa fa-plus"></i>
                    افزودن شخص جدید
                </a>
            </div>
            <div>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>شماره تلفن 1</th>
                        <th>شماره تلفن 2</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($phonebooks as $phonebook)
                        <tr>
                            <th>
                                {{$loop->iteration}}
                            </th>
                            <th>
                                {{$phonebook['name']}}
                            </th>
                            <th>
                                {{$phonebook['famili']}}
                            </th>
                            <th>
                                {{$phonebook['tel1']}}
                            </th>
                            <th>
                                {{$phonebook['tel2']}}
                            </th>
                            <th>
                                <form action="{{route('home.destroy',['home' => $phonebook['id']])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-outline-danger  mb-2" value="حذف"/>
                                </form>

                                <a class="btn btn-outline-info"
                                   href="{{route('home.edit',['home' => $phonebook['id']])}}">ویرایش</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
