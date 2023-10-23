<html>
<head>
    <title>Add Menu</title>
</head>
 
<body>
    <a href="menu.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Produk</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><select name="Jenis">
                    <option value="Minuman" value=<?php echo $email;?>>Minuman</option>
                    <option value="Makanan" value=<?php echo $email;?>>Makanan</option>
                </select></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['Nama'];
        $email = $_POST['Jenis'];
        $mobile = $_POST['Harga'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(nama,harga,jenis) VALUES('$name','$mobile','$email')");
        
        // Show message when user added
        echo "Menu added successfully. <a href='menu.php'>View Users</a>";
    }
    ?>
</body>
</html>