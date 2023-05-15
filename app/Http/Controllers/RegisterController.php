<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:40',
            'gender' => 'required|in:Pria,Wanita',
            'alamat' => 'required',
            'kota' => 'required|max:40',
            'provinsi' => 'required|max:40',
            'kode_pos' => 'required|max:20',
            'no_hp' => 'required|max:20',
            'username' => ['required', 'min:3', 'max:30', 'unique:users'],
            'password' => 'required|min:5|max:255|same:kon_password',
            'kon_password' => 'required|same:password',
            'email' => 'required|email|unique:users|max:50',
            'image' => 'image|file|max:2048'
        ]);

        $validatedData['level'] = '2';

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }else{
            $validatedData['image'] = 'no_photo.png';
        }
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan Login');
    }
}