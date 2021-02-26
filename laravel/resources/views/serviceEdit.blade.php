@extends('layout')

@section('title')Главная страница@endsection
@section('class-home')class="nav-link"@endsection
@section('class-reserve')class="nav-link"@endsection
@section('class-flight')class="nav-link"@endsection
@section('class-service')class="nav-link"@endsection
@section('class-client')class="nav-link"@endsection

@section('main-content')
    <h4 style="padding-top: 25px; padding-bottom: 20px;">Редактировать услугу</h4>
    <div id="accordion">
        @foreach($service as $sv)
            <form action="{{route('serviceEditProcess')}}" method="post" id="form-ed" enctype="multipart/form-data">
                @csrf
                <div class="flight_form" style="margin:50px 500px;height:600px">
                    <div class="flight_row" style="height:400px">
                        <div class="flight_col" style="text-align:left;margin-right:130px">
                            <p style="height:45px;margin-bottom:50px">Название услуги</p>
                            <p style="height:45px;margin-bottom:100px">Описание услуги</p>
                            <p style="height:45px;margin-bottom:50px">Стоимость услуги</p>
                            <p style="height:45px;margin-bottom:50px">Картинка услуги</p>
                        </div>
                        <div class="flight_col" style="text-align:right">
                            <input type="text" name="name_service" id="name_service" value="{{ $sv->name_service }}" class="form-control" style="height:40px;margin-bottom:50px;width:200px">
{{--                            <input type="text" name="firstname_client" id="firstname_client" value="{{ $sv->description_service }}" class="form-control" style="height:40px;margin-bottom:20px">--}}
                            <textarea name="description_service" id="description_service" style="height:100px;margin-bottom:50px;width:200px" >{{$sv->description_service}}</textarea>
                            <input type="text" name="cost_service" id="cost_service" value="{{ $sv->cost_service }}" class="form-control" style="height:40px;margin-bottom:50px;width:200px">
                            <input type="text" name="url1" id="url1" value="{{ $sv->url }}" class="form-control" style="height:40px;margin-bottom:50px; width:200px">
                            <input type="file" name="url" id="url" class="form-control-file" style=" width: 80%; border-color: #c5a689;height:38px;margin-bottom:50px;" ><br>
                        </div>
                    </div>
                    <input type="hidden" name="id_service" id="id_service" value="{{ $sv->id_service }}" class="form-control" style="border-color: #c5a689;">
                    <button type="submit" id="btn1" class="btn btn-outline-secondary" style="margin-bottom:40px; width:200px;height:50px;margin-top:100px">Редактировать</button>
                </div>
            </form>
        @endforeach
    </div>
    <script>
        $('#url').click(function(){
            $('#url').change(function(){
                var filename=$('#url').val();
                filename=filename.slice(12);
                filename='img/'+filename;
                $('#url1').val(filename);
            });
        });
    </script>
@endsection
