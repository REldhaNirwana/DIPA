<?php

require 'function.php';
if(isset($_GET['nomorsurat'])) {
    $nomorsurat =htmlspecialchars($_GET["nomorsurat"]);
    $sql ="delete from surat where nomorsurat = '$nomorsurat'";
    $hasil = mysqli_query($koneksi,$sql);

    if($hasil){
        echo "<script>
                alert('Arsip berhasil di hapus!');
                document.location.href ='index.php';
             </script>";
    }else{
        echo "<script>
                alert('Maaf Arsip gagal dihapus!');
				document.location.href ='index.php';
            </script>";
    }

}