<?php

//Variables a insertar censo
$fechaHora=$_POST['fechaHora'];

//Variables a insertar coordenada
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$direccion=$_POST['direccion'];

//Variables a insertar calle
$nombre=$_POST['nombre'];
$numeroFrente=(int)$_POST['numeroFrente'];
$anchoVereda=$_POST['anchoVereda'];
$paridad=$_POST['paridad'];
$transito=$_POST['transito'];

//variables a insertar del arbol
$especie=$_POST['especie'];
$numeroArbol=(int)$_POST['numeroArbol'];
$distanciaEntrePlantas=$_POST['distanciaEntrePlantas'];
$distanciaAlMuro=$_POST['distanciaAlMuro'];
$circunferenciaDelArbol=$_POST['circunferenciaDelArbol'];
$cazuela=$_POST['cazuela'];
$diametroDelArbol=$_POST['diametroDelArbol'];
$altura=$_POST['altura'];
$distanciaAlCordon=$_POST['distanciaAlCordon'];
$comentario=$_POST['comentario'];


//variables a insertar del estado del arbol
$estadoSanitario=$_POST['estadoSanitario'];
$inclinacion=$_POST['inclinacion'];
$ahuecamiento=$_POST['ahuecamiento'];
$cable=$_POST['cable'];
$luminaria=$_POST['luminaria'];
$danios=$_POST['danios'];
$veredas=$_POST['veredas'];
$podas=$_POST['podas'];
$raices=$_POST['raices'];
$superficieAfectada=$_POST['superficieAfectada'];
$afecto=$_POST['afecto'];


//variables a insertar usuario
$nombreU=$_POST['nombreU'];
$apellido=$_POST['apellido'];
$dni=(int)$_POST['dni'];



include("conectar.php");


//$servername = "localhost";
//$username = "id14851784_arboladouser";
//$password = "_PAJ~0xns[wSb)}u";
//$database = "id14851784_arbolado";


//cantidad de imagenes
$cantidadDeImagenes=(int)$_POST['cantidadDeImagenes'];


for ($i = 0; $i < $cantidadDeImagenes; $i++) {
define('UPLOAD_DIR', 'images/');
	$imgg = $_POST['image_'.($i)];
	$imgg = str_replace('data:image/png;base64,', '', $imgg);
	$imgg = str_replace(' ', '+', $imgg);
	$img[$i] = base64_decode($imgg);
	$file[$i] = UPLOAD_DIR . uniqid() . '.png';
	$success = file_put_contents($file[$i], $img[$i]);
}



// Read the image bytes into the $data variable
//leemos la imagen como bytes y la grabamos en $data
//$fh = fopen("arbolPrueba.jpg", "r");
//$data = addslashes(fread($fh, filesize("arbolPrueba.jpg")));
//fclose($fh);




try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO censo (fechaHora) VALUES (:value)';
$result = $conn->prepare($sql);
$result->bindValue(':value', $fechaHora, PDO::PARAM_STR);
$result->execute();
$lastId = $conn->lastInsertId();

// coordenada
$sql = 'INSERT INTO coordenada (latitud, longitud,direccion,  idCenso) VALUES (:latitud, :longitud,:direccion, :idCenso)';
$result = $conn->prepare($sql);
$result->bindValue(':latitud', $latitud, PDO::PARAM_STR);
$result->bindValue(':longitud', $longitud, PDO::PARAM_STR);
$result->bindValue(':direccion', $direccion, PDO::PARAM_STR);
$result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
$result->execute();


// calle
$sql = 'INSERT INTO calle (nombre, numeroFrente, anchoVereda,paridad, transito, idCenso) VALUES (:nombre, :numeroFrente, :anchoVereda,:paridad, :transito, :idCenso)';
$result = $conn->prepare($sql);
$result->bindValue(':nombre', $nombre, PDO::PARAM_STR);
$result->bindValue(':numeroFrente', $numeroFrente, PDO::PARAM_INT);
$result->bindValue(':anchoVereda', $anchoVereda, PDO::PARAM_STR);
$result->bindValue(':paridad', $paridad, PDO::PARAM_STR);
$result->bindValue(':transito', $transito, PDO::PARAM_STR);
$result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
$result->execute();

