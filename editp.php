<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $name=$_POST['nama'];
    $mobile=$_POST['nohp'];
    $email=$_POST['alamat'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjual SET nama='$name',alamat='$email',no_hp='$mobile' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: penjual.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nama'];
    $email = $user_data['nohp'];
    $mobile = $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit Member Data</title>
</head>
 
<body>
    <a href="penjual.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="editp.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>no HP</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>