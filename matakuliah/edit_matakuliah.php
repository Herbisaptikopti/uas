<?php
//memanggil folder
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

$id_matakuliah = isset($_GET['id_matakuliah']) ? $_GET['id_matakuliah'] : "";
// $id_matakuliah = $_GET['id_matakuliah'];

if ($id_matakuliah == "") {
    echo "Tidak ada ID Tahun Ajaran";
} else {
    $sql = "SELECT * FROM matakuliah WHERE id_matakuliah=".$id_matakuliah."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $nama_matakuliah = $hasil->nama_matakuliah;
        $semester = $data->semester;
        $sks = $data->sks;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $nama_matakuliah = $_POST['nama_matakuliah'];
        $semester = $_POST['semester'];
        $sks = $_POST['sks'];

        $query_update = "UPDATE matakuliah SET nama_matakuliah='".$nama_matakuliah."', semester='".$semester."', sks='".$sks."' WHERE id_matakuliah='".$id_matakuliah."'";

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
            <h1 class="">Matakuliah</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_matakuliah">Nama Matakuliah</label>
                                    <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" value="<?php echo isset($nama_matakuliah) ? $nama_matakuliah : "" ?>" placeholder="Masukkan Nama Matakuliah" required>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                        <select  class="form-control" name="semester" id="semester" value="<?php echo isset($semester)?$semester:"";?>">
                                                <?php for($i=1; $i<10; $i++) { ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php }?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="sks">SKS</label>
                                    <input type="text" class="form-control" id="sks" name="sks" value="<?php echo isset($sks)?$sks:"";?>"
                                        placeholder="Masukkan SKS" required>
                                </div>
                            </div>                     
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary mb-1">

                        <a href="<?php echo $base_url ;?>/matakuliah/tampil_matakuliah.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>