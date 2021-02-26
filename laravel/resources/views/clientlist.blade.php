@foreach($client as $cl)
    <div class="client_row" style="margin-bottom:10px;">
        <div class="client_col">
            <p>{{$cl->id_client }}</p>
        </div>
        <div class="client_col">
            <p>{{$cl->lastname_client}}</p>
        </div>
        <div class="client_col">
            <p>{{$cl->firstname_client}}</p>
        </div>
        <div class="client_col">
            <p>{{$cl->surname_client}}</p>
        </div>
        <div class="client_col">
            <p><?php
                if($cl->sex_client==1)
                    echo "Мужской";
                else
                    echo "Женский";
                ?>
            </p>
        </div>
        <div class="client_col">
            <p>{{$cl->phone_client}}</p>
        </div>
        <div class="client_col">
            ID рейсов:
            @foreach($reserve as $rs)
                @if ($rs->client_id==$cl->id_client)
                    {{$rs->flight_id}}
                @endif
            @endforeach
        </div>
        <div class="client_col">
            <form action="{{route('clientEdit',['id'=>$cl->id_client])}}" method="post" id="form-ed" enctype="multipart/form-data">
                @csrf
                <button type="submit" id="btn1" class="btn btn-warning">*</button>
            </form>
        </div>
        <div class="client_col">
            <form action="{{route('clientDelete',['id'=>$cl->id_client])}}" method="post" id="form-ed" enctype="multipart/form-data">
                @csrf
                <button type="submit" id="btn1" class="btn btn-danger">x</button>
            </form>
        </div>
    </div>
@endforeach
