<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function add(Request $request){
        $request['api_token'] = Str::random(60);
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);

    }

    public function update(Request $request, $id){

        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);

    }

    public function view($id){
        $user = User::find($id);
        return response()->json($user);

    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json("Removed Successfully");

    }


    public function index(){
        $user = User::all();
        return response()->json($user);

    }


}
