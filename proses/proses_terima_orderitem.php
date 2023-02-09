<?php
include "connect.php";
session_start();
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";


if (!empty($_POST['terima_order_validate'])) {
    $query = mysqli_query($conn, "UPDATE  list_order SET catatan='$catatan', status=1 WHERE id_list_order='$id' ");
    if ($query) {
        $message = '<script>alert("Berhasil terima order oleh dapur");
            window.location="../dapur" </script>';
    } else {
        $message = '<script>alert("Gagal terima order oleh dapur");
        window.location="../dapur" </script>';
    }

}
echo $message;
?>