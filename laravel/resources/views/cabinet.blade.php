@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
<h4 style="padding-top: 25px; padding-bottom: 20px;">Ваши брони</h4>
    <div id="accordion">
        @foreach($query as $qr)
            <div class="flight_form">
                <?php
                $departureDate=strtotime($qr->departure_time);
                $departureDateTime=date("H:i",$departureDate);
                $departureDateMonth=date("d-m-Y",$departureDate);
                $arrivalDate=strtotime($qr->arrival_time);
                $arrivalDateTime=date("H:i",$arrivalDate);
                $arrivalDateMonth=date("d-m-Y",$arrivalDate);
                $flighTime=$arrivalDate-$departureDate;
                list($hh, $mm, $ss) = explode(':', gmdate('H:i:s', $flighTime));
                ?>
                <div class="flight_row">
                    <div class="flight_col">
                        <h1>{{$qr->number_flight}}</h1>
                        <p>{{$qr->company_name}}</p>
                    </div>
                    <div class="flight_col">
                        <h3>{{$departureDateTime}}</h3>
                        <h4>{{$departureDateMonth}}</h4>
                        <p>{{$qr->way_from}}</p>
                    </div>
                    <div class="flight_col">
                        <h3>{{$arrivalDateTime}}</h3>
                        <h4>{{$arrivalDateMonth}}</h4>
                        <p>{{$qr->way_to}}</p>
                    </div>
                    <div class="flight_col">
                        <h2>Время в пути</h2>
                        <p>{{$hh}} ч. {{$mm}} мин.</p>
                    </div>
                    <div class="flight_col" style="width:500px">
                        <h4 style="margin-bottom:10px;margin-top:5px;">Стоимость: {{$qr->total_cost}} руб.</h4>
                        <h4>Место: {{$qr->seat_number}}</h4>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
@endsection
