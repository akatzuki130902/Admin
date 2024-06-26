<?php
// Include koneksi
include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Query untuk update data mahasiswa
    $sql = "UPDATE mahasiswa SET nama=?, nim=?, email=?, jurusan=?, tahun_masuk=?, jenis_kelamin=?, tanggal_lahir=? WHERE id=?";
    $stmt = $k->prepare($sql);
    $stmt->bind_param("ssssissi", $nama, $nim, $email, $jurusan, $tahun_masuk, $jenis_kelamin, $tanggal_lahir, $id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect ke halaman data mahasiswa dengan pesan sukses
        header("Location: index.php?page=data-mahasiswa");
    } else {
        // Redirect dengan pesan error jika gagal
        header("Location: index.php?page=data-mahasiswa");
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $k->close();
} else {
    // Redirect jika bukan dari metode POST
    header("Location: data-mahasiswa.php");
}
?>