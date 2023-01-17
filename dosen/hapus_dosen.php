<?php 
include "../config.php";
include "../database/koneksi.php";

$id_dosen = isset($_GET['id_dosen']) ? $_GET['id_dosen'] : "";

if ($id_dosen == "") {
    echo "Tidak ada ID";
} else {
    $query_hapus = "DELETE FROM dosen WHERE id_dosen=".$id_dosen."";
    
    $hapus = $koneksi->query($query_hapus);

    if ($hapus) {
        header("Location: tampil_dosen.php");
    } else {
        echo "Gagal menghapus data";
    }
}
?>