<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Produk</title>
    <link rel="stylesheet" href="{{ asset ('css/admin.css')}}">
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
  <h1>Add Data</h1>

  <form action="" method="POST">
    <label for="title">Name*</label>
    <input type="text" name="title" 
      placeholder="Product name" 
      required 
      title="required"
      value=""/>

      <label for="title">Price*</label>
      <input type="text" name="title" 
        placeholder="Product Price (Rp.)" 
        required 
        title="required"
        value=""/>
    
    <label for="content">Product Description</label>
    <textarea name="content" cols="30" rows="10"></textarea>

    <div>
      <button type="submit" name="draft" class="button" value="true">Save to Draft</button>
      <button type="submit" name="draft" class="button button-primary" value="false">Publish Product</button>
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