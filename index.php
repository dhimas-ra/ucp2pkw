<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <style background img src="https://i.pinimg.com/originals/af/0a/67/af0a67acb1da6998995b122e169725d1.png"></style>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Toko Buku</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand">Toko Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Keluar</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!--
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Toko Buku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="login.php">Keluar</a>
          </div>
        </div>
      </div>
    </nav>
    --> 
    <!--Akhir Navbar-->
    
    <?php
    $level = $_SESSION['level'] == 'admin';
    if($level){
    ?>
    <!-- Modal -->
    <div class="container data-toko_buku mt-5">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data
        </button>
        <!--Modal tambah data-->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <form method="post" action="create.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Data Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_buku" class="form-label">Judul Buku</label>
                                    <input type="text" class="form-control" id="nama_buku" placeholder="Masukkan Judul" name="nama_buku" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" placeholder="Masukkan Kategori" name="kategori" required>
                                </div>
                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <textarea type="text" class="form-control" id="penerbit" placeholder="Masukkan Penerbit" name="penerbit" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <textarea type="text" class="form-control" id="harga" placeholder="Masukkan Harga" name="harga" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon</label>
                                    <textarea type="text" class="form-control" id="diskon" placeholder="Masukkan Diskon" name="diskon" required></textarea>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Modal-->
    <?php } ?>
    <!--tabel-->
    <div class="container mt-5">
      <table class="table table-striped" id="tabelBuku">
        <thead>
          <tr>
              <th scope="col">No.</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Kategori</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Harga</th>
              <th scope="col">Diskon</th>
              <th scope="col">Aksi</th>                          
          </tr>
        </thead>

      <tbody>
          <?php
          include 'config.php';
          $no = 1;
          $toko_buku = mysqli_query($koneksi, "select * from toko_buku");
          while ($data = mysqli_fetch_array($toko_buku)){
            ?>
              <tr>
                  <td><?php echo $no++; ?> </td>
                  <td><?php echo $data['nama_buku']; ?> </td>
                  <td><?php echo $data['kategori']; ?> </td>
                  <td><?php echo $data['penerbit']; ?> </td>
                  <td><?php echo $data['harga']; ?> </td>
                  <td><?php echo $data['diskon']; ?> </td>
                  <td>
                  <?php
                  $level = $_SESSION['level'] == 'admin';
                  if($level){
                  ?>  <a href="edit.php?id=<?php echo $data['id']; ?>" class= "btn btn-warning btn-sm text-white">EDIT</a>
                  <a href="delete.php?id=<?php echo $data['id']; ?>" class= "btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data mahasiswa ini?')">HAPUS</a>
                      
                  <?php }  ?> 
                  <a href="detail.php?id=<?php echo $data['id']; ?>" class= "btn btn-success btn-sm text-white">DETAIL</a>
                    <?php ?>                 
                      
                  </td>
              </tr>
            <?php
          }
          ?>
      </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabelBuku').DataTable();
        });
    </script>
</body>
</html>