<?php
include 'includes/header.php';
include 'includes/navbar.php';

include '../config/conn.php';

$nama_mhs = '';
$nim = '';
$alamat = '';
$jurusan = '';
$tahun_lulus = '';

if (isset($_GET['edit'])) {
    $nim = $_GET['edit'];

    $query = "SELECT *FROM author WHERE nim = '$nim';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    //index result harus sama dengan atribut di database
    $nama_mhs = $result['nama_mhs'];
    $nim = $result['nim'];
    $alamat = $result['alamat'];
    $jurusan = $result['jurusan'];
    $tahun_lulus = $result['tahun_lulus'];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Page Heading -->
            <?php
            if (isset($_GET['edit'])) {
                /*jika ada interaksi dgn metode GET maka h1 menjadi Edit,
                    jika tidak ada, tombol bertuliskan Tambah*/
            ?>
                <h1 class="h3 mb-2 text-gray-800">Edit Data Author</h1>
            <?php
            } else {
            ?>
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Author</h1>
            <?php
            }
            ?>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputNama">Nama Lengkap</label>
                        <input required type="text" name="nama_mhs" class="form-control" id="inputNama" placeholder="Contoh: Amelia Dewi Puspita" value="<?php echo $nama_mhs; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNIM">NIM</label>
                        <input required type="number" name="nim" class="form-control" id="inputNIM" placeholder="Contoh: 2101020047" value="<?php echo $nim; ?>">
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
                        <input required type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Contoh: Tanjung Pinang" value="<?php echo $alamat; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" <?php if (!isset($_GET['edit'])) {
                                                echo "required";
                                            } ?> name="foto" class="form-control-file" id="foto" accept="image/*">
                    </div>
                    <div class="card-header py-3">
                        <?php
                        if (isset($_GET['edit'])) {
                            /*jika ada interaksi dgn metode GET maka tombol menjadi Simpan,
                                jika tidak ada, tombol bertuliskan Tambahkan*/
                        ?>
                            <button type="submit" class="btn btn-primary" name="aksi" value="edit">
                                Simpan
                            </button>
                        <?php
                        } else {
                        ?>
                            <button type="submit" class="btn btn-primary" name="aksi" value="add">
                                Tambahkan
                            </button>
                        <?php
                        }
                        ?>
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