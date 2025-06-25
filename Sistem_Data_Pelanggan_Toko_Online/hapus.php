<?php
include 'koneksi.php';
$id_pelanggan = $_GET['id_pelanggan'];
$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>