<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    $nama=$_POST['nama'];
    $kode_matakuliah=$_POST['kode_matakuliah'];
    $deskripsi=$_POST['deskripsi'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE matakuliah SET nama='$nama',kode_matakuliah='$kode_matakuliah',deskripsi='$deskripsi' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $kode_matakuliah = $user_data['kode_matakuliah'];
    $deskripsi = $user_data['deskripsi'];
}
?>
<html>
<head>	
    <title>Edit Data Matakuliah</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Kode Matakuliah</td>
                <td><input type="text" name="kode_matakuliah" value=<?php echo $kode_matakuliah;?>></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value=<?php echo $deskripsi;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
