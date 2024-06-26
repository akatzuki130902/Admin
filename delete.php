<?php
    include("dbconnect.php");

    $jenis = $_GET['jenis'];
    $page = $_GET['page'];
    
    if($jenis == 'users')
    {
        $id = $_GET['urut'];
        $delete = $k->query("DELETE FROM users WHERE id=".$id);
    }

    if($delete)
    {
        header("Location: index.php?page=".$page);
    }
    else
    {
        echo "hapus data gagal";
    }