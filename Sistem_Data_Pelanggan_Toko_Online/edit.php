<?php
include 'koneksi.php';
$id_pelanggan = $_GET['id_pelanggan'];
$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
   * {
    box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        padding: 30px;
        background-color: #f3f4f6;
    }

    .form-container {
        background: #fff;
        padding: 30px; 
        max-width: 500px;
        margin: auto;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
    }

    input[type="submit"] {
        background:rgb(255, 0, 0);
        color: white;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background:rgb(150, 0, 0);
    }

    a {
        display: block;
        margin-top: 15px;
        color:rgb(255, 0, 0);
        text-align: center;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Edit Data Pelanggan</h2>
    <form method="post">

            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Alamat:</label>
            <input type="text" name="alamat" required>

            <label>No. Telepon:</label>
            <input type="text" name="no_telepon" required>

            <label>Tanggal Daftar:</label>
            <input type="date" name="tanggal_daftar" required>

            <input type="submit" name="update" value="Update">
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $query = "UPDATE pelanggan SET 
                nama='$nama', email='$email', alamat='$alamat',
                no_telepon='$no_telepon', tanggal_daftar='$tanggal_daftar'
              WHERE id_pelanggan = $id_pelanggan";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
