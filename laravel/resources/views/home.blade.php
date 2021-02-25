@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection


@section('main-content')


<form action="{{route('flightFinding')}}" method="post" id="form-ed" enctype="multipart/form-data">
    @csrf
    <div class="bg-image">
        <div class="reserve-search_form">
            <h2>Укажите маршрут, чтобы найти авиабилеты</h2>
            <div class="reserve-search_row">
                <div class="reserve-search_col">
                    <input type="text" class="icon1" name="from" id="from" placeholder="Откуда">
                </div>
                <div class="reserve-search_col">
                    <input type="text" class="icon2" name="to" id="to" placeholder="Куда">
                </div>
                <div class="reserve-search_col" style="width:200px">
                    <input type="date" class="icon3" name="when" id="when" placeholder="Туда">
                </div>
                <div class="reserve-search_col" style="width:200px">
                    <button type="submit" class="btn btn-outline-secondary" style="margin-bottom:5px; width:200px;height:50px;">Найти рейсы</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
