<?php 
	$servername = "localhost";
	$username = "id14851784_arboladouser";
	$password = "_PAJ~0xns[wSb)}u";
	$database = "id14851784_arbolado";

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $query = "SELECT usuario.dni, censo.fechaHora, arbol.especie, 
    			calle.nombre as nombrecalle, imagen.img, arbol.comentario
    			FROM usuario
				JOIN censo ON usuario.idCenso = censo.idCenso
				JOIN arbol ON usuario.idCenso = arbol.idCenso
				LEFT JOIN calle ON usuario.idCenso = calle.idCenso
				LEFT JOIN imagen ON usuario.idCenso = imagen.idCenso
				WHERE dni = '{$_POST['dni']}'";

    $sql = $conn->prepare($query);

    $sql->execute();

    //echo $sql->rowCount();

    if($sql->rowCount()) {
	    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	        ?>
	        <tr>
	        	<td><?php print($row['dni']); ?></td>
	        	<td><?php print($row['fechaHora']); ?></td>
	        	<td><?php print($row['especie']); ?></td>
	        	<td><?php print($row['nombrecalle']); ?></td>
	        	<td name="arbolminiatura">
	        	<?php 
	        		if($row['img'] != null) print '<img src="data:image/png;base64,'.base64_encode( $row['img'] ).'"
	        			style="width: 70px; height: 70px;"/>'; 
	        		else print "Sin imagen";
	        	?>
	        	</td>
	        	<td><?php print($row['comentario']); ?></td>
	        </tr>
	        <?php
	    }
	}
	else {
		echo "<tr><td>No se encontraron resultados para el usuario con DNI {$_POST['dni']}</td></tr>";
	}
?>