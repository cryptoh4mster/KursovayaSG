<?php

namespace App\Http\Controllers;

use App\Client;
use App\Flight;
use App\Reserve;
use App\ReserveService;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }
    public function cabinet($id) {
        //$client=Client::get()->where('id_client',$id);
        //$reserve=DB::select("SELECT * FROM reserves WHERE reserves.client_id='$id'");
        //$flight=DB::select("SELECT * FROM flights WHERE flights.id_flight='$reserve.'")

        $query=DB::select("SELECT * FROM reserves
                            LEFT JOIN flights
                            ON reserves.flight_id=flights.id_flight
                            WHERE reserves.client_id='$id'");
        return view('cabinet',compact('query'));

    }

    public function flight() {
        $flight = new Flight();
        return view('flights', ['flight' => $flight->all()]);
    }

    public function service() {
        $service = new Service();
        return view('services', ['service' => $service->all()]);
    }

    public function client() {
        $client = new User();
        $reserve=new Reserve();
        $flight=new Flight();
        return view('clients', ['client' => $client->all(),'reserve'=>$reserve->all(),'flight'=>$flight->all()]);
    }


    public function flightFinding(Request $request){
        $requestFrom=$request->from;
        $requestTo=$request->to;
        $requestWhen=$request->when;
        $requestWhen=$requestWhen . " 00:00:00";
        $flight=DB::select("SELECT * FROM flights
                            WHERE flights.way_from='$requestFrom'
                            && flights.way_to='$requestTo'
                            && flights.departure_time <= '$requestWhen'");
        if($flight==null)
            $query="К сожалению рейсов по вашим условиям не найдено";
        else
            $query="Найденные рейсы:";
        return view('flightFinding',compact('flight','query'));
    }

    public function reserve($id) {
        $flight=Flight::get()->where('id_flight',$id);
        return view('reserves',compact('flight'));
    }

    public function reservationProcess(Request $request){
        $totalcost=$request->cost;
        $totalcost=$totalcost+$request->service1+$request->service2+$request->service3;
        $reservation=new Reserve();
        $query=DB::select("SELECT * FROM reserves WHERE reserves.seat_number='$request->seat'");
        if($query==null){
        $reservation->seat_number=$request->seat;
        $reservation->total_cost=$totalcost;
        $reservation->flight_id=$request->id_flight;
        $flight=Flight::where('id_flight',$request->id_flight)->first();
        $flight->ticketsAmount=$flight->ticketsAmount-1;
        $flight->update();
        $reservation->client_id=\Auth::user()->id;
        $reservation->save();

        $reservation=Reserve::orderBy('id_reserve','desc')->first();

        if($request->service1!=null){
            $service1=new ReserveService();
            $service1->reserve_id=$reservation->id_reserve;
            $service1->service_id=1;
            $service1->save();
        }
        if($request->service2!=null){
            $service2=new ReserveService();
            $service2->reserve_id=$reservation->id_reserve;
            $service2->service_id=2;
            $service2->save();
        }
        if($request->service3!=null){
            $service3=new ReserveService();
            $service3->reserve_id=$reservation->id_reserve;
            $service3->service_id=3;
            $service3->save();
        }
            $query="Вы успешно забронировали данный рейс";
        }
        else
            $query="К сожалению данное место занято";

        return view('accessReserve',compact('query'));
    }


    public function flight_ajax(Request $request){
        $flightAdd=new Flight();
        $flightAdd->number_flight=$request->number_flight;
        $flightAdd->company_name=$request->company_name;
        $flightAdd->way_from=$request->way_from;
        $flightAdd->way_to=$request->way_to;
        $flightAdd->landing_time=$request->landing_time;
        $flightAdd->departure_time=$request->departure_time;
        $flightAdd->arrival_time=$request->arrival_time;
        $flightAdd->cost=$request->cost;
        $flightAdd->ticketsAmount=$request->ticketsAmount;
        $flightAdd->save();
        $flight = new Flight();
        return view('flightlist', ['flight' => $flight->all()]);


    }
    public function flightDelete($id) {
        $flight = Flight::where('id_flight', $id)->first();
        $flight->delete();
        $flight= new Flight();
        return redirect()->route('flights',['flight' => $flight->all()]);
    }
    public function flightEdit($id){
        $flight=Flight::get()->where('id_flight',$id);
        return view('flightEdit',compact('flight'));
    }

    public function flightEditProcess(Request $request){
        //$flight=Flight::get()->where('id_flight',$request->id_flight);
        $flight = Flight::where('id_flight', $request->id_flight)->first();
        $flight->number_flight=$request->number_flight;
        $flight->company_name=$request->company_name;
        $flight->way_from=$request->way_from;
        $flight->way_to=$request->way_to;
        $flight->landing_time=$request->landing_time;
        $flight->departure_time=$request->departure_time;
        $flight->arrival_time=$request->arrival_time;
        $flight->cost=$request->cost;
        $flight->ticketsAmount=$request->ticketsAmount;
        $flight->save();
        $query="Вы успешно отредактировали рейс";
        return view('accessFlightEdit',compact('query'));
    }

    public function client_ajax(Request $request) {
        $clientAdd=new Client();
        $clientAdd->lastname_client=$request->lastname_client;
        $clientAdd->firstname_client=$request->firstname_client;
        $clientAdd->surname_client=$request->surname_client;
        $clientAdd->sex_client=$request->sex_client;
        $clientAdd->phone_client=$request->phone_client;
        $clientAdd->save();
        $client = new Client();
        $reserve=new Reserve();
        return view('clientlist', ['client' => $client->all(),'reserve'=>$reserve->all()]);
    }

    public function clientDelete($id){
//        $client = Client::where('id_client', $id)->first();
//        $client->delete();
//        $client = new Client();
//        $reserve=new Reserve();
//        return redirect()->route('clients',['client' => $client->all(),'reserve'=>$reserve->all()]);
        $user=User::where('id',$id)->first();
        $user->delete();
        $user=new User();
        $reserve=new Reserve();
        return redirect()->route('clients',['client'=>$user->all(),'reserve'=>$reserve->all()]);
    }
    public function clientEdit($id){
//        $client=Client::get()->where('id_client',$id);
//        return view('clientEdit',compact('client'));
        $client=User::get()->where('id',$id);
        return view('clientEdit',compact('client'));
    }
    public function clientEditProcess(Request $request){
//        $client = Client::where('id_client', $request->id_client)->first();
//        $client->lastname_client=$request->lastname_client;
//        $client->firstname_client=$request->firstname_client;
//        $client->surname_client=$request->surname_client;
//        $client->sex_client=$request->sex_client;
//        $client->phone_client=$request->phone_client;
//        $client->save();
//        $query="Вы успешно отредактировали данные клиента";
//        return view('accessClientEdit',compact('query'));
        $user=User::where('id',$request->id_client)->first();
        $user->lastname_client=$request->lastname_client;
        $user->firstname_client=$request->firstname_client;
        $user->surname_client=$request->surname_client;
        $user->sex_client=$request->sex_client;
        $user->phone_client=$request->phone_client;
        $user->save();
        $query="Вы успешно отредактировали данные клиента";
        return view('accessClientEdit',compact('query'));
    }
    public function service_ajax(Request $request){
        $serviceAdd=new Service();
        $serviceAdd->name_service=$request->name_service;
        $serviceAdd->description_service=$request->description_service;
        $serviceAdd->cost_service=$request->cost_service;
        $serviceAdd->url='img/'.$request->url;
        $serviceAdd->save();
        $service=new Service();
        return view('servicelist', ['service'=>$service->all()]);
    }
    public function serviceEdit($id){
        $service=Service::get()->where('id_service',$id);
        return view('serviceEdit',compact('service'));
    }
    public function serviceDelete($id){
        $service = Service::where('id_service', $id)->first();
        $service->delete();
        $service=new Service();
        return redirect()->route('services',['service'=>$service->all()]);
    }
    public function serviceEditProcess(Request $request){
        $service = Service::where('id_service', $request->id_service)->first();
        $service->name_service=$request->name_service;
        $service->description_service=$request->description_service;
        $service->cost_service=$request->cost_service;
        $service->url=$request->url1;
        $service->save();
        $query="Вы успешно отредактировали услугу";
        return view('accessServiceEdit',compact('query'));
    }
}
