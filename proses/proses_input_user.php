<?php
include "connect.php";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' ");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Username yang dimasukkan telah digunakan");
            window.location="../user" </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO user (nama,username,level,nohp,alamat,password) values ('$name','$username','$level','$nohp','$alamat','$password')");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
            window.location="../user" </script>';
        } else {
            $message = '<script>alert("Data gagal diupdate")</script>';
        }
    }
}
echo $message;
?>