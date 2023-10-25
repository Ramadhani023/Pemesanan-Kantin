<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for menu update, then redirect to homepage after update
if(isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $jenis = $_POST['Jenis'];
    $harga = $_POST['mobile'];
    $idp = $_POST['idp']; // Added to get the selected penjual id

    // update menu data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$name', jenis='$jenis', harga='$harga', id_penjual='$idp' WHERE id=$id");

    // Redirect to homepage to display updated menu in the list
    header("Location: menu.php");
}
?>


<?php
// Display selected menu data based on id
// Getting id from URL
$id = $_GET['id'];

// Fetch menu data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");

while ($menu_data = mysqli_fetch_array($result)) {
    $name = $menu_data['nama'];
    $jenis = $menu_data['jenis'];
    $harga = $menu_data['harga'];
    $idp = $menu_data['id_penjual'];
}
?>

<html>

<head>
    <title>Edit Product Data</title>
</head>

<body>
    <a href="menu.php">Home</a>
    <br /><br />

    <form name="update_menu" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>
                    <select name="Jenis">
                        <option value="Minuman" <?php if ($jenis == 'Minuman')
                            echo 'selected'; ?>>Minuman</option>
                        <option value="Makanan" <?php if ($jenis == 'Makanan')
                            echo 'selected'; ?>>Makanan</option>
                    </select>
                </td> <!-- Fix: Added closing tag -->
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="mobile" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td>Penjual</td>
                <td>
                    <select name="idp">
                        <?php
                        include_once("config.php");

                        $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY idp DESC");

                        while ($user_data = mysqli_fetch_array($penjual)) {
                            $selected = ($user_data['idp'] == $idp) ? 'selected' : '';
                            echo '<option value="' . $user_data['idp'] . '" ' . $selected . '>' . $user_data['namap'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>

            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>