<?php 
     include "connect.php";
     $menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "" ;     
     $foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "" ;     

     if(!empty($_POST['input_user_validate'])){
        $query = mysqli_query($conn, "DELETE FROM daftar_menu WHERE menu='$menu'  ");
        if ($query){
            unlink("../assets/img/$foto");
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../menu" </script> ';
        }else{
            $message = '<script>alert("Data gagal dihapus");
            window.location="../menu" </script> ';
        }
     }echo $message;
?>