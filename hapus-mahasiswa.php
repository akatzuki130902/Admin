<?php

include('dbconnect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

  
    $sql = "DELETE FROM mahasiswa WHERE id = ?";
    $stmt = $k->prepare($sql);
    $stmt->bind_param("i", $id);

    
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
    
    $stmt->close();
    $k->close();
}
?>
