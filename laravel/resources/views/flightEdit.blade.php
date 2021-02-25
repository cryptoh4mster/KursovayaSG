@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Редактировать рейс</h4>
    <div id="accordion">
        @foreach($flight as $fl)
            <form action="{{route('flightEditProcess')}}" method="post" id="form-ed" enctype="multipart/form-data">
                @csrf
                <div class="flight_form" style="margin:50px 500px">
                    <div class="flight_row" style="height:500px">
                        <div class="flight_col" style="text-align:left;margin-right:160px">
                            <p style="height:45px">Номер рейса</p>
                            <p style="height:45px">Название компании</p>
                            <p style="height:45px">Откуда</p>
                            <p style="height:45px">Куда</p>
                            <p style="height:45px">Дата посадки</p>
                            <p style="height:45px">Дата вылета</p>
                            <p style="height:45px">Дата прилета</p>
                            <p style="height:45px">Билетов осталось</p>
                            <p>Стоимость</p>
                        </div>
                        <div class="flight_col" style="text-align:right">
                            <input type="text" name="number_flight" id="number_flight" value="{{ $fl->number_flight }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="company_name" id="company_name" value="{{ $fl->company_name }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="way_from" id="way_from" value="{{ $fl->way_from }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="way_to" id="way_to" value="{{ $fl->way_to }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="landing_time" id="landing_time" value="{{ $fl->landing_time}}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="departure_time" id="departure_time" value="{{ $fl->departure_time }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="arrival_time" id="arrival_time" value="{{ $fl->arrival_time }}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="ticketsAmount" id="ticketsAmount" value="{{ $fl->ticketsAmount}}" class="form-control" style="height:40px;margin-bottom:20px">
                            <input type="text" name="cost" id="cost" value="{{ $fl->cost}}" class="form-control" style="height:40px;margin-bottom:20px">
                        </div>
                    </div>
                    <input type="hidden" name="id_flight" id="id_flight" value="{{ $fl->id_flight }}" class="form-control" style="border-color: #c5a689;">
                    <button type="submit" id="btn1" class="btn btn-outline-secondary" style="margin-bottom:40px;margin-top:60px; width:200px;height:50px;">Редактировать</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection
