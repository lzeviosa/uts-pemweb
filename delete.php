<?php

require_once('./config/db.php');

if (isset($_GET['id'])) {

    // Dapatkan data produk
    $product = mysqli_query(
        $db_connect,
        "SELECT * FROM products 
        WHERE id = '{$_GET['id']}'"
    );
    $data = mysqli_fetch_array($product);

    // Hapus gambar dari diGETori
    if (unlink("./{$data['image']}") || !file_exists("./{$data['image']}")) {

        // Hapus data dari MySQL
        $query = mysqli_query(
            $db_connect,
            "DELETE FROM products
            WHERE id = '{$_GET['id']}'"
        );

        if ($query) {

            echo <<<EOT
                <script>
                    alert('Data berhasil dihapus');
                    document.location.href = "./show.php";
                </script>
                EOT;
        } else {

            echo <<<EOT
                <script>
                    alert('Data tidak berhasil dihapus');
                    history.go(-1);
                </script>
                EOT;
        }
    } else {

        echo <<<EOT
            <script>
                alert('Error saat menghapus gambar');
                document.location.href = "./show.php";
            </script>
            EOT;
    }
}
