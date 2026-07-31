<?php
    include 'includes/header.php'; 
    include 'includes/navbar.php';

    include '../config/conn.php';

    $query = "SELECT *FROM user WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    //index result harus sama dengan atribut di database
    $id = $result['id'];
    $username = $result['username'];
    $password = $result['password'];
    $email = $result['email'];
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
    
        <div class="card-header py-3">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="inputNama">Nama Lengkap</label>
                        <input required type="text" name="username" class="form-control" id="inputNama" placeholder="Contoh: Muhamad Rivai" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNIM">NIM</label>
                        <input required type="number" name="nim" class="form-control" id="inputNIM" placeholder="Contoh: 2101020112" value="<?php echo $nim; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputJurusan">Jurusan</label>
                        <input required type="text" name="jurusan" class="form-control" id="inputJurusan" placeholder="Contoh: Teknik Informatika" value="<?php echo $jurusan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputTahun">Tahun Lulus</label>
                        <input required type="number" name="tahun_lulus" class="form-control" id="inputTahun" placeholder="Contoh: 2024" value="<?php echo $tahun_lulus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputAlamat">Alamat</label>
                        <input required type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Contoh: Perumahan Bukit Indah Lestari, Tanjung Pinang" value="<?php echo $alamat; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputFoto">Foto</label>
                    </div>
                    <div class="custom-file">
                        <input type="file" <?php if(!isset($_GET['edit'])){echo "required";} ?> name="foto" class="custom-file-input" id="foto"  accept="image/*">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="card-header py-3"> 
                        <button type="submit" class="btn btn-primary" name="aksi" value="edit">
                            Simpan
                        </button>
                        <a type="button" class="btn btn-danger" href="data-author.php">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>