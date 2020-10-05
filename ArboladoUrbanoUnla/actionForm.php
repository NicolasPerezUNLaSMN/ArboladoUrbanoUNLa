<?php
//Variables a insertar censo
$fechaHora = $_POST['fechaHora'];

//Variables a insertar coordenada
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];

//Variables a insertar calle
$nombre = $_POST['nombre'];
$numeroFrente = (int) $_POST['numeroFrente'];
$anchoVereda = $_POST['anchoVereda'];
$paridad = $_POST['paridad'];
$transito = $_POST['transito'];

//variables a insertar del arbol
$especie = $_POST['especie'];
$numeroArbol = (int) $_POST['numeroArbol'];
$distanciaEntrePlantas = $_POST['distanciaEntrePlantas'];
$distanciaAlMuro = $_POST['distanciaAlMuro'];
$circunferenciaDelArbol = $_POST['circunferenciaDelArbol'];
$cazuela = $_POST['cazuela'];
$comentario = $_POST['comentario'];
$diametro = $_POST['diametro'];
$altura = $_POST['altura'];
$cordon = $_POST['cordon'];

//variables a insertar del estado del arbol
$estadoSanitario = $_POST['estadoSanitario'];
$inclinacion = $_POST['inclinacion'];
$ahuecamiento = $_POST['ahuecamiento'];
$cable = $_POST['cable'];
$luminaria = $_POST['luminaria'];
$danios = $_POST['danios'];
$veredas = $_POST['veredas'];
$podas = $_POST['podas'];
$raices = $_POST['raices'];
$superficie = $_POST['superficie'];
$afecto = $_POST['afecto'];

//variables a insertar usuario
$nombreU = $_POST['nombreU'];
$apellido = $_POST['apellido'];
$dni = (int) $_POST['dni'];

define('UPLOAD_DIR', 'images/');
$total = count($_FILES['image']['name']);
$target_dir = 'images/';

$errors = [];
$success = [];


$nombreFoto =' ';

