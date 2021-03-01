@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">{{$query}}</h4>
    <div id="accordion">
        @foreach($flight as $fl)
            <div class="flight_form">
                <?php
                $departureDate=strtotime($fl->departure_time);
                $departureDateTime=date("H:i",$departureDate);
                $departureDateMonth=date("d-m-Y",$departureDate);
                $arrivalDate=strtotime($fl->arrival_time);
                $arrivalDateTime=date("H:i",$arrivalDate);
                $arrivalDateMonth=date("d-m-Y",$arrivalDate);
                $flighTime=$arrivalDate-$departureDate;
                list($hh, $mm, $ss) = explode(':', gmdate('H:i:s', $flighTime));
                ?>
                <div class="flight_row">
                    <div class="flight_col">
                        <h1>{{$fl->number_flight}}</h1>
                        <p>{{$fl->company_name}}</p>
                    </div>
                    <div class="flight_col">
                        <h3>{{$departureDateTime}}</h3>
                        <h4>{{$departureDateMonth}}</h4>
                        <p>{{$fl->way_from}}</p>
                    </div>
                    <div class="flight_col">
                        <h3>{{$arrivalDateTime}}</h3>
                        <h4>{{$arrivalDateMonth}}</h4>
                        <p>{{$fl->way_to}}</p>
                    </div>
                    <div class="flight_col">
                        <h2>Время в пути</h2>
                        <p>{{$hh}} ч. {{$mm}} мин.</p>
                    </div>
                    <div class="flight_col">
                        @if(Auth::check())
                        <a href="{{route('reserves', ['id'=>$fl->id_flight])}}" class="btn btn-outline-secondary" style="margin-bottom:5px;">Забронировать</a>
                        @endif
                        <p>Стоимость: {{$fl->cost}} руб.</p>
                        <p>Осталось билетов: {{$fl->ticketsAmount}} шт.</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
