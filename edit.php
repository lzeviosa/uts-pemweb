<?php
    require './config/db.php';

    $id = $_GET['id'];

    $products = mysqli_query($db_connect, "SELECT * FROM `products` WHERE id = '$id'");
    $data = mysqli_fetch_array($products);
?>

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

        <h1 class="text-center">Form Edit Produk</h1>

        <form action="./backend/proses_edit.php" method="post" enctype="multipart/form-data" class="mt-5">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?php echo $data['name']; ?>">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" value="<?php echo $data['price']; ?>">
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="formFile" name="gambar" accept="image/*" value="<?php echo $data['image']; ?>">
            </div>

            <div class="col-auto mt-5">
                <button type="submit" class="btn btn-primary mb-3 w-100">Simpan</button>
            </div>

        </form>

    </div>
    
</body>
</html>