<?php 
	$servername = "localhost";
    $username = "id14851784_arboladouser";
    $password = "_PAJ~0xns[wSb)}u";
    $database = "id14851784_arbolado";
    
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $query = "SELECT usuario.nombre, usuario.apellido, usuario.dni, 
          	arbol.numeroArbol, arbol.especie, censo.fechaHora FROM censo 
          	JOIN usuario ON usuario.idCenso = censo.idCenso
          	JOIN arbol ON arbol.idCenso = censo.idCenso
    		WHERE STR_TO_DATE(censo.fechaHora,'%d/%m/%Y %T') 
    		between '{$_POST['fechaDesde']}' and '{$_POST['fechaHasta']}'";

    $sql = $conn->prepare($query);

    $sql->execute();

    if($sql->rowCount()) {
	    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	        ?>
	        <tr>
	        	<td><?php print("{$row['apellido']}, {$row['nombre']} (DNI: {$row['dni']})"); ?></td>
                <td><?php print($row['numeroArbol']); ?></td>
                <td><?php print($row['especie']); ?></td>
                <td><?php print($row['fechaHora']); ?></td>
	        </tr>
	        <?php
	    }
	}
	else {
		echo "<tr><td>No se encontraron resultados entre las fechas seleccionadas</td></tr>";
	}
?>