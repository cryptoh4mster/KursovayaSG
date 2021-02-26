@foreach($service as $sv)
    <div class="service_form">
        <div class="service_row">
            <div class="service_col">
                <img src="{{$sv->url}}" width="225" height="225">
            </div>
            <div class="service_col" style="width:400px">
                <h1 >{{$sv->name_service}}</h1>
                <p>{{$sv->description_service}}</p>
                <h2>{{$sv->cost_service}} руб.</h2>
            </div>
            <div class="flight_deletebtn">
                @auth
                    @if(Auth::user()->role == 'admin')
                        <form action="{{route('serviceDelete',['id'=>$sv->id_service])}}" method="post" id="form-ed" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" id="btn2" class="btn btn-danger" style="margin-bottom:5px;margin-left:10px">x</button>
                        </form>
                        <form action="{{route('serviceEdit',['id'=>$sv->id_service])}}" method="post" id="form-ed" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" id="btn2" class="btn btn-warning" style="margin-left:10px">*</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endforeach
