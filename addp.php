<html>

<head>
    <title>Add Member</title>
</head>

<body>
    <a href="menu.php">Go to Home</a>
    <br /><br />

    <form action="addp.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama Member</td>
                <td><input type="text" name="namap"></td>
            </tr>

            <tr>
                <td>No HP</td>
                <td><input type="text" name="hp"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $name = $_POST['namap'];
        $mobile = $_POST['hp'];
        $alamat = $_POST['alamat'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual(namap,no_hp,alamat) VALUES('$name','$mobile','$alamat')");

        // Show message when user added
        echo "Member added successfully. <a href='member.php'>View Member</a>";
    }
    ?>
</body>

</html>