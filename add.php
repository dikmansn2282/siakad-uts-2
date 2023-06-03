<html>

<head>
    <title>Tambah Dosen</title>
</head>

<body>
    <a href="index.php">Kembali ke Home</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kode Mata Kuliah</td>
                <td><input type="text" name="nidn"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="jenjang_pendidikan"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $kode_matakuliah = $_POST['nidn'];
        $deskripsi = $_POST['jenjang_pendidikan'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO matakuliah(nama,nidn,jenjang_pendidikan) VALUES('$nama','$nidn','$jenjang_pendidikan')");

        // Show message when user added
        echo "Data Dosen berhasil ditambahkan. <a href='index.php'>Lihat Data Dosen</a>";
    }
    ?>
</body>

</html>