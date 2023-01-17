<?php
//memanggil folder
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

// ambil data prodi
$query_dosen = "SELECT * FROM dosen";
$dosen = $koneksi->query($query_dosen);

$id_dosen = isset($_GET['id_dosen']) ? $_GET['id_dosen'] : "";

if ($id_dosen == '') {
    echo "Tidak ada id";
} else {
    $sql = "SELECT * FROM dosen WHERE id_dosen=".$id_dosen."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $nidn = $data->nidn;
        $nama_lengkap = $data->nama_lengkap;
        $jenis_kelamin = $data->gelar_depan;
        $gelar_depan = $data->gelar_depan;
        $gelar_belakang = $data->gelar_belakang;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $nidn = $_POST['nidn'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $gelar_depan = $_POST['gelar_depan'];
        $gelar_belakang = $_POST['gelar_belakang'];

        $query_update = "UPDATE dosen SET nidn='".$nidn."', nama_lengkap='".$nama_lengkap."', jenis_kelamin='".$jenis_kelamin."', gelar_depan='".$gelar_depan."', gelar_belakang='".$gelar_belakang."' WHERE id_dosen='".$id_dosen."'";

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
            <h1 class="">Dosen</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo isset($nama_lengkap) ? $nama_lengkap: ""; ?>"
                                        placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo isset($nidn) ? $nidn: ""; ?>"
                                        placeholder="Masukkan NIDN Anda" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="gelar_depan">gelar depan</label>
                                    <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="<?php echo isset($gelar_depan) ? $gelar_depan: ""; ?>"
                                        placeholder="Masukkan gelar depan Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="gelar_belakang">gelar belakang</label>
                                    <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="<?php echo isset($gelar_belakang) ? $gelar_belakang: ""; ?>"
                                        placeholder="Masukkan gelar belakang Anda" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label> 
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo isset($jenis_kelamin) ? $jenis_kelamin: ""; ?>">
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