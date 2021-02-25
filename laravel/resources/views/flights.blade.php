@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Рейсы</h4>
    @auth
        @if(Auth::user()->role == 'admin')
    <form method="POST" id="form-cr" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">
            <label class="col-3 col-form-label">Номер рейса:</label>
            <div class="col-3">
                <input type="text" name="number_flight" id="number_flight" class="form-control" style=" width: 80%; border-color: #c5a689; height:38px"><br>
            </div>
            <label class="col-3 col-form-label">Название компании</label>
            <div class="col-3">
                <input type="text" name="company_name" id="company_name" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>
            <label class="col-3 col-form-label" >Откуда</label>
            <div class="col-3">
                <input type="text" name="way_from" id="way_from" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>

            <label class="col-3 col-form-label" >Куда</label>
            <div class="col-3">
                <input type="text" name="way_to" id="way_to" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>

            <label class="col-3 col-form-label">Время посадки</label>
            <div class="col-3">
                <input type="datetime-local" name="landing_time" id="landing_time" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>

            <label class="col-3 col-form-label">Время вылета</label>
            <div class="col-3">
                <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>

            <label class="col-3 col-form-label">Время прилета</label>
            <div class="col-3">
                <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>

            <label class="col-3 col-form-label">Цена</label>
            <div class="col-3">
                <input type="number" name="cost" id="cost" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>

            <label class="col-3 col-form-label">Количество билетов</label>
            <div class="col-3">
                <input type="number" name="ticketsAmount" id="ticketsAmount" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>
        </div>
        <button type="submit" id="btn1" class="btn btn-outline-secondary" style=" width:200px;height:50px;">Добавить рейс</button>
    </form>
        @endif
    @endauth
    <div id="accordion">
        <div id="flight-list">
            @include('flightlist')
        </div>
    </div>
    <script>
        $('#form-cr').submit(function () {
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('flight.ajax') }}",
                data: str,
                success: function (html) {
                    $('#flight-list').html(html);
                }
            });
            return false;
        });
    </script>
@endsection
