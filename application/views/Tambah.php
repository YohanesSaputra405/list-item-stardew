<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah</title>
    <style>
        form {width: 50%; margin: 20px auto;}
        label{display: block; margin-top: 10px}
        input[type="text"],input[type="file"] {width: 100%; padding: 8px;}
        button{margin-top: 15px; padding: 8px 16px; background: green; color: white; border: none; cursor: pointer;}
        a{display: inline-block; margin-top: 10px; text-decoration: none; color: blue;}
    </style>
</head>
<body>
    <h2 style="text-align: center;"> + Tambah</h2>
    <form action="<?php echo site_url('ItemController/store');?>" method="post" enctype="multipart/form-data">

    <label for="Kode">Kode Item</label>
    <input type="text" name="KodeItem" id="kode" required>

    <label for="NamaItem">Nama Item</label>
    <input type="text" name="NamaItem" id="NamaItem" required>

    <label for="GambarItem">Gambar Item</label>
    <input type="file" name="GambarItem" id="GambarItem" >

    <button type="submit">Tambah</button>

    <a href="<?php echo site_url('ItemController/index');?>">Kembali</a>

    </form>
</body>
</html>