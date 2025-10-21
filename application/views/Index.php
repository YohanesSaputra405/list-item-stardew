<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item StardewValley</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
            margin: 0 5px;
        }
        .btn-tambah {
            display: inline-block;
            padding: 6px 12px;
            background: green;
            color: white;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center">Daftar Item</h2>
    <div style="width:80%; margin:auto">
        <a href="<?php echo site_url('ItemController/Tambah');?>" class="btn-tambah">+ Tambah</a>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Item</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($item)) : ?>
                    <?php foreach ($item as $item) : ?>
                        <tr>
                            <td><?= $item->Kode; ?></td>
                            <td><?= $item->NamaItem; ?></td>
                            <td><?= !empty($item->NamaKategori) ? $item->NamaKategori : '-'; ?></td>
                            <td>
                                <?php if (!empty($item->GambarItem)) : ?>
                                    <img src="<?= base_url('uploads/' . $item->GambarItem); ?>" alt="Gambar" width="80">
                                <?php else : ?>
                                    Tidak ada
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?> 
                    <tr>
                        <td colspan="4">Data belum ada!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
