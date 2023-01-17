<?php 
include "../config.php";
include "../database/koneksi.php";

$id_prodi = isset($_GET['id_prodi']) ? $_GET['id_prodi'] : "";

if ($id_prodi == "") {
    echo "Tidak ada ID";
} else {
    $query_hapus = "DELETE FROM prodi WHERE id_prodi=".$id_prodi."";
    
    $hapus = $koneksi->query($query_hapus);

    if ($hapus) {
        header("Location: tampil_prodi.php");
    } else {
        echo "Gagal menghapus data";
    }
}
?>