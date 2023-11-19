<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background: rgb(200, 200, 200);">

    <div class="container bg-white position-absolute top-50 start-50 translate-middle shadow p-5 rounded-2" style="max-width: 600px;">

        <h1 class="text-center">Data produk</h1>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama produk</th>
                    <th>harga</th>
                    <th>gambar produk</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require './config/db.php';

                    $products = mysqli_query($db_connect,"SELECT * FROM products");
                    $no = 1;

                    while($row = mysqli_fetch_assoc($products)) {
                ?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['price'];?></td>
                        <!-- <td><img src="<?=$row['image'];?>" width="100"></td> -->
                        <td><a href="<?=$row['image'];?>" target="_blank">unduh</a></td>
                        <td>
                            <a href="edit.php?id=<?=$row['id'];?>">Edit</a>
                            <a href="delete.php?id=<?=$row['id'];?>">Hapus</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    
</body>
</html>