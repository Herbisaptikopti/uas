<?php
//memanggil folder
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

$query_prodi = "SELECT * FROM dosen";
$prodi = $koneksi->query($query_prodi);

if (isset($_POST['submit'])) {
    $nidn = $_POST['nidn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $gelar_depan = $_POST['gelar_depan'] ? $_POST['gelar_depan']: "";
    $gelar_belakang = $_POST['gelar_belakang'];


    $sql = "INSERT INTO dosen (nidn, nama_lengkap, jenis_kelamin, gelar_depan, gelar_belakang) VALUES ('".$nidn."', '".$nama_lengkap."', '".$jenis_kelamin."', '".$gelar_depan."', '".$gelar_belakang."')";

    $simpan = $koneksi->query($sql);

    if ($simpan) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data Gagal Disimpan";
    }

    $koneksi->close();
}
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Dosen</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn"
                                        placeholder="Masukkan NIDN Anda" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="gelar_depan">gelar depan</label>
                                    <input type="text" class="form-control" id="gelar_depan" name="gelar_depan"
                                        placeholder="Masukkan gelar depan Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="gelar_belakang">gelar belakang</label>
                                    <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang"
                                        placeholder="Masukkan gelar belakang Anda" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label> 
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="laki-laki"> Laki - Laki </option>
                                        <option value="perempuan"> Perempuan </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        
                        <a href="<?php echo $base_url ;?>/dosen/tampil_dosen.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>