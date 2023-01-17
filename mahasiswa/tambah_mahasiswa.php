<?php
//memanggil folder
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

// ambil data prodi
$query_prodi = "SELECT * FROM prodi";
$prodi = $koneksi->query($query_prodi);

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_prodi = $_POST['id_prodi'];
    $asal_kelas = $_POST['asal_kelas'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO mahasiswa (nim, nama_lengkap, jenis_kelamin, id_prodi, asal_kelas, semester) VALUES ('".$nim."', '".$nama_lengkap."', '".$jenis_kelamin."', '".$id_prodi."', '".$asal_kelas."', '".$semester."')";

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
            <h1 class="">Mahasiswa</h1>
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
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        placeholder="Masukkan NIM Anda" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="prodi">Program Studi</label> , 
                                        <select class="form-control" id="id_prodi" name="id_prodi" required>
                                            <?php 
                                            if ($prodi->num_rows > 0) {
                                                while($row_prodi = $prodi->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $row_prodi['id_prodi']?>"><?php echo $row_prodi['nama_prodi']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="asal_kelas">Asal Kelas</label>
                                    <select  class="form-control" id="asal_kelas" name="asal_kelas">
                                        <option value="C1">C1</option>
                                        <option value="C2">C2</option>
                                        <option value="B">B</option>
                                    </select>
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
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select  class="form-control" name="semester" id="semester">
                                            <?php for($i=1; $i<10; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="<?php echo $base_url ;?>/mahasiswa/tampil_mahasiswa.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>