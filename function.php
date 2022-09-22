<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "arsip");
if(!$koneksi){
    die("koneksi dengan database gagal: ".mysqli_connect_error());
}
//Tambah 
function tambah($data){
    global $koneksi;

    $nomorsurat = htmlspecialchars($data['nomorsurat']);
    $kategori = htmlspecialchars($data['kategori']);
    $judul = htmlspecialchars($data['judul']);
    $file = upload();
    

    if (!$file) {
        return false;
    }

    $sql = "INSERT INTO surat VALUES ('$nomorsurat','$kategori','$judul','$file', CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

}

// Membuat fungsi edit
    function edit($data){
    global $koneksi;

    $nomorsurat = htmlspecialchars($data['nomorsurat']);
    $kategori = htmlspecialchars($data['kategori']);
    $judul = htmlspecialchars($data['judul']);
    $fileLama = $data['fileLama'];

    if ($_FILES['file']['error'] === 4) {
        $file = $fileLama;
    } else {
        $file = upload();
    }

    $sql = "UPDATE surat SET  nomorsurat = '$nomorsurat', kategori = '$kategori', judul = '$judul',file = '$file' WHERE nomorsurat = '$nomorsurat'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
function upload()
{
    // Syarat
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];


    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['pdf'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
    
}
