<?php


$servername = "localhost";
$username = "root";
$password = "root";
$database = "arbolado";

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

$sql = $conn->prepare("SELECT * from censo");
$sql->execute();

if($sql->rowCount()) {
?>
<table border="0">
    <tr COLSPAN=2 BGCOLOR="#6D8FFF">
        <td>ID</td>
        <td>Name</td>
        
    </tr>
<?php
while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
        <td><?php print($row['idCenso']); ?></td>
        <td><?php print($row['fechaHora']); ?></td>
        
    </tr>
<?php
}
?>
</table>
<?php
} else {

    print('There are no records at this moment.');

}