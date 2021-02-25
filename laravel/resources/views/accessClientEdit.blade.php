@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <div id="accordion">
        <h1 style="margin-top:50px;margin-bottom:50px;">{{$query}}</h1>
        <form action="{{route('home')}}">
            <button type="submit" id="btn1" class="btn btn-outline-secondary" style="margin-bottom:40px; width:200px;height:50px;">На главную</button>
        </form>
    </div>
@endsection
