<?php
    include '../config/conn.php';
    include 'fungsi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            $berhasil = tambahAuthor($_POST, $_FILES);

            if($berhasil){
                header("location: data-author.php");
                exit;
            }else{
                echo "gagal";
            }

        } else if($_POST['aksi'] == "edit"){
            $berhasil = editAuthor($_POST, $_FILES);

            if($berhasil){
                header("location: data-author.php");
                exit;
            }else{
                echo "gagal";
            }
        } else if($_POST['aksi'] == "add-dosen"){
            $berhasil = tambahDosen($_POST, $_FILES);

            if($berhasil){
                header("location: data-dosen.php");
                exit;
            }else{
                echo "gagal";
            }
        } else if($_POST['aksi'] == "edit-dosen"){
            $berhasil = editDosen($_POST, $_FILES);

            if($berhasil){
                header("location: data-dosen.php");
                exit;
            }else{
                echo "gagal";
            }
        }
    }
    
    if(isset($_GET['hapus'])){
        $berhasil = hapusAuthor($_GET);

        if($berhasil){
            header("location: data-author.php");
            exit;
        }else{
            echo "gagal";
        }
    }

    if(isset($_GET['hapusdosen'])){
        $berhasil = hapusDosen($_GET);

        if($berhasil){
            header("location: data-dosen.php");
            exit;
        }else{
            echo "gagal";
        }
    }
?>