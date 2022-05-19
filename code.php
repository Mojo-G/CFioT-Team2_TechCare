<?php
include_once('security.php');
include_once('database/dbconfig.php');

////////////////////////BAGIAN LOGIN//////////////////////////////////
//fungsi akan aktif jika tombol login dipencet
if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    //untuk nyari "select" dari semua data"* dari tabel "register" dan, cocokin dari tambel kolom "email"
    //terus cocokin dengan form "email" sama juga dengan password
    $query = "SELECT * from user_account WHERE username='$username' AND password='$password' ";
    $query_run = mysqli_query($connection, $query);
    $role = mysqli_fetch_array($query_run);
    //seperti biasa, logika if else    

    //jika admin maka masuk ke index.php
    if ($role['role'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "Admin";
        header('Location: index.php');
    }

    //jika tipe pengguna pengelola maka masuk ke register_edit.php
    else if ($role['role'] == "doctor") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "doctor";
        header('Location: index.php');
    }

    //jika tipe pengguna "pengguna" maka masuk ke register.php
    else if ($role['role'] == "family") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "family";
        header('Location: index.php');
    } 
    else {
        $_SESSION['status'] = "error";
        $_SESSION['status_title'] = "Oops!";
        $_SESSION['status_text'] = "Wrong Username / Password";
        
        header('Location: login.php');
    }
}

////////////////////////////////////////////////////////////////////

?>