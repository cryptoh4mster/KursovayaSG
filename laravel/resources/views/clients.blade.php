@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Клиенты</h4>
{{--    <form method="POST" id="form-cr" style="width: 55%; margin: auto; margin-top: 20px;">--}}
{{--        @csrf--}}
{{--        <div class="form-group row" style="width:800px">--}}
{{--            <label class="col-3 col-form-label">Фамилия:</label>--}}
{{--            <div class="col-3">--}}
{{--                <input type="text" name="lastname_client" id="lastname_client" class="form-control" style=" width: 80%; border-color: #c5a689; height:38px"><br>--}}
{{--            </div>--}}
{{--            <label class="col-3 col-form-label">Имя</label>--}}
{{--            <div class="col-3">--}}
{{--                <input type="text" name="firstname_client" id="firstname_client" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>--}}
{{--            </div>--}}
{{--            <label class="col-3 col-form-label" >Отчество</label>--}}
{{--            <div class="col-3">--}}
{{--                <input type="text" name="surname_client" id="surname_client" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>--}}
{{--            </div>--}}
{{--            <label class="col-3 col-form-label" >Пол</label>--}}
{{--            <div class="col-3">--}}
{{--                <input type="number" name="sex_client" id="sex_client" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>--}}
{{--            </div>--}}
{{--            <label class="col-3 col-form-label">Номер</label>--}}
{{--            <div class="col-3">--}}
{{--                <input type="number" name="phone_client" id="phone_client" class="form-control" style=" width: 80%; border-color: #c5a689;height:38px"><br>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-12" style="margin-bottom: 10px;">--}}
{{--            <button id="room-number" type="submit" class="btn btn-outline-secondary" style="margin-bottom: 35px;">Добавить клиента</button>--}}
{{--        </div>--}}
{{--    </form>--}}
    <div id="accordion">
        <div class="client_form">
            <div id="client-list">
                @include('clientlist')
            </div>
        </div>
    </div>
{{--    <script>--}}
{{--        $('#form-cr').submit(function () {--}}
{{--            var str = $(this).serialize();--}}
{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: "{{ route('client.ajax') }}",--}}
{{--                data: str,--}}
{{--                success: function (html) {--}}
{{--                    $('#client-list').html(html);--}}
{{--                }--}}
{{--            });--}}
{{--            return false;--}}
{{--        });--}}
{{--    </script>--}}
@endsection
