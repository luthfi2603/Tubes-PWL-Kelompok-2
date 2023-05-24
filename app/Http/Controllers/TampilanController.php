<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TampilanController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function myProduct():View {
        return view('index', [
            'products' => Product::paginate(12)->withQueryString()
        ]);
    }

    public function detailProduct(Product $product){
        return view('detail', compact('product'));
    }

    public function keranjang(Request $request){
        if(!auth()->user()){
            return redirect('/login')->with('loginError', 'Silahkan login terlebih dahulu');
        }
        if(auth()->user()->level == 1){
            return redirect('/admin');
        }
        if($request->jumlah == ""){
            return redirect('/detail/'.$request->id_produk.'')->with('status', 'Silahkan isi jumlah yang ingin dibeli');
        }
        $cek = Keranjang::where('id_produk', $request->id_produk)->get()->count();
        if($cek == 1){
            return back()->with('status', 'Produk sudah ada di keranjang');
        }

        $validatedData = $request->validate([
            'id_produk' => 'required',
            'image' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'jumlah' => 'required',
        ]);

        Keranjang::create($validatedData);
        return back()->with('success', 'Produk berhasil dimasukkan ke keranjang');
    }

    public function showKeranjang(){
        $isiKeranjang = Keranjang::all();
        // dd($isiKeranjang->all());
        if($isiKeranjang->count() == 0){
            return redirect('/')->with('danger','Keranjang kosong, silahkan belanja dulu');
        }
        return view('keranjang', compact('isiKeranjang'));
    }

    public function deleteProduct($id){
        $keranjang = Keranjang::where('id_produk', $id);
        $keranjang->delete();
        $isiKeranjang = Keranjang::all();
        // dd($isiKeranjang->all());
        if($isiKeranjang->count() == 0){
            return redirect('/')->with('success','Isi keranjang sudah kosong');
        }
        return redirect('/keranjang')->with('success','Produk berhasil dihapus dari keranjang');
    }

    public function deleteAllProduct(){
        Keranjang::truncate();
        return redirect('/')->with('success','Isi keranjang sudah kosong');
    }

    public function Konfirbayar(){
        return view('konbayar');
    }

}