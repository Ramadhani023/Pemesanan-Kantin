<html>

<head>
    <title>Add Menu</title>
</head>

<body>
    <a href="menu.php">Go to Home</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><select name="Jenis">
                        <option value="Minuman" value=minuman>Minuman</option>
                        <option value="Makanan" value=makanan>Makanan</option>
                    </select></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="Harga"></td>
            </tr>
            <tr>
                <td>Penjual</td>
                <td>
                    <select name="idp">
                        <?php
                        include_once("config.php");

                        $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY idp DESC");

                        while ($user_data = mysqli_fetch_array($penjual)) {
                            echo '<option value="' . $user_data['idp'] . '">' . $user_data['namap'] . '</option>';
                        }
                        ?>
                    </select>
                </td>

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
        $name = $_POST['Nama'];
        $email = $_POST['Jenis'];
        $mobile = $_POST['Harga'];
        $idp = $_POST['idp'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(nama,harga,jenis,id_penjual) VALUES('$name','$mobile','$email','$idp')");

        // Show message when user added
        echo "Menu added successfully. <a href='menu.php'>View Menu</a>";
    }
    ?>
</body>

</html>