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
            <div class="flight_deletebtn">
                @auth
                    @if(Auth::user()->role == 'admin')
                        <form action="{{route('flightDelete',['id'=>$fl->id_flight])}}" method="post" id="form-ed" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" id="btn2" class="btn btn-danger" style="margin-bottom:5px;margin-left:10px">x</button>
                        </form>
                        <form action="{{route('flightEdit',['id'=>$fl->id_flight])}}" method="post" id="form-ed" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" id="btn2" class="btn btn-warning" style="margin-left:10px">*</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endforeach
