<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a.btn { padding: 5px 10px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 3px; }
        a.btn-danger { background-color: #e74c3c; }
        a.btn-edit { background-color: #3498db; }
    </style>
</head>
<body>

    <h1>Daftar Kategori</h1>

    <a href="<?= site_url('KategoriController/TambahKategori') ?>" class="btn">+ Tambah Kategori</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($kategori)) : ?>
                <?php $no = 1; foreach ($kategori as $k) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k->NamaKategori ?></td>
                        <td>
                            <a href="<?= site_url('KategoriController/edit/'.$k->idKategori) ?>" class="btn btn-edit">Edit</a>
                            <a href="<?= site_url('KategoriController/delete/'.$k->idKategori) ?>" class="btn btn-danger" onclick="return confirm('Yakin mau hapus kategori ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" style="text-align:center;">Belum ada data kategori.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
