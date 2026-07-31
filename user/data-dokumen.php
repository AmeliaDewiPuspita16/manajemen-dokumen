<?php
include('includes/header.php'); 
include('includes/navbar.php');
$id_user =  $_SESSION['id_user'];
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Dokumen</h1>
            <p class="mb-4">Berikut merupakan data dokumen yang telah terdaftar pada sistem.</p>
        </div>
        
        <div class="card-header py-3"> 
            <a type="button" class="btn btn-primary" href="editdata-dokumen.php">
                Tambah Dokumen
            </a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Nama Dokumen</th>
                                <th>Tipe Dokumen</th>
                                <th>Waktu Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include '../config/conn.php';
                            $i =1;
                            $query = mysqli_query($conn, "SELECT * FROM `dokumen` where id_user = $id_user");
                                        
                            while($fetch = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $fetch['id_dokumen'];?></td>
                                <td><?php echo $fetch['nama_dokumen']?></td>
                                <td><?php echo $fetch['tipe_dokumen']?></td>
                                <td><?php echo $fetch['waktu_upload']?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-sm mr-2" href="editdata-dokumen.php?editdokumen=<?php echo $fetch['id_dokumen']?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="proses.php?hapusdokumen=<?php echo $fetch['id_dokumen']; ?>" onClick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
                                    </div>
                                </td>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>