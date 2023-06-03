<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM dosen ORDER BY id DESC");
?>

<html>

<head>
    <title>Dosen</title>
</head>

<body>
    <a href="add.php">Tambah Dosen</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th>Nama</th>
            <th>NIDN</th>
            <th>JENJANG PENDIDIKAN (S2 ATAU S3)</th>
            <th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['nidn'] . "</td>";
            echo "<td>" . $user_data['jenjang_pendidikan'] . "</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Hapus</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>