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
  <h2>Arsip Surat >> Unggah</h2>
  <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
  <p>Catatan : Gunakan file berformat PDF</p>

        <!-- Begin Page Content -->
<?php
require 'function.php';

//Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Disimpan');
                document.location.href ='index.php';
            </script>";
    
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Maaf Anda Gagal!');
            </script>";
    }
}
?>
<div class="card">
    <div class="card-body">
        <!-- Horizontal Form -->
        <form action="" method="POST" enctype="multipart/form-data">
		
		<!-- Karena ini biasa, id paket di 0 kan -->
		<input type="hidden" class="form-control" name="nomorsurat" value="0" required>
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">Nomor Surat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="nomorsurat"  required>			
                </div>
            </div>
            
			<div class="row mb-3">
                <label for="telp_penyewa" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
					<select name="kategori" class="form-control" required> 
                        <option value="Pengumuman" selected>Pengumuman</option>
                        <option value="Undangan" selected>Undangan</option>
                        <option value="Nota Dinas" selected>Nota Dinas</option>
                        <option value="Pemberitahuan" selected>Pemberitahuan</option>
						
					</select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="id_penyewa" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="judul"  required>			
                </div>
            </div>
			<div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                <div class="col-sm-10">
                    <input type="file" name="file" id="foto" class="isian-formulir isian-formulir-border" required>
                </div>
            </div>
            <div class="text-center">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                
               
            </div>
        </form>
       

</body>
</html>