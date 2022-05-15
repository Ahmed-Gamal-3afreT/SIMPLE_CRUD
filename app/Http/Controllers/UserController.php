<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('welcome', compact('users'));
    }

    public function create(Request $request){
        $name = $request->input('userName');
        User::create([
            'name' => $name
        ]);
        return back();
        //return view('welcome');
    }

    public function edit(Request $request){
        $id = $request->input('userId');
        $name = $request->input('userName');
        User::where('id', $id)->update(['name' => $name]);
        return back();

    }

    public function delete($id){
        User::where('id', $id)->delete();
        return back();
    }
}
