@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Бронь билета</h4>
    <div id="accordion">
        @foreach($flight as $fl)
            <form action="{{route('reservationProcess')}}" method="post" id="form-ed" enctype="multipart/form-data">
                @csrf
            <div class="reserve_form">
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
                <div class="reserve-row">
                    <div class="reserve-col" style="text-align:left">
                        <p>Номер рейса</p>
                        <p>Название компании</p>
                        <p>Название рейса</p>
                        <p>Дата вылета</p>
                        <p>Дата прилета</p>
                        <p>Время в пути</p>
                        <p>Билетов осталось</p>
                    </div>
                    <div class="reserve-col" style="text-align:right">
                        <p>{{$fl->number_flight}}</p>
                        <p>{{$fl->company_name}}</p>
                        <p>{{$fl->way_from}} {{$fl->way_to}}</p>
                        <p>{{$departureDateTime}} {{$departureDateMonth}}</p>
                        <p>{{$arrivalDateTime}} {{$arrivalDateMonth}}</p>
                        <p>{{$hh}} ч. {{$mm}} мин.</p>
                        <p>{{$fl->ticketsAmount}} шт.</p>
                    </div>
                </div>
                <div class="reserve-row">
                    <div class="reserve-col" style="text-align:left">
                        <p>Выберите место</p><br>
                        <p>Добавьте необходимые услуги</p>
                        <p style="margin-top:73px">Стоимость билета</p>
                    </div>
                    <div class="reserve-col" style="text-align:right">
                        <input type="text" name="seat" id="seat" placeholder="1-100" style="width:100px; height:30px;margin-bottom:35px">
                        <div><input type="checkbox" id="service1" name="service1" value="1500">
                            <label for="service1">Наличие багажа</label></div>
                        <div><input type="checkbox" id="service2" name="service2" value="2000">
                            <label for="service2">Возможность возврата билета</label></div>
                        <div><input type="checkbox" id="service3" name="service3" value="1000">
                            <label for="service3">Перевоз животных</label></div>
                        <span class="total" id="total" name="total">{{$fl->cost}}</span>
                        <input type="hidden" id="cost" name="cost" value="{{$fl->cost}}">
                        <input type="hidden" id="id_flight" name="id_flight" value="{{$fl->id_flight}}">
                    </div>
                </div>
                    <button type="submit" id="btn1" class="btn btn-outline-secondary" style="margin-bottom:40px; width:200px;height:50px;">Забронировать</button>
            </div>
            <script>
                $(function() {
                    $('input').click(function(){
                        var total = {{$fl->cost}};
                        $('input:checked').each(function(index, item) {
                            total += parseFloat(item.value);
                        });
                        $('.total').text(total);
                    });
                });
            </script>
            </form>
        @endforeach
    </div>


@endsection
