<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kode_matakuliah = $_POST['nidn'];
    $deskripsi = $_POST['jenjang_pendidikan'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE dosen SET nama='$nama',nidn='$nidn',jenjang_pendidikan='$jenjang_pendidikan' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM dosen WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $nidn = $user_data['nidn'];
    $jenajang_pendidikan = $user_data['jenajang_pendidikan'];
}
?>
<html>

<head>
    <title>Edit Data Dosen</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
            </tr>
            <tr>
                <td>Kode Matakuliah</td>
                <td><input type="text" name="nidn" value=<?php echo $nidn; ?>></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="jenajang_pendidikan" value=<?php echo $jenajang_pendidikan; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>