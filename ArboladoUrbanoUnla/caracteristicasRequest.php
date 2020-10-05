<?php 
	$servername = "localhost";
    $username = "id14851784_arboladouser";
    $password = "_PAJ~0xns[wSb)}u";
    $database = "id14851784_arbolado";
    
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    //Restricciones de la query en base a lo recibido
    $whereDNI = ($_POST['dni']!=='') ? "(dni='{$_POST['dni']}')" : "true";
    $whereDanios = ($_POST['danios']=='true') ? "(danios!='')" : "(danios is NULL or danios='')";
    $whereCazuela = ($_POST['cazuela']=='true') ? "(cazuela!='')" : "(cazuela is NULL or cazuela='')";
    $whereLuminaria = ($_POST['luminaria']=='true') ? "(luminaria!='')" : "(luminaria is NULL or luminaria='')";
    $wherePodas = ($_POST['podas']=='true') ? "(podas!='')" : "(podas is NULL or podas='')";
    $whereCable = ($_POST['cable']=='true') ? "(cable!='')" : "(cable is NULL or cable='')";

    $query = "SELECT * from usuario";

    $query = "SELECT usuario.nombre, usuario.apellido, usuario.dni, 
          	arbol.numeroArbol, arbol.especie, arbol.comentario, 
            censo.fechaHora, calle.nombre AS nombrecalle
            FROM censo 
          	JOIN usuario ON usuario.idCenso = censo.idCenso
          	JOIN arbol ON arbol.idCenso = censo.idCenso
            JOIN estadodelarbol ON estadodelarbol.idCenso = censo.idCenso
            LEFT JOIN calle ON usuario.idCenso = calle.idCenso
            WHERE {$whereDNI} AND {$whereDanios} AND {$whereCazuela}
                AND {$whereLuminaria} AND {$wherePodas} AND {$whereCable}";

    $sql = $conn->prepare($query);

    $sql->execute();

    if($sql->rowCount()) {
	    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	        ?>
	        <tr>
	        	<td><?php print($row['dni']); ?></td>
                <td><?php print($row['fechaHora']); ?></td>
                <td><?php print($row['especie']); ?></td>
                <td><?php print($row['nombrecalle']); ?></td>
                <td><?php print($row['comentario']); ?></td>
	        </tr>
	        <?php
	    }
	}
	else {
		echo "<tr><td>No se encontraron resultados entre las fechas seleccionadas</td></tr>";
	}
?>