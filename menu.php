<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all menu data from the database
$result = "SELECT * FROM menu JOIN penjual ON menu.id_penjual = penjual.idp";
$user_data = mysqli_query($mysqli, $result);
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <a href="add.php">Add New Menu</a><br/>
    <a href="addp.php">Add New Member</a><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Nama Produk</th> <th>Harga</th> <th>Jenis</th> <th>Penjual</th> <th>Update</th>
    </tr>
    <?php  
    while($menu_data = mysqli_fetch_array($user_data)) {         
        echo "<tr>";
        echo "<td>".$menu_data['nama']."</td>";
        echo "<td>".$menu_data['harga']."</td>";
        echo "<td>".$menu_data['jenis']."</td>";
        echo "<td>".$menu_data['namap']."</td>";
        echo "<td><a href='edit.php?id=".$menu_data['id']."'>Edit</a> | <a href='delete.php?id=".$menu_data['id']."'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html> 
