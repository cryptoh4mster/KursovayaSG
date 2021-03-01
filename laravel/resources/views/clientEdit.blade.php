@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Редактировать клиента</h4>
    <div id="accordion">
        @foreach($client as $cl)
            <form action="{{route('clientEditProcess')}}" method="post" id="form-ed" enctype="multipart/form-data">
                @csrf
                <div class="flight_form" style="margin:50px 500px">
                    <div class="flight_row" style="height:300px">
                        <div class="flight_col" style="text-align:left;margin-right:160px">
                            <p style="height:45px">Фамилия</p>
                            <p style="height:45px">Имя</p>
                            <p style="height:45px">Отчество</p>
                            <p style="height:45px">Пол</p>
                            <p style="height:45px">Телефон</p>
                        </div>
                        <div class="flight_col" style="text-align:right">
                            <input type="text" name="lastname_client" id="lastname_client" value="{{ $cl->lastname_client }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="firstname_client" id="firstname_client" value="{{ $cl->firstname_client }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="surname_client" id="surname_client" value="{{ $cl->surname_client }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="sex_client" id="sex_client" value="{{ $cl->sex_client }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="phone_client" id="phone_client" value="{{ $cl->phone_client}}" class="form-control" style="height:40px;margin-bottom:20px">
                        </div>
                    </div>
                    <input type="hidden" name="id_client" id="id_client" value="{{ $cl->id }}" class="form-control" style="border-color: #c5a689;">
                    <button type="submit" id="btn1" class="btn btn-outline-secondary" style="margin-bottom:40px; width:200px;height:50px;">Редактировать</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
