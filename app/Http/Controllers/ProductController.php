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


    public function showEditProduk(Post $post)
    {
        return view('bagian_keisya.showEditProduk', compact('post'));
    }


    public function editProduk(Request $request, Post $post)
    {
        $rules = [
            'id' => 'required|min:1',
            'product_name' => 'required|max:100',
            'price' => 'required',
            'product_detail' => 'required|max:3000',
            'merk' => 'required|max:40',
            'image_product' => 'image|file|max:2048'
        ];
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage != 'assets/img/no_photo.png'){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('assets/img');
        }

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/bagian_keisya/showEditProduk')->with('success', 'Produk berhasil diupdate');
    }


    public function deleteProduk(Post $post)
    {
        if($user->image != 'assets/img/no_photo.png'){
            Storage::delete($post->image);
        }
        $user->delete();
        return redirect('/bagian_keisya/deleteproduk')->with('success', "Produk Berhasil Dihapus!");
    }
}

    