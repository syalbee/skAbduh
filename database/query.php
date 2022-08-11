<?php 

function getUserAdmin()
{
    include 'koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM users");
    if (!$query) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }

   return $query;
}

