<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for menu update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $idp = $_POST['idp']; // Add this line to get the idp from the form
    $name = $_POST['namap'];
    $mobile = $_POST['mobile']; // Fix the name attribute to match the form
    $alamat = $_POST['alamat'];

    // update menu data
    $result = mysqli_query($mysqli, "UPDATE penjual SET namap='$name', no_hp='$mobile', alamat='$alamat' WHERE idp=$idp");

    // Redirect to homepage to display updated menu in the list
    header("Location: member.php");
    exit(); // Add this line to stop the script after redirection
}

// Display selected menu data based on id
// Getting id from URL
$idp = $_GET['idp'];

// Fetch menu data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE idp=$idp");

while ($menu_data = mysqli_fetch_array($result)) {
    $namap = $menu_data['namap']; // Fix variable name
    $mobile = $menu_data['no_hp']; // Fix variable name
    $alamat = $menu_data['alamat'];
}
?>

<html>

<head>
    <title>Edit Member Data</title>
</head>

<body>
    <a href="member.php">Home</a>
    <br /><br />

    <form name="update_member" method="post" action="editp.php">
        <table border="0">
            <tr>
                <td>Nama Member</td>
                <td><input type="text" name="namap" value="<?php echo $namap; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="mobile" value="<?php echo $mobile; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="idp" value="<?php echo $idp; ?>"></td> <!-- Fix variable name -->
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
