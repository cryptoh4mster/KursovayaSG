@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Услуги</h4>
    <div id="accordion">
        @foreach($service as $sv)
            <div class="service_form">
                <div class="service_row">
                    <div class="service_col">
                        <img src="{{$sv->url}}" width="225" height="225">
                    </div>
                    <div class="service_col">
                            <h1>{{$sv->name_service}}</h1>
                            <p>{{$sv->description_service}}</p>
                            <h2>{{$sv->cost_service}} руб.</h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
