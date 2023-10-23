<html>
<head>
    <title>Add penjual</title>
</head>
 
<body>
    <a href="penjual.php">Go to Home</a>
    <br/><br/>
 
    <form action="addp.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr> 
                <td>No HP</td>
                <td><input type="text" name="Nohp"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="Alamat"></td>
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
        $email = $_POST['Nohp'];
        $mobile = $_POST['Alamat'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual(nama,no_hp,alamat) VALUES('$name','$email','$mobile')");
        
        // Show message when user added
        echo "Member added successfully. <a href='penjual.php'>View Users</a>";
    }
    ?>
</body>
</html>