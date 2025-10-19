<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { max-width: 400px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"] { width: 100%; padding: 8px; margin-bottom: 15px; }
        button { padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer; }
        a { text-decoration: none; color: #3498db; }
    </style>
</head>
<body>

    <h1>Tambah Kategori</h1>

    <form action="<?= site_url('KategoriController/Store') ?>" method="post">
        <label for="namakategori">Nama Kategori</label>
        <input type="text" name="namakategori" id="namakategori" placeholder="Masukkan nama kategori" required>

        <button type="submit">Simpan</button>
    </form>

    <p><a href="<?= site_url('KategoriController/index') ?>">← Kembali ke Daftar Kategori</a></p>

</body>
</html>
