<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

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


}