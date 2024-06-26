<?php

include('dbconnect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $email = $_POST['email'];


    $stmt = $k->prepare("INSERT INTO mahasiswa (nama, nim, tanggal_lahir, jenis_kelamin, jurusan, tahun_masuk, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $nama, $nim, $tanggal_lahir, $jenis_kelamin, $jurusan, $tahun_masuk, $email);


    if ($stmt->execute()) {

        header("Location: index.php?page=data-mahasiswa");
        exit();
    } else {

        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $k->close();
}
?>
