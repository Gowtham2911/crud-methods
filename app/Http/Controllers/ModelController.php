<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use Illuminate\Support\Facades\Http;

class ModelController extends Controller
{

    public function index(){
        $users = User::all();
        return view('index',compact('users'));
    }
    //create user
    public function create(){
        return view('create');
    }
    //store user
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
  
        User::create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('user.index')->with('success','User has been created');
}
    //edit user
       public function edit($id){
       $user = User::find($id);
       return view('edit',compact('user'));
}
   //update user
    public function update(Request $request,$id){
    $request->validate([
        'name'=> 'required',
        'email' => 'required|email'
    ]);
    $user = User::find($id);
    $user->update([
     'name' => $request->name,
     'email' => $request->email 
    ]);
    return redirect()->route('user.index')->with('success','User has been updated');
}
    //delete user
    public function destroy($id){
    $user = User::find($id);
    $user->delete();
    return redirect()->route('user.index')->with('success','User has been deleted');
}

   public function distance(){
       return view('map');
   }

   public function calculateDistance(Request $request){

    //Distance Matrix api using Http 

   // $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$request->lat.'%2C'.$request->lng.'&destinations='.$request->lat1.'%2C'.$request->lng1.'&key=AIzaSyCGX6aGjOeMptlBNc0WF3vhm0SPMl1vNBE');
    
    //$datas = $response->json();
    
   // $kilometer = $datas['rows'][0]['elements'][0]['distance']['text'];
   // return response()->json([
    //    'message' => $kilometer
   // ]);

   //Distance <atrix api using curl
//    $response = curl_init();
//    curl_setopt($response,[
//        CRULOPT_URL => 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$request->lat.','.$request->lng.'&destinations='.$request->lat1.','.$request->lng1.'&key=AIzaSyCGX6aGjOeMptlBNc0WF3vhm0SPMl1vNBE',
//        CRULOPT_RETURNTRANSFER => true ,
//    ]);
//    $curl = curl_exec($response);
//    echo $curl;

$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$request->lat.','.$request->lng.'&destinations='.$request->lat1.','.$request->lng1.'&key=AIzaSyCGX6aGjOeMptlBNc0WF3vhm0SPMl1vNBE';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($curl);
curl_close($curl);
  $response = (array) json_decode($resp);
  
  $kilometer = (array) $response['rows'][0];
  $km = (array) $kilometer['elements'][0];
  $kms = (array) $km['distance'];
  return response()->json([
    'message' => $kms['text']
  ]);

}

}