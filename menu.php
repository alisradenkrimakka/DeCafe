<?php 
  include "proses/connect.php";
  $query = mysqli_query($conn, "SELECT * FROM daftar_menu
    LEFT JOIN kategori_menu ON kategori_menu.id_kat_menu = daftar_menu.kategori");
  while ($record  = mysqli_fetch_array($query)){
    $result[] = $record;
  }

  $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM kategori_menu");
 ?>

<div class="col-lg-9 mt-2">
          <div class="card">
        <div class="card-header">
          
         Halaman Menu
        </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col d-flex justify-content-end">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu"> Tambah Menu </button>
                    </div>

                      <!-- Modal Tambah Menu Baru-->
                  <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Masukkan Foto" name="foto" required>
                                <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                <div class="invalid-feedback">
                                  Masukkan File Foto Menu.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required>
                                <label for="floatingInput">Nama Menu</label>
                                <div class="invalid-feedback">
                                  Masukkan Nama Menu.
                                </div>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
                                <label for="floatingPassword">Keterangan</label>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-floating mb-3">
                              <select class="form-select" aria-label="Default select example" name="kat_menu" required>
                                <option selected hidden value="">Pilih Kategori Menu</option>
                               <?php 
                                foreach ($select_kat_menu as $value){
                                  echo "<option value=".$value['id_kat_menu'].">$value[kategori_menu]</option>";
                                }
                               ?>
                              </select>
                              <label for="floatingInput">Kategori Makanan atau Minuman</label>
                              <div class="invalid-feedback">
                                  Pilih Kategori Makanan atau Minuman.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-floating mb-3" >
                                <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                <label for="floatingInput">Harga</label>
                                <div class="invalid-feedback">
                                  Masukkan Harga Menu.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-floating mb-3" >
                                <input type="number" class="form-control" id="floatingInput" placeholder="stok" name="stok" required>
                                <label for="floatingInput">Stok</label>
                                <div class="invalid-feedback">
                                  Masukkan Stok.
                                </div>
                              </div>
                              </div>
                              </div>                            
                              <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345678">Save changes</button>
                        </div>
                              </form>
                        </div>

                      </div>
                    </div>
                  </div>
                <!-- End Modal Tambah Menu Baru -->
                <?php 
                   if(empty($result)){
                    echo "Data menu tidak ada";
                   } else{
                   foreach ($result as $row) {
                ?>

                  <!-- Modal View -->
                  <div class="modal fade" id="ModalView<?php echo $row['menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-lg-12">
                              <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" value="<?php echo $row['nama_menu'] ?>">
                                <label for="floatingInput">Nama Menu</label>
                                <div class="invalid-feedback">
                                  Masukkan Nama Menu.
                                </div>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                                <label for="floatingPassword">Keterangan</label>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-floating mb-3">
                              <select disabled class="form-select" aria-label="Default select example" >
                                <option selected hidden value="">Pilih Kategori Menu</option>
                               <?php 
                                foreach ($select_kat_menu as $value){
                                  if($row['kategori']==$value['id_kat_menu']){
                                  echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                    
                                  }else{
                                   echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                  }
                    
                                }
                               ?>
                              </select>
                              <label for="floatingInput">Kategori Makanan atau Minuman</label>
                              <div class="invalid-feedback">
                                  Pilih Kategori Makanan atau Minuman.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-floating mb-3" >
                                <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>">
                                <label for="floatingInput">Harga</label>
                                <div class="invalid-feedback">
                                  Masukkan Harga Menu.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-floating mb-3" >
                                <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stok'] ?>">
                                <label for="floatingInput">Stok</label>
                                <div class="invalid-feedback">
                                  Masukkan Stok.
                                </div>
                              </div>
                              </div>
                              </div>                            
                              <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345678">Save changes</button>
                        </div>
                              </form>
                        </div>

                      </div>
                    </div>
                  </div>
              <!-- End Modal View -->

               <!-- Modal Edit -->
               <div class="modal fade" id="ModalEdit<?php echo $row['menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $row['menu'] ?>" name="menu">
                            <div class="row">
                              <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Masukkan Foto" name="foto" value="<?php echo $row['foto'] ?>" >
                                <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                <div class="invalid-feedback">
                                  Masukkan File Foto Menu.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required value="<?php echo $row['nama_menu'] ?>">
                                <label for="floatingInput">Nama Menu</label>
                                <div class="invalid-feedback">
                                  Masukkan Nama Menu.
                                </div>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                <label for="floatingPassword">Keterangan</label>
                              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-lg-4">
                              <div class="form-floating mb-3">
                              <select  class="form-select" aria-label="Default select example" name="kat_menu" >
                                <option selected hidden value="">Pilih Kategori Menu</option>
                               <?php 
                                foreach ($select_kat_menu as $value){
                                  if($row['kategori']==$value['id_kat_menu']){
                                  echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                    
                                  }else{
                                   echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                  }
                    
                                }
                               ?>
                              </select>
                              <label for="floatingInput">Kategori Makanan atau Minuman</label>
                              <div class="invalid-feedback">
                                  Pilih Kategori Makanan atau Minuman.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-floating mb-3" >
                                <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['harga'] ?>">
                                <label for="floatingInput">Harga</label>
                                <div class="invalid-feedback">
                                  Masukkan Harga Menu.
                                </div>
                              </div>
                              </div>
                              <div class="col-lg-4">
                              <div class="form-floating mb-3" >
                                <input type="number" class="form-control" id="floatingInput" placeholder="stok" name="stok" required value="<?php echo $row['stok'] ?>">
                                <label for="floatingInput">Stok</label>
                                <div class="invalid-feedback">
                                  Masukkan Stok.
                                </div>
                              </div>
                              </div>
                              </div>                            
                              <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345678">Save changes</button>
                        </div>
                              </form>
                        </div>

                      </div>
                    </div>
                  </div>
              <!-- End Modal Edit -->

              <!-- Modal Delete-->
                       <div class="modal fade" id="ModalDelete<?php echo $row['menu']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Menu</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="POST">
                    <input type="hidden" value="<?php echo $row['menu']?>" name="menu">
                    <input type="hidden" value="<?php echo $row['foto']?>" name="foto">
                           <div class="col-lg-12">
                              Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b> 
                                
                           </div>
                              <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345678" >Delete</button>
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
                  <div class="table-responsive">
                <table class="table table-hover" table>
          <thead>
            <tr class="text-nowrap">
              <th scope="col">No</th>
              <th scope="col">Gambar Menu</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Jenis Menu</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
               
            $no = 1;
            foreach ($result as $row) {
               ?>

            <tr>
              <th scope="row"><?php echo $no++?></th>
              <td>
                <div style="width: 90px">
                <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                </div>
              </td>
              <td><?php echo $row['nama_menu'] ?></td>
              <td><?php echo $row['keterangan'] ?></td>
              <td><?php echo ($row['jenis_menu'] == 1)? "Makanan" : "Minuman" ?></td>
              <td><?php echo $row['kategori_menu'] ?></td>
              <td><?php echo number_format($row['harga'], 0, ',','.') ?></td>
              <td><?php echo $row['stok'] ?></td>
              <td>
                <div  class="d-flex">
                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['menu'] ?>" ><i class="bi bi-eye"></i></button>
                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['menu'] ?>"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['menu'] ?>"><i class="bi bi-trash"></i></button>
 
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
        <?php } ?>
        </div>
      </div>
    </div>

