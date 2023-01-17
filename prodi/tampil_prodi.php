<?php
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');


$sql = "SELECT * FROM prodi";
$hasil = $koneksi->query($sql);
$koneksi->close();
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Program Studi</h1>
            <div class="card">
                <div class="card-body">
                <a href="<?php echo $base_url ;?>/prodi/tambah_prodi.php" class="btn btn-success mb-3">Tambah Program Studi</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Program Studi</th>
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
                                    <td><?php echo $row['nama_prodi']; ?></td>
                                    <td>
                                        <a href="<?php echo $base_url ;?>/prodi/edit_prodi.php?id_prodi=<?php echo $row['id_prodi'] ?>" class="btn btn-success" >Edit</a>
                                        
                                        <a href="<?php echo $base_url ;?>/prodi/hapus_prodi.php?id_prodi=<?php echo $row['id_prodi'] ?>" class="btn btn-danger" >Hapus</a>
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