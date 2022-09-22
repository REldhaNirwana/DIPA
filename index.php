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
  <h2>Arsip Surat</h2>
  <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
  <p>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
  <form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	
}
?>

        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengerjaan</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
			
			
            <?php 
            require 'function.php';
            $tanggal = date("Y-m-d H:i:s");
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $tampil = mysqli_query($koneksi,"select * from surat where nomorsurat like '%".$cari."%'");				
            }else{
                $tampil = mysqli_query($koneksi,"select * from surat");		
            }
            
            $no = 1;
            

            // $tampil = mysqli_query($koneksi, "SELECT * FROM surat ORDER BY nomorsurat DESC");

            while($hasil = mysqli_fetch_array($tampil)){
            ?>
                       
                <tr>
                    <td><?= $hasil['nomorsurat']; ?></td>
                    <td><?= $hasil['kategori']; ?></td>
                    <td><?= $hasil['judul']; ?></td>
                    <td><?= date('d/m/Y | H:i:s', strtotime($hasil['created'])); ?></td>

                    <td>           
                        <a href= "download.php?file=<?= $hasil['file']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Unduh</a> |
                        <a href="hapus.php?nomorsurat=<?= $hasil['nomorsurat'];?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus Arsip ini ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a> |
                        <a href= "lihat.php?nomorsurat=<?= $hasil['nomorsurat'];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Lihat</a> 
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        <a href="arsip.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Arsipkan Surat</a>
       
		</div>
       
</body>
</html>