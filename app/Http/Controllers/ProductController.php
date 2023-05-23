<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function myProduct():View
    {
        return view('index', [
            'posts' => Post::all()
        ]);
        /** 
        *$posts = Post::select('product_name', 'price', 'product_detail', 'merk','image_product','id')->get();
        *return view('index', compact('posts'));
     *return view('index');*/
    }

    public function showCreateProduct()
    { 
        return view('bagian_keisya.tambahDataproduk');
    }

    public function createProduct(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|min:1',
            'product_name' => 'required|max:100',
            'price' => 'required',
            'product_detail' => 'required|max:3000',
            'merk' => 'required|max:40',
            'image_product' => 'image|file|max:2048'
           
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }else{
            $validatedData['image'] = 'assets/img/no_photo.png';
        }
        
       
        Post::create($validatedData);
        return redirect('/bagian_keisya/tambahDataproduk')->with('success', 'Product baru berhasil dibuat');
        
    }
    public function showupdateProduct()
    { 
        return view('bagian_keisya.ubahDataproduk');
    }
   
    public function edit_post($id)
    {
        $post= Post::find($id);
        return view('bagian_keisya.ubahDataproduk', compact('post'));
    }


    public function update_post(Request $request, string $id)
    {

        $post=Post::find($id);
         $validated = $request->validate([
    
    
            'product_name' => 'required|max:100',
            'price' => 'required',
            'product_detail' => 'required|max:3000',
            'merk' => 'required|max:40',
            'image_product' => 'image|file|max:2048'
        ]);
       
       
        $post -> product_name = $request->product_name;
        $post -> price = $request->price;
        $post -> product_detail = $request->product_detail;
        $post -> merk = $request->merk;

        if($request->hasFile('image_product')){
            //define img location
            $location = public_path('/img');
    
            //ambil file img dan simpan ke local server
            $request->file('image_product')->move($location, $request->file('image_product')->getClientOriginalName());
    
            //simpan nama file di database
            $post->image= $request ->file('image_product')->getClientOriginalName();
        }
        $post->update($request->all());
       return redirect('tambahDataproduk')->with('update_status', "Postingan berhasil diperbaharui!");
        
    }

    public function store_post(Request $request)
    {
        $validated = $request->validate([
    
            'product_name' => 'required|max:100',
            'price' => 'required',
            'product_detail' => 'required|max:3000',
            'merk' => 'required|max:40',
            'image_product' => 'image|file|max:2048'
        ]);
        $new_post = new Post;
        $new_post -> id = $request->id;
        $new_post -> product_name = $request->product_name;
        $new_post -> price = $request->price;
        $new_post -> product_detail = $request->product_detail;
        $new_post -> merk = $request->merk;


        if($request->hasFile('image_product')){
            //define img location
            $location = public_path('/img');

            //ambil file img dan simpan ke local server
            $request->file('image_product')->move($location, $request->file('image_product')->getClientOriginalName());

            //simpan nama file di database
            $new_post->image= $request ->file('image_product')->getClientOriginalName();
        }
        $new_post->save();
       return redirect('/tambahDataproduk')->with('status', "Postingan berhasil ditambahkan!");
    }


    public function delete_post( $id)
    {
        $post=Post::find($id);
        $post->delete();

        return redirect('/bagian_keisya/ubahDataproduk')->with('status', "Postingan berhasil dihapus"); 
    }
}

    