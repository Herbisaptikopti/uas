<?php 
include "../config.php";
include "../database/koneksi.php";

$id_matakuliah = isset($_GET['id_matakuliah']) ? $_GET['id_matakuliah'] : "";

if ($id_matakuliah == "") {
    echo "Tidak ada ID";
} else {
    $query_hapus = "DELETE FROM matakuliah WHERE id_matakuliah=".$id_matakuliah."";
    
    $hapus = $koneksi->query($query_hapus);

    if ($hapus) {
        header("Location: tampil_matakuliah.php");
    } else {
        echo "Gagal menghapus data";
    }
}
?>