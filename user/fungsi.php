<?php
    include '../config/conn.php';

    function tambahDokumen($data, $files){
        global $conn;
    
        $id_user = $_SESSION['id_user'];
        $nama_dokumen = $files['nama_dokumen']['name'];
        $tipe_dokumen = $files['nama_dokumen']['type'];
        $file_temp = $files['nama_dokumen']['tmp_name'];
        $folder_location = "../doc/".$id_user."/";
        $location = $folder_location.$nama_dokumen;
        $waktu_upload = date('Y-m-d H:i:s');
    
        if(!file_exists($folder_location)){
            mkdir($folder_location);
        }
    
        // Periksa apakah file sudah ada sebelumnya
        if(file_exists($location)){
            $location = $folder_location.$nama_dokumen;
        }
    
        if(move_uploaded_file($file_temp, $location)){
            $query = "INSERT INTO `dokumen` (`nama_dokumen`, `tipe_dokumen`, `waktu_upload`, `id_user`) VALUES ('$nama_dokumen', '$tipe_dokumen', '$waktu_upload', '$id_user')";
            $sql = mysqli_query($conn, $query);
    
            return true;
        } else {
            return false; // Gagal mengunggah file
        }
    }
    
    function editAuthor($data, $files){
        
        global $conn;
     
        $nama_mhs = $data['nama_mhs'];
        $nim = $data['nim'];
        $alamat = $data['alamat'];
        $jurusan = $data['jurusan'];
        $tahun_lulus = $data['tahun_lulus'];

        $queryShow = "SELECT *FROM author WHERE nim = '$nim';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if($files['foto']['name'] == ""){
            $foto = $result['foto'];
        }else{
            $split = explode('.', $files['foto']['name']);
            $ekstensi = $split[count($split)-1];

            $foto = $result['nim'].'.'.$ekstensi;
            unlink("img/". $result['foto']);
            move_uploaded_file($files['foto']['tmp_name'], "img/".$foto);
        }

        $query = "UPDATE author SET nama_mhs = '$nama_mhs', nim = '$nim', alamat = '$alamat', foto = '$foto', jurusan ='$jurusan', tahun_lulus ='$tahun_lulus' WHERE nim = '$nim';";

        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapusAuthor($data){
        global $conn;
        $nim = $data['hapus'];

        $queryShow = "SELECT *FROM author WHERE nim = '$nim';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("img/".$result['foto']);

        $query = "DELETE FROM author WHERE nim = '$nim';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
?>