<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$name',jenis='$email',harga='$mobile' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: menu.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nama'];
    $email = $user_data['jenis'];
    $mobile = $user_data['harga'];
}
?>
<html>
<head>	
    <title>Edit Product Data</title>
</head>
 
<body>
    <a href="menu.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Produk</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><select name="Jenis">
                    <option value="Minuman">Minuman</option>
                    <option value="Makanan">Makanan</option>
                </select></td
            </tr>
            <tr> 
                <td>Harga</td>
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