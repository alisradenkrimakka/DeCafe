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
  // $kode = $record['id_order'];
  // $meja = $record['meja'];
  // $pelanggan = $record['pelanggan'];
}

$select_menu = mysqli_query($conn, "SELECT menu,nama_menu FROM daftar_menu");
?>

<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Order Item
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

      <!-- Modal Tambah Item Baru-->
      <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php" method="POST">
                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <select class="form-select" name="menu" id="">
                        <option selected hidden value="">Pilih Menu</option>
                        <?php
                        foreach ($select_menu as $value) {
                          echo "<option value=$value[menu]>$value[nama_menu]</option>";
                        }
                        ?>
                      </select>
                      <label for="menu">Menu Makanan/Minuman</label>
                      <div class="invalid-feedback">
                        Pilih Menu.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi"
                        name="jumlah" required>
                      <label for="floatingInput">Jumlah Porsi</label>
                      <div class="invalid-feedback">
                        Masukkan Jumah Porsi.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan">
                      <label for="floatingPassword">Catatan</label>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_orderitem_validate" value="12345678">Save
                    changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- End Modal Tambah Item Baru -->
      <?php
      if (empty($result)) {
        echo "Data menu tidak ada";
      } else {
        foreach ($result as $row) {
      ?>



      <!-- Modal Edit -->
      <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <select class="form-select" name="menu" id="">
                        <option selected hidden value="">Pilih Menu</option>
                        <?php
          foreach ($select_menu as $value) {
            if ($row['menu'] == $value['menu']) {
              echo "<option selected value=$value[menu]>$value[nama_menu]</option>";
            } else {
              echo "<option value=$value[menu]>$value[nama_menu]</option>";
            }
          }
                        ?>
                      </select>
                      <label for="menu">Menu Makanan/Minuman</label>
                      <div class="invalid-feedback">
                        Pilih Menu.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi"
                        name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                      <label for="floatingInput">Jumlah Porsi</label>
                      <div class="invalid-feedback">
                        Masukkan Jumah Porsi.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan"
                        value="<?php echo $row['catatan'] ?>">
                      <label for="floatingPassword">Catatan</label>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="edit_orderitem_validate" value="12345678">Save
                    changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- End Modal Edit -->

      <!-- Modal Delete-->
      <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                <div class="col-lg-12">
                  Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="delete_orderitem_validate"
                    value="12345678">Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal Delete-->



      <?php
        }

      ?>

      <!-- Modal Bayar -->
      <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

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
                      <td><?php echo $row['status'] ?></td>
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
                    <span class="text-danger fs-5 fw-semibold">Apakah anda yakin ingin melakukan pembayaran?</span>
              <form class="needs-validation" novalidate action="proses/proses_bayar.php" method="POST">
                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                <input type="hidden" name="total" value="<?php echo $total ?>">
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang"
                        name="uang" required>
                      <label for="floatingInput">Nominal Uang</label>
                      <div class="invalid-feedback">
                        Masukkan Nominal Uang.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345678">Bayar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- End Modal Bayar -->

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
              <th scope="col">Aksi</th>
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
              <td>
                <div class="d-flex">
                  <button class="<?php echo(!empty($row['id_bayar']))? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"  ?>" data-bs-toggle="modal"
                    data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i
                      class="bi bi-pencil-square"></i></button>
                  <button class="<?php echo(!empty($row['id_bayar']))? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"  ?>" data-bs-toggle="modal"
                    data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i
                      class="bi bi-trash"></i></button>

                </div>
              </td>
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
        <button class="<?php echo(!empty($row['id_bayar']))? "btn btn-secondary disabled" : "btn btn-success"  ?>" data-bs-toggle="modal" data-bs-target="#tambahItem"><i
            class="bi bi-plus-circle-fill"></i> Item</button>
        <button class="<?php echo(!empty($row['id_bayar']))? "btn btn-secondary disabled" : "btn btn-primary"  ?>" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i>
          Bayar</button>
        <a href="order" class="btn btn-info "> <i class="bi bi-arrow-left"></i></a>
      </div>
    </div>
  </div>
</div>