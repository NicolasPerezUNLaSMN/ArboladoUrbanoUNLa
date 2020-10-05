<?php 
	include("conectar.php");
    
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $query = "SELECT DISTINCT dni FROM usuario WHERE CAST(150 AS VARCHAR) as LIIKE '{$_GET['dni']}%'";

    $sugerencias = "";

    $sql = $conn->prepare($query);

    $sql->execute();

    if($sql->rowCount()) {
	    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	    	if(strlen($row['dni']) != strlen($_GET['dni'])){
		    	$sugerencias .= "<option value={$row['dni']}>";
		    	$sugerencias .= "<br>";
		    }
	    }
	}
	else {
		$sugerencias = "Sin sugerencias";
	}

	echo $sugerencias;
?>