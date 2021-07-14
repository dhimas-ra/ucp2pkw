<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <title>Toko Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
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
    <!--Akhir Navbar-->

    <?php
        include 'config.php';
        $id = $_GET['id'];
        $toko_buku = mysqli_query($koneksi, "select * from toko_buku where id='$id'");
        while ($data = mysqli_fetch_assoc($toko_buku)){
        ?>
            <div class="container mt-5">
                <p><a>Home</a> / Edit Data Buku/ <?php echo $data['nama_buku'] ?></p>
                <div class="card">
                    <div class="card-header">
                        <p class="fw-bold">Data Buku</p>
                    </div>
                    <div class="card-body fw-bold">
                    <form method="post" action="update.php">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_buku" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" id="nama_buku" placeholder="Masukkan Judul Buku" name="nama_buku" value="<?php echo $data['nama_buku']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" placeholder="Masukkan Kategori Buku" name="kategori" value="<?php echo $data['kategori']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Penerbit" name="penerbit" value="<?php echo $data['penerbit']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga" name="harga" value="<?php echo $data['harga']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="probabilitas_diskon" class="form-label">Diskon</label>
                                <input type="text" class="form-control" id="diskon" placeholder="Masukkan Diskon" name="diskon" value="<?php echo $data['diskon']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>