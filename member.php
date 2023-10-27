<?php
// Create database connection using config file
include_once("config.php");

// Fetch all menu data from the database
$result = "SELECT * FROM penjual";
$user_data = mysqli_query($mysqli, $result);
?>

<html>

<head>
    <title>Homepage</title>
</head>

<body>
    <a href="utama.php">BACK</a><br />
    <a href="add.php">Add New Menu</a><br />
    <a href="addp.php">Add New Member</a><br />

    <table width='80%' border=1>

        <tr>
            <th>Nama Member</th>
            <th>NO HP</th>
            <th>Alamat</th>
            <th>Update</th>
        </tr>
        <?php
        while ($menu_data = mysqli_fetch_array($user_data)) {
            echo "<tr>";
            echo "<td>" . $menu_data['namap'] . "</td>";
            echo "<td>" . $menu_data['no_hp'] . "</td>";
            echo "<td>" . $menu_data['alamat'] . "</td>";
            echo "<td><a href='editp.php?idp=" . $menu_data['idp'] . "'>Edit</a> | <a href='deletep.php?idp=" . $menu_data['idp'] . "'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>