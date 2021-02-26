@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Услуги</h4>
    @auth
        @if(Auth::user()->role == 'admin')
    <form method="POST" id="form-cr" style="width: 55%; margin: auto; margin-top: 20px;" enctype="multipart/form-data">
        @csrf
        <div class="form-group row" style="width:800px">
            <label class="col-3 col-form-label">Название услуги:</label>
            <div class="col-3">
                <input type="text" name="name_service" id="name_service" class="form-control" style=" width: 80%; border-color: #c5a689; height:38px"><br>
            </div>
            <label class="col-3 col-form-label">Описание услуги</label>
            <div class="col-3">
                <textarea name="description_service" cols="30"></textarea>
{{--                <input type="text" name="description_service" id="description_service" class="form-control" style=" width: 100%; border-color: #c5a689;height:100px"><br>--}}
            </div>
            <label class="col-3 col-form-label" >Стоимость</label>
            <div class="col-3">
                <input type="text" name="cost_service" id="cost_service" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>
            </div>
            <label class="col-3 col-form-label" >Путь к картинке:</label>
            <div class="col-3">
                <input type="file" name="url" id="url" class="form-control-file" style=" width: 200%; border-color: #c5a689;height:38px"><br>
            </div>
        </div>
        <div class="col-12" style="margin-bottom: 10px;">
            <button id="room-number" type="submit" class="btn btn-outline-secondary" style="margin-bottom: 35px;">Добавить услугу</button>
        </div>
        @endif
    @endauth
    </form>
    <div id="accordion">
        <div id="service-list">
            @include('servicelist')
        </div>
    </div>
    <script>
        $('#form-cr').submit(function () {
            var name=document.querySelector('input[type=file]').files[0].name;
            name="&url="+name;
            var str = $(this).serialize()+name;
            $.ajax({
                type: "POST",
                url: "{{ route('service.ajax') }}",
                data: str,
                success: function (html) {
                    $('#service-list').html(html);
                }
            });
            return false;
        });
    </script>
@endsection
