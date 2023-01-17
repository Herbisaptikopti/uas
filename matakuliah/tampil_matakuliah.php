<?php
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');


$sql = "SELECT * FROM matakuliah";
$hasil = $koneksi->query($sql);
$koneksi->close();
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Matakuliah</h1>
            <div class="card">
                <div class="card-body">
                <a href="<?php echo $base_url ;?>/matakuliah/tambah_matakuliah.php" class="btn btn-success mb-3">Tambah Matakuliah</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Matakuliah</th>
                                <th>Semester</th>
                                <th>Sks</th>
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
                                    <td><?php echo $row['nama_matakuliah']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td><?php echo $row['sks']; ?></td>
                                    <td>
                                        <a href="<?php echo $base_url ;?>/matakuliah/edit_matakuliah.php?id_matakuliah=<?php echo $row['id_matakuliah'] ?>" class="btn btn-success" >Edit</a>
                                        
                                        <a href="<?php echo $base_url ;?>/matakuliah/hapus_matakuliah.php?id_matakuliah=<?php echo $row['id_matakuliah'] ?>" class="btn btn-danger" >Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                            ?>
                            <tr>
                                <td colspan="4">Belum Ada Data Matakuliah</td>
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