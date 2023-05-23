<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    public function index(){
        return view('admin.index');
    }

    public function myUsers(){
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function showCreateUser(){
        return view('admin.users.create');
    }

    public function createUser(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:40',
            'gender' => 'required|in:Pria,Wanita',
            'alamat' => 'required',
            'kota' => 'required|max:40',
            'provinsi' => 'required|max:40',
            'kode_pos' => 'required|max:20',
            'no_hp' => 'required|max:20',
            'username' => ['required', 'min:3', 'max:30', 'unique:users'],
            'password' => 'required|min:5|max:255|same:konfirmasi_password',
            'konfirmasi_password' => 'required|same:password',
            'email' => 'required|email|unique:users|max:50',
            'image' => 'image|file|max:2048',
            'level' => 'required|in:1,0'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }else{
            $validatedData['image'] = 'assets/img/no_photo.png';
        }
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/admin/users')->with('success', 'User baru berhasil dibuat');
    }

    public function showEditUser(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function editUser(Request $request, User $user){
        if(
            $request->nama == $user->nama &&
            $request->gender == $user->gender &&
            $request->alamat == $user->alamat &&
            $request->kota == $user->kota &&
            $request->provinsi == $user->provinsi &&
            $request->kode_pos == $user->kode_pos &&
            $request->no_hp == $user->no_hp &&
            $request->level == $user->level &&
            $request->username == $user->username &&
            $request->email == $user->email &&
            !$request->file('image')
        ){
            return redirect('/admin/users/' . $user->id . '/edit')->with('failed', 'User gagal diupdate');
        }
        $rules = [
            'nama' => 'required|max:40',
            'gender' => 'required|in:Pria,Wanita',
            'alamat' => 'required',
            'kota' => 'required|max:40',
            'provinsi' => 'required|max:40',
            'kode_pos' => 'required|max:20',
            'no_hp' => 'required|max:20',
            'image' => 'image|file|max:2048',
            'level' => 'required|in:1,0'
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:30|unique:users';
        }if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users|max:50';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage != 'assets/img/no_photo.png'){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/admin/users')->with('success', 'User berhasil diupdate');
    }

    public function deleteUser(User $user){
        if($user->image != 'assets/img/no_photo.png'){
            Storage::delete($user->image);
        }
        $user->delete();
        return redirect('/admin/users')->with('success', "User Berhasil Dihapus!");
    }

    public function products(){
        return view('admin.products.index', [
            'products' => User::all()
        ]);
    }

    public function showAddProduct(){
        return view('admin.products.add');
    }

    public function addProduct(){
        return view('admin.products.add');
    }

    public function pesanan(){
        return view('admin.pesanan.index', [
            'users' => User::all()
        ]);
    }
}