// arbol
$sql = 'INSERT INTO arbol (especie,numeroArbol,distanciaEntrePlantas, distanciaAlMuro,circunferenciaDelArbol, cazuela,diametroDelArbol, altura, distanciaAlCordon, comentario, idCenso) VALUES (:especie,:numeroArbol,:distanciaEntrePlantas, :distanciaAlMuro,:circunferenciaDelArbol, :cazuela, :diametroDelArbol, :altura, :distanciaAlCordon, :comentario, :idCenso)';
$result = $conn->prepare($sql);
$result->bindValue(':especie', $especie, PDO::PARAM_STR);
$result->bindValue(':numeroArbol', $numeroArbol, PDO::PARAM_INT);
$result->bindValue(':distanciaEntrePlantas', $distanciaEntrePlantas, PDO::PARAM_STR);
$result->bindValue(':distanciaAlMuro', $distanciaAlMuro, PDO::PARAM_STR);
$result->bindValue(':circunferenciaDelArbol', $circunferenciaDelArbol, PDO::PARAM_STR);
$result->bindValue(':cazuela', $cazuela, PDO::PARAM_STR);
$result->bindValue(':diametroDelArbol', $diametroDelArbol, PDO::PARAM_STR);
$result->bindValue(':altura', $altura, PDO::PARAM_STR);
$result->bindValue(':distanciaAlCordon', $distanciaAlCordon, PDO::PARAM_STR);
$result->bindValue(':comentario', $comentario, PDO::PARAM_STR);
$result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
$result->execute();


// estado del arbol
$sql = 'INSERT INTO estadodelarbol (estadoSanitario,inclinacion,ahuecamiento,cable,luminaria,danios,veredas,podas,raices, superficieAfectada, afecto, idCenso) VALUES (:estadoSanitario,:inclinacion,:ahuecamiento,:cable,:luminaria,:danios,:veredas,:podas, :raices, :superficieAfectada, :afecto, :idCenso)';
$result = $conn->prepare($sql);
$result->bindValue(':estadoSanitario', $estadoSanitario, PDO::PARAM_STR);
$result->bindValue(':inclinacion', $inclinacion, PDO::PARAM_STR);
$result->bindValue(':ahuecamiento', $ahuecamiento, PDO::PARAM_STR);
$result->bindValue(':cable', $cable, PDO::PARAM_STR);
$result->bindValue(':luminaria', $luminaria, PDO::PARAM_STR);
$result->bindValue(':danios', $danios, PDO::PARAM_STR);
$result->bindValue(':veredas', $veredas, PDO::PARAM_STR);
$result->bindValue(':podas', $podas, PDO::PARAM_STR);
$result->bindValue(':raices', $raices, PDO::PARAM_STR);
$result->bindValue(':superficieAfectada', $superficieAfectada, PDO::PARAM_STR);
$result->bindValue(':afecto', $afecto, PDO::PARAM_STR);
$result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
$result->execute();


// usuario
$sql = 'INSERT INTO usuario (nombre, apellido,dni, idCenso) VALUES (:nombreU,:apellido,:dni, :idCenso)';
$result = $conn->prepare($sql);
$result->bindValue(':nombreU', $nombreU, PDO::PARAM_STR);
$result->bindValue(':apellido', $apellido, PDO::PARAM_STR);
$result->bindValue(':dni', $dni, PDO::PARAM_INT);
$result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
$result->execute();




for ($i = 0; $i < $cantidadDeImagenes; $i++) {
// Create the query
// hacemos el insert de la variable $data en el campo blob de la tabla
$sql = 'INSERT INTO imagen(idCenso, img, nombreFoto) VALUES( :idCenso,:img, :nombreFoto)';
$result = $conn->prepare($sql);
$result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
$result->bindValue(':img', $img[$i], PDO::PARAM_LOB);
$result->bindValue(':nombreFoto', $file[$i], PDO::PARAM_STR);

$result->execute();


}








$conn->commit();
echo 'Datos insertados';





    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }





?>


