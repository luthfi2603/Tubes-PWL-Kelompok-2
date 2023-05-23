<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Produk</title>
    <link rel="stylesheet" href="{{ asset ('assets/css/admin.css')}}">
</head>
<body>
  <main class="main">
    <aside class="side-nav">
        <div class="brand">
            <h2>GoMarket</h2>
        </div>
        <nav>
            <a href="/tambahDataproduk">Add Data Product</a>
            <a href="/ubahDataproduk">Change Data Product</a>
            <a href="/setting">Setting</a>
            <a href="/logout">Logout</a>
        </nav>
    </aside>
    <div class="content">
  <h1>Update Data</h1>

  <form action="{{route('posts.update', ['id'=> $post->id])}}" method="POST" enctype="multipat/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{$post->id}}" name="id">
    <label for="title">Name*</label>
    <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" 
      placeholder="Product name" 
      required 
      name="product_name"
      value="{{$post->product_name}}"/>
      @error('product_name')
      <div class="text-danger">{{$message}}</div>
      @enderror

      <label for="merk">Merk*</label>
      <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" 
        required 
        name="merk"
        value="{{$post->merk}}"/>
        @error('merk')
        <div class="text-danger">{{$message}}</div>
        @enderror

      <label for="price">Price*</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" 
        placeholder="Product Price (Rp.)" 
        required 
        name="price"
        value="{{$post->price}}"/>
        @error('price')
        <div class="text-danger">{{$message}}</div>
        @enderror
    
    <label for="product_detail">Product Description</label>
    <textarea name="product_detail" cols="30" rows="10" class="form-control @error('product_detail') is-invalid @enderror" id="product_detail" required name="content">{{$post->product_detail}}</textarea>

    <label for="image_product" class="form-label">Image</label>
        <input type="file" class="form-control @error('image_product') is-invalid @enderror" id="image_product">
        @error('image_product')
        <div class="text-danger">{{$message}}</div>
        @enderror 

    <div>
    
      <button type="submit" name="draft" class="button button-primary">Publish Product</button>
    </div>
  </form> 
<br><br>
    <footer>
        <div class="text-start mt-5 pt-5" style="background-color:mediumaquamarine;">
          <div class="container  row">
            <div class="col-md-4 d-flex align-items-center ">
              <img src="../images/logo.png" alt="GoMarket Logo" style="width: fit-content; height: 190px;">
            </div>
            <div class="col-md-4 align-self-center">
              <h4>Tentang GoMarket</h4>
              <p>GoMarket adalah platform marketplace yang menyediakan berbagai<br>
                produk kebutuhan rumah tangga seperti
                makanan, minuman, dan alat dapur.</p>
            </div>
            <div class="col-md-4 align-self-center">
              <h4>Kontak</h4>
              <p>Jl. Jend. Sudirman No. 123<br>
                Jakarta 12345<br>
                Email: info@gomarket.com<br>
                Telepon: 021-1234567</p>
            </div>
          </div>
          <hr>
          <p class="text-center">© 2023 GoMarket. All rights reserved.</p>
        </div>
      </footer>
    </body>
    
    </html>