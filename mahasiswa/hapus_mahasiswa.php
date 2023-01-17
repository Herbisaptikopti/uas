<?php 
include "../config.php";
include "../database/koneksi.php";

$id_mahasiswa = isset($_GET['id_mahasiswa']) ? $_GET['id_mahasiswa'] : "";

if ($id_mahasiswa == "") {
    echo "Tidak ada ID";
} else {
    $query_hapus = "DELETE FROM mahasiswa WHERE id_dosen=".$id_mahasiswa."";
    
    $hapus = $koneksi->query($query_hapus);

    if ($hapus) {
        header("Location: tampil_mahasiswa.php");
    } else {
        echo "Gagal menghapus data";
    }
}
?>