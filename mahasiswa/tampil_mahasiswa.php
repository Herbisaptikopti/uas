<?php
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

// Menggunakan fungsi join 
$sql = "SELECT prodi.nama_prodi, mahasiswa.nim, mahasiswa.nama_lengkap, mahasiswa.jenis_kelamin, mahasiswa.asal_kelas, mahasiswa.semester FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi";
$hasil = $koneksi->query($sql);
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Mahasiswa</h1>
            <div class="card">
                <div class="card-body">
                <a href="<?php echo $base_url ;?>/mahasiswa/tambah_mahasiswa.php" class="btn btn-success mb-3">Tambah Mahasiswa</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Prodi</th>
                                <th>Kelas</th>
                                <th>semester</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no_urut = 1; 
                            if ($hasil->num_rows > 0) {
                                while ($row = $hasil->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $no_urut++; ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                    <td><?php echo $row['nama_prodi']?></td>
                                    <td><?php echo $row['asal_kelas']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td>
                                        <a href="<?php echo $base_url ;?>/mahasiswa/edit_mahasiswa.php" class="btn btn-success" >Edit</a>

                                        <a href="<?php echo $base_url ;?>/mahasiswa/hapus_mahasiswa.php?id_mahasiswa=<?php echo $row['id_mahasiswa'] ?>" class="btn btn-danger" >Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                            ?>
                            <tr>
                                <td colspan="4">Belum Ada Data Mahasiswa</td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>