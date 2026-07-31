<?php
    include '../config/conn.php';

    function tambahAuthor($data, $files){
        global $conn;
    
        $nama_mhs = $data['nama_mhs'];
        $nim = $data['nim'];
        $alamat = $data['alamat'];
        $jurusan = $data['jurusan'];
        $tahun_lulus = $data['tahun_lulus'];

        $split = explode('.', $files['foto']['name']);
        $ekstensi = $split[count($split)-1];
        $foto = $nim.'.'.$ekstensi;
        //mengubah nama foto menjadi id.ekstensi

        $dir = "img/";
        $tempFile = $files['foto']['tmp_name'];

        move_uploaded_file($tempFile, $dir.$foto);
        //(namafile, destinasi.tipefile)

        $query = "INSERT INTO author (nama_mhs, nim, alamat, foto, jurusan, tahun_lulus) VALUES ('$nama_mhs', '$nim', '$alamat', '$foto', '$jurusan', '$tahun_lulus')";

        
        $sql = mysqli_query($GLOBALS['conn'], $query);
        //$GLOBALS mengubah scope variabel local menjadi global
        // if ($sql) {
        //     return true;
        // } else {
        //     echo "Error: " . mysqli_error($conn);
        //     return false;
        // }  
        return true;
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

    function tambahDosen($data, $files){
        global $conn;
    
        $nama_dosen = $data['nama_dosen'];
        $nidn = $data['nidn'];
        $jurusan = $data['jurusan'];

        $query = "INSERT INTO dosen (nidn, nama_dosen, jurusan) VALUES ('$nidn', '$nama_dosen', '$jurusan')";

        
        $sql = mysqli_query($GLOBALS['conn'], $query);
        return true;
    }

    function editDosen($data, $files){
        
        global $conn;
     
        $nidn = $data['nidn'];
        $nama_dosen = $data['nama_dosen'];
        $jurusan = $data['jurusan'];

        $queryShow = "SELECT *FROM dosen WHERE nidn = '$nidn';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE dosen SET nidn = '$nidn', nama_dosen = '$nama_dosen', jurusan ='$jurusan' WHERE nidn = '$nidn';";

        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    
    function hapusDosen($data){
        global $conn;
        $nidn = $data['hapusdosen'];

        $queryShow = "SELECT *FROM dosen WHERE nidn = '$nidn';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "DELETE FROM dosen WHERE nidn = '$nidn';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
?>