<?php

    if(isset($_POST['id'], $_POST['nama_produk'], $_POST['harga'], $_FILES['gambar'])) {

        // Koneksi database
        require '../config/db.php';

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['gambar']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], "../" . $target_file)) {

            $id = $_POST['id'];
            $datetime = date("Y-m-d H:i:s");

            $query = mysqli_query($db_connect, "UPDATE `products` SET `name`='$_POST[nama_produk]', `price`='$_POST[harga]', `image`='$target_file', `updated_at`='$datetime' WHERE id = '$id'");

            if($query) {

                echo "Update produk berhasil";
                header("Location: ../show.php");
            } else {

                echo "Update produk gagal";
            }
        } else {

            echo "Upload gambar gagal";
        }
    }
?>