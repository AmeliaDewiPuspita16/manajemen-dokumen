<?php
    include 'includes/header.php'; 
    include 'includes/navbar.php';

    include '../config/conn.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data User</h1>
            <p class="mb-4">Berikut merupakan data user yang telah terdaftar pada sistem.</p>
        </div>
        
        <div class="card-header py-3"> 
            <a type="button" class="btn btn-primary" href="editdata-author.php">
                Tambah Data Author
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
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include '../config/conn.php';
                            $i =1;
                            $query = mysqli_query($conn, "SELECT * FROM `user`");
                                        
                            while($fetch = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $fetch['id_user']?></td>
                                <td><?php echo $fetch['username']?></td>
                                <td><?php echo $fetch['password']?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-sm mr-2" href="editdata-author.php?edit=<?php echo $fetch['id_user']; ?>" >Edit</a>
                                        <a class="btn btn-danger btn-sm" href="proses.php?hapus=<?php echo $fetch['id_user']; ?>" onClick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus</a>
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
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>