<?php 
include "proses/connect.php";
      $get_menu = mysqli_query($conn, "SELECT * FROM daftar_menu");
      $cont_menu = mysqli_num_rows($get_menu);

      $get_order =  "SELECT SUM(jumlah) AS jumlah FROM list_order ";
      $sum_order = mysqli_query($conn, $get_order);
      while($row = mysqli_fetch_assoc($sum_order)){
        $output = $row['jumlah'];
      }

      $get_cust = mysqli_query($conn, "SELECT id_order FROM tb_order");
      $count_cust = mysqli_num_rows($get_cust);

      $get_kasir = mysqli_query($conn, "SELECT * FROM USER WHERE level='2' ");
      $count_kasir = mysqli_num_rows($get_kasir);

      $get_pelayan = mysqli_query($conn, "SELECT * FROM USER WHERE level='3' ");
      $count_pelayan = mysqli_num_rows($get_pelayan);

      $get_dapur = mysqli_query($conn, "SELECT * FROM USER WHERE level='4' ");
      $count_dapur = mysqli_num_rows($get_dapur);
?>

 
<div class="col-lg-9 mt-2">
          <div class="card">
        <div class="card-header"> 
          Halaman Dashboard
    </div>
        <div class="card-body">
          <div class="row">
  <div class="col-sm-9 col-xl-4 mt-2">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa-solid fa-clipboard-list fa-3x"></i>
      <div class="ms-3">
        <p class="mb-2 text-white">Jumlah Menu</p>
        <h6 class="mb-0 text-white"><?=$cont_menu;?> Menu</h6>
      </div>
    </div>
  </div>
 

 
  <div class="col-sm-9 col-xl-4 mt-2">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa-solid fa-money-check-dollar fa-3x"></i>
      <div class="ms-3">
        <p class="mb-2 text-white">Menu Terjual</p>
        <h6 class="mb-0 text-white"><?=$output;?> Pcs</h6>
      </div>
    </div>
  </div>

  
  <div class="col-sm-9 col-xl-4 mt-2">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa-solid fa-users fa-2x"></i>
      <div class="ms-3">
        <p class="mb-2 text-white">Jumlah Pelanggan</p>
        <h6 class="mb-0 text-white"><?=$count_cust;?> Orang</h6>
      </div>
    </div>
  </div>
 


  <div class="col-sm-9 col-xl-4 mt-2">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa-solid fa-cash-register fa-3x"></i>
      <div class="ms-3">
        <p class="mb-2 text-white">Kasir</p>
        <h6 class="mb-0 text-white"><?=$count_kasir;?> Orang</h6>
      </div>
    </div>
  </div>

  <div class="col-sm-9 col-xl-4 mt-2 ">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa-solid fa-user-tie fa-3x"></i>
      <div class="ms-3">
        <p class="mb-2 text-white">Pelayan</p>
        <h6 class="mb-0 text-white"><?=$count_pelayan;?> Orang</h6>
      </div>
    </div>
  </div>

  <div class="col-sm-9 col-xl-4 mt-2 ">
    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa-solid fa-fire-burner fa-3x"></i>
      <div class="ms-3">
        <p class="mb-2 text-white ">Dapur</p>
        <h6 class="mb-0 text-white"><?=$count_dapur;?> Orang</h6>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div> 
 