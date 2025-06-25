<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f3f4f6;
        }

        h2 {
            margin-bottom: 20px;
        }

        .add-link {
            color: #4f46e5;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 15px;
            display: inline-block;
        }

        .add-link:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        th, td {
            padding: 16px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
            text-align: left;
        }

        th {
            background-color: #f9fafb;
        }

        .button {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        .edit-btn {
            background-color:rgb(0, 0, 255);
        }

        .edit-btn:hover {
            background-color:rgb(0, 0, 155);
        }

        .delete-btn {
            background-color:rgb(255, 0, 0);
        }

        .delete-btn:hover {
            background-color:rgb(155, 0, 0);
        }
    </style>
</head>
<body>
    <h2>Data Pelanggan</h2>
    <a href="tambah.php" class="add-link">+ Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM pelanggan");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id_pelanggan']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['no_telepon']}</td>
                        <td>{$row['tanggal_daftar']}</td>
                        <td>
                            <a class='button edit-btn' href='edit.php?id_pelanggan={$row['id_pelanggan']}'>Edit</a>
                            <a class='button delete-btn' href='hapus.php?id_pelanggan={$row['id_pelanggan']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
