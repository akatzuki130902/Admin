<?php
    $server = 'localhost';
//     $server = '127.0.0.1:8889';
    $username = 'root';
    $password = '';
    $namadb = 'admin';

   $k = new mysqli($server, $username, $password, $namadb);
   if($k->connect_errno)
   {
        echo "failed ", $k->connect_error;
        exit();
   }