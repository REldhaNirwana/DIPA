<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Arsip Surat</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap dan jquery Modal -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
div.content {
  margin-left: 200px;
  padding: 20px 30px;
  height: 1000px;
}

</style>
</head>
<body>

<div class="sidebar">
<a >--MENU--</a>
  <a class="active" href="index.php">Arsip</a>
  <a href="about.php">About</a>
</div>

<div class="content">
<div class="container-fluid">
  <h2>Arsip Surat >> Lihat</h2>

<?php

$nomorsurat = $_GET['nomorsurat']; //Mengambil id siswa yang dikirim melalui url
include 'function.php';
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE nomorsurat = '$nomorsurat'");
// $data = mysqli_fetch_array($query);

while($data = mysqli_fetch_array($query)){
  ?>
<tr>
                    <td><b>Nomor Surat :</b> <?= $data['nomorsurat']; ?></td><br>
                    <td><b>Kategori :</b><?= $data['kategori']; ?></td><br>
                    <td><b>Judul :</b><?= $data['judul']; ?></td><br>
                    <td><b>Waktu Unggah :</b><?= date('d/m/Y | H:i:s', strtotime($data['created'])); ?></td><br>
                    

                    <td>           
                    <embed src="img/<?= $data['file'];?>" type="application/pdf" width="800" height="600" ></embed>  
                    </td>
                    <div class="text-center">
                  <a href="index.php" class="btn btn-secondary">Kembali</a>
                  <a href= "download.php?file=<?= $data['file']; ?>" class="btn btn-primary" ><i class="bi bi-pencil-square"></i>&nbsp;Unduh</a>
            </div>
                    
                </tr>

<?php } ?>


</body>
</html>