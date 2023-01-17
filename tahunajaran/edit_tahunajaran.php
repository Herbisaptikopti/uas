<?php
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

$id_tahun_ajaran = isset($_GET['id_tahun_ajaran']) ? $_GET['id_tahun_ajaran'] : "";
// $id_matakuliah = $_GET['id_matakuliah'];

if ($id_tahun_ajaran == "") {
    echo "Tidak ada ID Tahun Ajaran";
} else {
    $sql = "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran=".$id_tahun_ajaran."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $keterangan = $data->keterangan;
        $semester = $data->semester;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $keterangan = $_POST['keterangan'];
        $semester = $_POST['semester'];

        $query_update = "UPDATE tahun_ajaran SET keterangan='".$keterangan."', semester='".$semester."' WHERE id_tahun_ajaran='".$id_tahun_ajaran."'";

        $update = $koneksi->query($query_update);

        if ($update) {
            echo "Data berhasil disimpan";
        } else {
            echo "Data gagal disimpan";
        }
    }
}
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Tahun Ajaran</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo isset($keterangan) ? $keterangan : ""; ?>"
                                        placeholder="Masukkan Keterangan" required>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select  class="form-control" id="semester" name="semester" value="<?php echo isset($semester) ? $semester : ""; ?>">
                                        <option value="ganjil">Ganjil</option>
                                        <option value="genap">Genap</option>
                                </select>
                                </div>
                            </div>                     
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary mb-1">

                        <a href="<?php echo $base_url ;?>/tahunajaran/tampil_tahunajaran.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>