<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT  *,  SUM(harga*jumlah) AS harganya FROM list_order
  LEFT JOIN tb_order ON tb_order.id_order = list_order.kode_order
  LEFT JOIN daftar_menu on daftar_menu.menu = list_order.menu
  LEFT JOIN bayar on bayar.id_bayar = tb_order.id_order
  GROUP BY id_list_order
  HAVING list_order.kode_order = $_GET[order]");
$kode = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT menu,nama_menu FROM daftar_menu");
?>

<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman View Item
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-3">
          <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode ?>">
            <label for="uploadFoto">Kode Order</label>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="meja" value="<?php echo $meja ?>">
            <label for="uploadFoto">Meja </label>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="pelanggan" value="<?php echo $pelanggan ?>">
            <label for="uploadFoto">Pelanggan </label>
          </div>
        </div>
      </div>

    
      <?php
      if (empty($result)) {
        echo "Data menu tidak ada";
      } else {
        foreach ($result as $row) {
      ?>
      <?php
        }

      ?>


      <div class="table-responsive">
        <table class="table table-hover" table>
          <thead>
            <tr class="text-nowrap">
              <th scope="col">Menu</th>
              <th scope="col">Harga</th>
              <th scope="col">Qty</th>
              <th scope="col">Status</th>
              <th scope="col">Catatan</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php

        $total = 0;
        foreach ($result as $row) {
            ?>

            <tr>
              <td><?php echo $row['nama_menu'] ?></td>
              <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
              <td><?php echo $row['jumlah'] ?></td>
              <td><?php if ($row['status']==1) {
                      echo "<span class='badge text-bg-warning'>Masuk ke dapur</span> ";
                }elseif($row['status']==2){
                  echo "<span class='badge text-bg-primary'>Siap disajikan</span> ";
                }
            ?></td>
              <td><?php echo $row['catatan'] ?></td>
              <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>
            </tr>
            <?php
          $total += $row['harganya'];
        } ?>
            <tr>
              <td colspan="5" class="fw-bold">
                Total Harga
              </td>
              <td class="fw-bold">
                <?php echo number_format($total, 0, ',', '.') ?>

              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php
      }
      ?>
      <div>
        <a href="report" class="btn btn-info "> <i class="bi bi-arrow-left"></i></a>
      </div>
    </div>
  </div>
</div>