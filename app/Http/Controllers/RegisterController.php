<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [

        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'confirmpw' => 'required|same:password',
            'gender' => 'required'
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/login');
    }

    public function view(){
        return view('updateprofile', [

        ]);
    }

    public function update(Request $request){
        $user = User::find(auth()->user()->id);

        $data = [
            'name' => 'required|max:30',
            'password' => 'required|min:8',
            'confirmpw' => 'required|same:password',
            'gender' => 'required'
        ];
        $validation = Validator::make($request->all(), $data);
        $user->password = bcrypt($request->password);

        if($validation->fails()){
            return back()->withInput()->withErrors($validation);
        }

        $user->name = $request->name;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->save();

        return redirect('/');
    }

    public function userData(){
        $user = User::where('id', auth()->user()->id)->first()->get();
        return view('manageuser')->with('user', $user);
    }

    public function delete($id){
        $delete = User::where('id', $id)->delete();
        return redirect('/manageuser');
    }
}
