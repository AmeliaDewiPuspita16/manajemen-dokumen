<?php
    session_start();
    include '../config/conn.php';


    if(isset($_POST['login'])){
        if ($stmt = $conn->prepare('SELECT username, password FROM user WHERE username = ?')) {
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($username, $password);
                $stmt->fetch();
               
                if (password_verify($_POST['password'], $password)){
                    $query = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '" . $_POST['username'] . "';");
                    $fetch = mysqli_fetch_array($query);
                    $id_current = $fetch['id_user'];

                    $role = $fetch['role'];
                    if($role == 'Admin'){
                        // jika login sebagai admin
                        session_start();
                        $_SESSION['login'] = TRUE;
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['id_user'] = $id_current;
                        header('Location: ../admin/index.php');
                    }else{
                        //jika login sebagai user
                        session_start();
                        $_SESSION['login'] = TRUE;
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['id_user'] = $id_current;
                        header('Location: ../user/index.php');
                    }
                    
                } else {
                    header('Location: ../index.php?error=2');
                    exit;
                }
            } else {
                header('Location: ../index.php?error=3');
                exit;
            }
            
            $stmt->close();
        }
    }
?>