if ($total > 15 || $total === 0) {
  array_push($errors, 'La cantidad de imágenes debe ser menor o igual a 15.');
} else {
  for ($i = 0; $i < $total; $i++) {
    $target_file =
      $target_dir . uniqid() . basename($_FILES['image']['name'][$i]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST['submit'])) {
      $check = getimagesize($_FILES['image']['tmp_name'][$i]);
      if ($check !== false) {
        echo 'File is an image - ' . $check['mime'] . '.';
        $uploadOk = 1;
      } else {
        echo 'File is not an image.';
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      array_push($errors, 'La imagen ya existe.');
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES['image']['size'][$i] > 1000000) {
      array_push($errors, 'La imagen es muy grande.');
      $uploadOk = 0;
    }
    // Allow certain file formats
    if (
      $imageFileType != 'jpg' &&
      $imageFileType != 'png' &&
      $imageFileType != 'jpeg' &&
      $imageFileType != 'gif'
    ) {
      echo 'Solo los formatos JPG, JPEG, PNG & GIF son permitidos.';
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      array_push($errors, 'La imagen no fue enviado.');
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target_file)) {
        array_push(
          $success,
          'La imagen' .
            basename($_FILES['image']['name'][$i]) .
            ' ha sido enviado.'
        );
		$nombreFoto = $nombreFoto.', '.$target_file;
      } else {
        array_push($errors, 'Hubo un error enviando la imagen.');
      }
    }
	
	
	
	
	
	
  }

  try {
    //$servername = '127.0.0.1';
    //$username = 'walter';
    //$password = 'walter';
    //$database = 'arbolado';



//$servername = "localhost";
//$username = "id14851784_arboladouser";
//$password = "_PAJ~0xns[wSb)}u";
//$database = "id14851784_arbolado";



include("conectar.php");

    $conn = new PDO(
      "mysql:host=$servername;dbname=$database",
      $username,
      $password
    );
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }

  try {
    $conn->beginTransaction();
    $sql = 'INSERT INTO censo (fechaHora) VALUES (:value)';
    $result = $conn->prepare($sql);
    $result->bindValue(':value', $fechaHora, PDO::PARAM_STR);
    $result->execute();
    $lastId = $conn->lastInsertId();

    // coordenada
    $sql =
      'INSERT INTO coordenada (latitud, longitud, idCenso) VALUES (:latitud, :longitud, :idCenso)';
    $result = $conn->prepare($sql);
    $result->bindValue(':latitud', $latitud, PDO::PARAM_STR);
    $result->bindValue(':longitud', $longitud, PDO::PARAM_STR);
    $result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
    $result->execute();

    // calle
    $sql =
      'INSERT INTO calle (nombre, numeroFrente, anchoVereda,paridad, transito, idCenso) VALUES (:nombre, :numeroFrente, :anchoVereda,:paridad, :transito, :idCenso)';
    $result = $conn->prepare($sql);
    $result->bindValue(':nombre', $nombre, PDO::PARAM_STR);
    $result->bindValue(':numeroFrente', $numeroFrente, PDO::PARAM_INT);
    $result->bindValue(':anchoVereda', $anchoVereda, PDO::PARAM_STR);
    $result->bindValue(':paridad', $paridad, PDO::PARAM_STR);
    $result->bindValue(':transito', $transito, PDO::PARAM_STR);
    $result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
    $result->execute();

    // arbol
    $sql =
      'INSERT INTO arbol (especie,numeroArbol,distanciaEntrePlantas, distanciaAlMuro,circunferenciaDelArbol, cazuela,comentario, idCenso, diametro, altura, cordon) VALUES (:especie,:numeroArbol,:distanciaEntrePlantas, :distanciaAlMuro,:circunferenciaDelArbol, :cazuela,:comentario, :idCenso, :diametro, :altura, :cordon)';
    $result = $conn->prepare($sql);
    $result->bindValue(':especie', $especie, PDO::PARAM_STR);
    $result->bindValue(':numeroArbol', $numeroArbol, PDO::PARAM_INT);
    $result->bindValue(
      ':distanciaEntrePlantas',
      $distanciaEntrePlantas,
      PDO::PARAM_STR
    );
    $result->bindValue(':diametro', $diametro, PDO::PARAM_STR);
    $result->bindValue(':altura', $altura, PDO::PARAM_STR);
    $result->bindValue(':cordon', $cordon, PDO::PARAM_STR);
    $result->bindValue(':distanciaAlMuro', $distanciaAlMuro, PDO::PARAM_STR);
    $result->bindValue(
      ':circunferenciaDelArbol',
      $circunferenciaDelArbol,
      PDO::PARAM_STR
    );
    $result->bindValue(':cazuela', $cazuela, PDO::PARAM_STR);
    $result->bindValue(':comentario', $comentario, PDO::PARAM_STR);
    $result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
    $result->execute();

    // estado del arbol
    $sql =
      'INSERT INTO estadodelarbol (estadoSanitario,inclinacion,ahuecamiento,cable,luminaria,danios,veredas,podas, idCenso, raices, superficie, afecto) VALUES (:estadoSanitario,:inclinacion,:ahuecamiento,:cable,:luminaria,:danios,:veredas,:podas, :idCenso, :raices, :superficie, :afecto)';
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
    $result->bindValue(':superficie', $superficie, PDO::PARAM_STR);
    $result->bindValue(':afecto', $afecto, PDO::PARAM_STR);
    $result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
    $result->execute();

    // usuario
    $sql =
      'INSERT INTO usuario (nombre, apellido,dni, idCenso) VALUES (:nombreU,:apellido,:dni, :idCenso)';
    $result = $conn->prepare($sql);
    $result->bindValue(':nombreU', $nombreU, PDO::PARAM_STR);
    $result->bindValue(':apellido', $apellido, PDO::PARAM_STR);
    $result->bindValue(':dni', $dni, PDO::PARAM_INT);
    $result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
    $result->execute();

    // Create the query
    // hacemos el insert de la variable $data en el campo blob de la tabla
    $sql = 'INSERT INTO imagen(idCenso, nombreFoto) VALUES( :idCenso,:nombreFoto)';
    $result = $conn->prepare($sql);
    $result->bindValue(':idCenso', $lastId, PDO::PARAM_INT);
    $result->bindValue(':nombreFoto', $nombreFoto, PDO::PARAM_STR);
    $result->execute();

    $conn->commit();
    array_push($success, 'Todos los datos fueron insertados');
  } catch (PDOException $e) {
    array_push($errors, 'Error del servidor: ' . $e->getMessage());
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Arbolado Urbano UNLa</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet" />
    <style>
      html,
      body {
        height: 100%;
        margin: 0;
      }

      #map {
        width: 800px;
        height: 600px;
      }
    </style>
    <style type="text/css">
      html,
      body,
      header,
      .carousel {
        height: 100%;
      }
      @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {
          background: #1c2331 !important;
        }
      }
    </style>
  </head>
  <?php include 'nav.php'; ?>
  <hr class="my-5" />
    <div class="container">
    <?php foreach ($success as &$msg) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $msg; ?>
        </div>
    <?php } ?>
    <?php foreach ($errors as &$msg) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $msg; ?>
        </div>
    <?php } ?>
    <hr class="my-5" />
    <a href="/form.php" class="btn btn-primary">Volver al formulario</a>
    </div> 
  <body>
</html>