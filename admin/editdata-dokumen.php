<?php
    include 'includes/header.php'; 
    include 'includes/navbar.php';

    include '../config/conn.php';
    
    $nama_dosen = '';
    $nidn = '';
    $jurusan = '';

    if(isset($_GET['editdosen'])){
        $nidn = $_GET['editdosen'];

        $query = "SELECT *FROM dosen WHERE nidn = '$nidn';";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        //index result harus sama dengan atribut di database
        $nama_dosen = $result['nama_dosen'];
        $nidn = $result['nidn'];
        $jurusan = $result['jurusan'];
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
    
        <div class="card-header py-3">
            <!-- Page Heading -->
            <?php
                if(isset($_GET['editdosen'])){
                    /*jika ada interaksi dgn metode GET maka h1 menjadi Edit,
                    jika tidak ada, tombol bertuliskan Tambah*/
            ?>
               <h1 class="h3 mb-2 text-gray-800">Edit Data Skripsi</h1>
            <?php
                }else{
            ?>
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Skripsi</h1>
            <?php
                }
            ?>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputNama">Judul Skripsi</label>
                        <input required type="text" name="nama_mhs" class="form-control" id="inputNama" placeholder="Contoh: Implementasi Algoritma Djikstra dalam Mencari Rute Terpendek ke RSUD Tanjung Pinang" value="<?php echo $nama_dosen; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">File Skripsi</label>
                        <input type="file" name="skripsi" <?php if(!isset($_GET['edit'])){echo "required";} ?> class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="card-header py-3"> 
                        <?php
                            if(isset($_GET['editDosen'])){
                                /*jika ada interaksi dgn metode GET maka tombol menjadi Simpan,
                                jika tidak ada, tombol bertuliskan Tambahkan*/
                        ?>
                            <button type="submit" class="btn btn-primary" name="aksi" value="edit-dosen">
                                Simpan
                            </button>
                        <?php
                            }else{
                        ?>
                            <button type="submit" class="btn btn-primary" name="aksi" value="add-dosen">
                                Tambahkan
                            </button>
                        <?php
                            }
                        ?>
                        <a type="button" class="btn btn-danger" href="data-dokumen.php">
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