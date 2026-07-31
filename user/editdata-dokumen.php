<?php
    
    include 'includes/header.php'; 
    include 'includes/navbar.php';

    include '../config/conn.php';
    $id_user =  $_SESSION['id_user'];
    
    $id_dokumen = '';
    $nama_dokumen = '';
    $tipe_dokumen = '';
    $waktu_upload = '';

    if(isset($_GET['editDokumen'])){
        $id_dokumen = $_GET['editDokumen'];

        $query = "SELECT *FROM dokumen WHERE id_user = $id_user;";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        //index result harus sama dengan atribut di database
        $id_dokumen = $result['nama_dosen'];
        $nama_dokumen = $result['nama_dokumen'];
        $tipe_dokumen = $result['tipe_dokumen'];
        $waktu_upload = $result['waktu_upload'];
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
    
        <div class="card-header py-3">
            <!-- Page Heading -->
            <?php
                if(isset($_GET['editDokumen'])){
                    /*jika ada interaksi dgn metode GET maka h1 menjadi Edit,
                    jika tidak ada, tombol bertuliskan Tambah*/
            ?>
               <h1 class="h3 mb-2 text-gray-800">Edit Dokumen</h1>
            <?php
                }else{
            ?>
                <h1 class="h3 mb-2 text-gray-800">Tambah Dokumen</h1>
            <?php
                }
            ?>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputNama">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" class="form-control" id="inputNama" placeholder="Contoh: sistem keamanan" value="<?php echo $nama_dokumen; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputNama">Tipe Dokumen</label>
                        <input type="text" name="tipe_dokumen" class="form-control" id="inputTipedokumen" placeholder="Contoh: .pdf" value="<?php echo $tipe_dokumen; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">File Dokumen</label>
                        <input type="file" name="nama_dokumen" <?php if(!isset($_GET['editDokumen'])){echo "required";} ?> class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="card-header py-3"> 
                        <?php
                            if(isset($_GET['editDokumen'])){
                                /*jika ada interaksi dgn metode GET maka tombol menjadi Simpan,
                                jika tidak ada, tombol bertuliskan Tambahkan*/
                        ?>
                            <button type="submit" class="btn btn-primary" name="aksi" value="edit-dokumen">
                                Simpan
                            </button>
                        <?php
                            }else{
                        ?>
                            <button type="submit" class="btn btn-primary" name="aksi" value="add-dokumen">
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