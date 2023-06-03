<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah ORDER BY id DESC");
?>

<html>

<head>
    <title>Matakuliah</title>
</head>

<body>
    <a href="add.php">Tambah Matakuliah</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th>Nama</th>
            <th>Kode Matakuliah</th>
            <th>Deskripsi</th>
            <th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['kode_matakuliah'] . "</td>";
            echo "<td>" . $user_data['deskripsi'] . "</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Hapus</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>