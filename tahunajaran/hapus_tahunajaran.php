<?php 
include "../config.php";
include "../database/koneksi.php";

$id_tahun_ajaran = isset($_GET['id_tahun_ajaran']) ? $_GET['id_tahun_ajaran'] : "";

if ($id_tahun_ajaran == "") {
    echo "Tidak ada ID";
} else {
    $query_hapus = "DELETE FROM tahun_ajaran WHERE id_tahun_ajaran=".$id_tahun_ajaran."";
    
    $hapus = $koneksi->query($query_hapus);

    if ($hapus) {
        header("Location: tampil_tahunajaran.php");
    } else {
        echo "Gagal menghapus data";
    }
}
?>