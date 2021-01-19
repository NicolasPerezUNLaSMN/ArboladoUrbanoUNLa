<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Arbolado Urbano UNLa</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- DatePicker core CSS -->
  <link href="css/datepicker.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 100%;
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="https://www.unla.edu.ar" target="_blank">
        <strong>UNLa</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" target="_blank">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" target="_blank">Descarga nuesta APP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" target="_blank">Tutoriales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="estadisticas.php">Estadísticas</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.facebook.com/" class="nav-link" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/" class="nav-link" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
		 
          <li class="nav-item">
            <a href="https://github.com/" class="nav-link border border-light rounded"
              target="_blank">
              <i class="fab fa-github mr-2"></i>GitHub - Arbolado
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

 

  <!--Main layout-->
  <main>
    <div class="container">

      

      <hr class="my-5">

        <h3 class="h3 text-center mb-5">Estadísticas de los árboles registrados</h3>

          <!--Grid column-->
         <?php

      $servername = "localhost";
      $username = "id14851784_arboladouser";
      $password = "_PAJ~0xns[wSb)}u";
      $database = "id14851784_arbolado";

      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

      $sql = $conn->prepare("SELECT especie, COUNT(*) as cantidad FROM arbol GROUP BY especie ORDER BY cantidad DESC;");
      $sql->execute();

      ?>

      <!--Grid row-->
      <div class="form-row">
        <button class="btn btn-sm" data-toggle="collapse" data-target="#divEspeciesRegistradas">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </button>
        <h3>Cantidad de especies registradas</h3>
      </div>
      <div id="divEspeciesRegistradas" class="row wow fadeIn collapse">
          <?php 
          if($sql->rowCount()) {
          ?>
          <table class="table" border="0">
              <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                  <th>Nombre de la especie</th>
                  <th>Cantidad</th>
              </tr>
          <?php
          while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
          ?>
              <tr>
                  <td><?php print($row['especie']); ?></td>
                  <td><?php print($row['cantidad']); ?></td>
              </tr>
          <?php
          }
          ?>
          </table>
          <?php
          } else {
            echo "</div> No se encontraron registros.";
          }?>
        </div>

      <br><br>

      <div class="form-row">
        <button class="btn btn-sm" data-toggle="collapse" data-target="#divUltimoArbolAgregado">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </button>
        <h3>Último árbol añadido</h3>
      </div>
      <div id="divUltimoArbolAgregado" class="row wow fadeIn collapse">
        <?php 
        //Segunda consulta
        $sql = $conn->prepare("SELECT usuario.dni, usuario.nombre, usuario.apellido, 
          arbol.especie, arbol.numeroArbol, arbol.comentario, 
          MAX(STR_TO_DATE(fechaHora,'%d/%m/%Y %T')) as fechaHora from censo 
          JOIN arbol ON censo.idCenso = arbol.idCenso
          JOIN usuario ON usuario.idCenso = arbol.idCenso;");
        $sql->execute();
        //Mostrando resultados
        if($sql->rowCount()) {
        ?>
        <table class="table" border="0">
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <th>Añadido por</th>
                <th>Fecha</th>
                <th>Especie</th>
                <th>Número de arbol</th>
                <th>Comentarios</th>
            </tr>
        <?php
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php print("{$row['apellido']}, {$row['nombre']} (DNI: {$row['dni']})"); ?></td>
                <td><?php print($row['fechaHora']); ?></td>
                <td><?php print($row['especie']); ?></td>
                <td><?php print($row['numeroArbol']); ?></td>
                <td><?php print($row['comentario']); ?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        </div>
        <?php
        } else {
            echo "<p style='padding-left: 20px;'> No se encontraron registros.</p></div>";
        }?>

      <br><br>

      <div class="form-row">
        <button class="btn btn-sm" data-toggle="collapse" data-target="#divArbolesUltimoAnio">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </button>
        <h3>Cantidad de árboles añadidos este año</h3>
      </div>
      <div id="divArbolesUltimoAnio" class="row wow fadeIn collapse">
        <?php 
        //Segunda consulta
        $sql = $conn->prepare("SELECT usuario.nombre, usuario.apellido, usuario.dni, 
          arbol.numeroArbol, arbol.especie, censo.fechaHora FROM censo 
          JOIN usuario ON usuario.idCenso = censo.idCenso
          JOIN arbol ON arbol.idCenso = censo.idCenso
          WHERE SUBSTR(fechaHora, 7, 4) = YEAR(NOW());");
        $sql->execute();
        //Mostrando resultados
        if($sql->rowCount()) {
        ?>
        <table class="table" border="0">
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <th>Añadido por</th>
                <th>Número de árbol</th>
                <th>Especie</th>
                <th>Fecha</th>
            </tr>
        <?php
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
        ?>
        </table>
        </div>
        <?php
        } else {
            echo "<p style='padding-left: 20px;'> No se encontraron registros.</p></div>";
        }?>

      <br><br>

      <div class="form-row">
        <button class="btn btn-sm" data-toggle="collapse" data-target="#divArbolesUltimoMes">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </button>
        <h3>Cantidad de árboles añadidos este mes</h3>
      </div>
      <div id="divArbolesUltimoMes" class="row wow fadeIn collapse">
        <?php 
        //Segunda consulta
        $sql = $conn->prepare("SELECT usuario.nombre, usuario.apellido, usuario.dni, 
          arbol.numeroArbol, arbol.especie, censo.fechaHora FROM censo 
          JOIN usuario ON usuario.idCenso = censo.idCenso
          JOIN arbol ON arbol.idCenso = censo.idCenso
          WHERE SUBSTR(fechaHora, 4, 2) = MONTH(NOW());");
        $sql->execute();
        //Mostrando resultados
        if($sql->rowCount()) {
        ?>
        <table class="table" border="0">
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <th>Añadido por</th>
                <th>Número de árbol</th>
                <th>Especie</th>
                <th>Fecha</th>
            </tr>
        <?php
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
        ?>
        </table>
        </div>
        <?php
        } else {
          echo "<p style='padding-left: 20px;'> No se encontraron registros.</p></div>";
        }?>

        <br><br>

        <div class="form-row">
        <button class="btn btn-sm" data-toggle="collapse" data-target="#divArbolesEntreFechas">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </button>
        <h3>Consultar los árboles creados entre un periodo determinado</h3>
        </div>

        <div id="divArbolesEntreFechas" class="row wow fadeIn collapse">

        <?php 
        //Segunda consulta
        $sql = $conn->prepare("SELECT * FROM censo WHERE SUBSTR(fechaHora, 4, 2) = MONTH(NOW());");
        $sql->execute();
        ?>

        <form id="formBuscarEntreFechas" action="" method="post">
          <div class="form-row">
            <div class="col-md-3">
              <label for="fechaDesde">Desde</label>
            <input type="text" class="form-control" id="fechaDesde" placeholder="" name="fechaDesde" readonly="readonly" required>
            </div>
            <div class="col-md-3">
              <label for="fechaHasta">Hasta</label>
              <input type="text" class="form-control" id="fechaHasta" placeholder="" name="fechaHasta" readonly="readonly" required>
            </div>
            <div class="col-md-2">
              <br>
              <button type="submit" class="btn btn-primary" id="buscarEntreFechas" name="buscarEntreFechas">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="false" 
                style="display: none"></span>
                <span>Buscar</span>
              </button>
            </div>
          </div>
        </form>

        <table id="arbolesEntreFechas" class="table" border="0">
          <thead>
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <th>Añadido por</th>
                <th>Número de árbol</th>
                <th>Especie</th>
                <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sin datos actualmente</td>
            </tr>
          </tbody>
        </table>

        </div>

        <br><br>

        <div class="form-row">
        <button class="btn btn-sm" data-toggle="collapse" data-target="#divArbolesPorUsuario">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </button>
        <h3>Consultar los árboles creados por usuario</h3>
        </div>

        <div id="divArbolesPorUsuario" class="row wow fadeIn collapse">

        <?php 
        //Segunda consulta
        $sql = $conn->prepare("SELECT * FROM censo WHERE SUBSTR(fechaHora, 4, 2) = MONTH(NOW());");
        $sql->execute();
        ?>

        <form id="formBuscarPorUsuario" action="" method="post">
          <div class="form-row">
            <div class="col-md-6">
              <label for="dni"></label>
              <input type="text" placeholder="Ingrese DNI" class="form-control" id="dni" name="dni" placeholder="" required list="sugerenciasDNI" autocomplete="off">
              <datalist id="sugerenciasDNI">
              </datalist>
            </div>
            <div class="col-md-3">
              <br>
              <button type="submit" class="btn btn-primary" id="buscarPorUsuario" name="buscarPorUsuario" 
                style="margin-top: 0px;">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="false" 
                style="display: none;"></span>
                <span>Buscar</span>
              </button>
            </div>
          </div>
        </form>

        <table id="arbolesPorDNI" class="table" border="0">
          <thead>
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <th>DNI</th>
                <th>Fecha</th>
                <th>Especie</th>
                <th>Calle</th>
                <th>Imagen</th>
                <th>Comentarios</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sin datos actualmente</td>
            </tr>
          </tbody>
        </table>

        </div>

        <br><br>

        <div class="form-row">
          <button class="btn btn-sm" data-toggle="collapse" data-target="#divArbolesCaracteristicas">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </button>
          <h3>Consultar árboles por características</h3>
        </div>
        <div id="divArbolesCaracteristicas" class="row wow fadeIn collapse">
          <form id="formBuscarCaracteristicas" action="" method="post">
            <div class="form-row">
              <div class="col-md-12">
                <label for="dni"></label>
                <input type="text" placeholder="DNI usuario (opcional)" class="form-control" id="dni" name="dni" placeholder="" list="sugerenciasDNI2" autocomplete="off">
                <datalist id="sugerenciasDNI2">
                </datalist>
              <div class="col-md-12 custom-control custom-checkbox" style="margin-left: 25px;">
                <br>
                <input type="checkbox" class="custom-control-input" id="tieneDanios" name="tieneDanios" checked>
                <label class="custom-control-label" for="tieneDanios">Daños (SI/NO)</label>
              </div>
              <div class="col-md-12 custom-control custom-checkbox" style="margin-left: 25px;">
                <br>
                <input type="checkbox" class="custom-control-input" id="tieneCazuela" name="tieneCazuela" checked>
                <label class="custom-control-label" for="tieneCazuela">Cazuela (SI/NO)</label>
              </div>
              <div class="col-md-12 custom-control custom-checkbox" style="margin-left: 25px;">
                <br>
                <input type="checkbox" class="custom-control-input" id="tieneLuminaria" name="tieneLuminaria" checked>
                <label class="custom-control-label" for="tieneLuminaria">Luminaria (SI/NO)</label>
              </div>
              <div class="col-md-12 custom-control custom-checkbox" style="margin-left: 25px;">
                <br>
                <input type="checkbox" class="custom-control-input" id="tienePodas" name="tienePodas" checked>
                <label class="custom-control-label" for="tienePodas">Podas (SI/NO)</label>
              </div>
              <div class="col-md-12 custom-control custom-checkbox" style="margin-left: 25px;">
                <br>
                <input type="checkbox" class="custom-control-input" id="tieneCable" name="tieneCable" checked>
                <label class="custom-control-label" for="tieneCable">Cable (SI/NO)</label>
              </div>
              <div class="col-md-3">
                <br>
                <button type="submit" class="btn btn-primary" id="buscarCaracteristicas" name="buscarCaracteristicas"
                  style="margin-top: 0px;">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="false" 
                  style="display: none"></span>
                  <span>Buscar</span>
                </button>
              </div>
            </div>
          </form>

          <br>

          <table id="arbolesPorCaracteristicas" class="table" border="0">
          <thead>
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <th>DNI</th>
                <th>Fecha</th>
                <th>Especie</th>
                <th>Calle</th>
                <th>Comentarios</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sin datos actualmente</td>
            </tr>
          </tbody>
        </table>

        </div>

      <br><br>

        <!-- Modal para mostrar el arbol en resolucion completa -->
        <div class="modal fade" id="arbolmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Arbol completo</h4>
              </div>
              <div class="modal-body">
                <img src="" id="arbolcompleto" style="width: 800px; height: 600px;" >
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <!--/Grid row-->

      <hr class="my-5">

      

      <hr class="mb-5">
      <!--Section: More-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="" target="_blank"
        role="button">Descarga nuestra APP
        <i class="fas fa-download ml-2"></i>
      </a>
      
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

    

      <a href="https://dribbble.com/" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://www.unla.edu.ar" target="_blank"> UNLa </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- DatePicker core JavaScript -->
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>

<script>
$(function () {
    $("#fechaDesde").datepicker();
});
$(function () {
    $("#fechaHasta").datepicker();
});
</script>

<script type="text/javascript">
  //Buscar todos los censos realizados entre dos fechas
  $( "#formBuscarEntreFechas" ).submit(function( event ) {
    //Mostrar spinner de carga de informacion y deshabilitar boton hasta que finalice
    $("#buscarEntreFechas").prop("disabled", true);
    var spinner = $("#buscarEntreFechas").find("span").first();
    spinner.toggle();
    spinner.next().toggle();
    //Variables a utilizar por el AJAX Request
    var fechaDesde = $('#fechaDesde').val();
    var fechaHasta = $('#fechaHasta').val();
    //Variables para validaciones
    var anioDesde = fechaDesde.substring(0, 4);
    var mesDesde = fechaDesde.substring(5, 7);
    var diaDesde = fechaDesde.substring(8, 10);
    var anioHasta = fechaHasta.substring(0, 4);
    var mesHasta = fechaHasta.substring(5, 7);
    var diaHasta = fechaHasta.substring(8, 10);
    
    var desde = new Date(anioDesde, mesDesde-1, diaDesde);
    var hasta = new Date(anioHasta, mesHasta-1, diaHasta);
    //Validaciones
    if(fechaDesde == "" || fechaHasta == ""){
      alert("Es necesario seleccionar las dos fechas");
    }
    else if(desde.getTime() > hasta.getTime()){
      alert("La fecha inicial debe ser anterior a la fecha limite");
    }
    else{
      //Se envian los datos al servidor
      $.ajax({
        method: "POST",
        url: "entreFechasRequest.php",
        data: { fechaDesde: fechaDesde, fechaHasta: fechaHasta }
      })
      .done(function( msg ) {
        //Se agrega la respuesta a la tabla
        $('#arbolesEntreFechas > tbody').html('');
        $('#arbolesEntreFechas > tbody:last-child').append(msg);
      })
      .always(() => {
        spinner.toggle();
        spinner.next().toggle();
        $("#buscarEntreFechas").prop("disabled", false);
      });
    }
    return false;
  });
</script>

<script type="text/javascript">
  //Mostrar sugerencias de dnis al ir escribiendo
  $( "[name='dni']" ).keyup(function( event ) {
    var dni = $(this).val();
    var sugerencias = $(this).closest("div").find("datalist");
    //Variables a utilizar por el AJAX Request
    if(dni.length>2){
      $(sugerencias).show();
      //Se envian los datos al servidor
      $.ajax({
        method: "GET",
        url: "sugerenciasDNI.php",
        data: { dni: dni }
      })
      .done(function( sugerencia ) {
        //Se agrega la respuesta como sugerencia
        $(sugerencias).html('');
        $(sugerencias).append(sugerencia);
        sugerencias.css({"border": "1px solid #A5ACB2"});
      });
    }
    else{
      $(sugerencias).hide();
    }
  });

  $( "#sugerenciasDNI" ).click(function( event ) {
    $('#sugerenciasDNI').hide();
    event.stopPropagation();
  });

  $( "#sugerenciasDNI2" ).click(function( event ) {
    $('#sugerenciasDNI2').hide();
    event.stopPropagation();
  });

  $(window).click(function() {
    $('#sugerenciasDNI').hide();
    $('#sugerenciasDNI2').hide();
  });
</script>

<script type="text/javascript">
  //Buscar todos los censos realizados entre dos fechas
  $( "#formBuscarPorUsuario" ).submit(function( event ) {
    //Mostrar spinner de carga de informacion y deshabilitar boton hasta que finalice
    $("#buscarPorUsuario").prop("disabled", true);
    var spinner = $("#buscarPorUsuario").find("span").first();
    spinner.toggle();
    spinner.next().toggle();
    //Variables a utilizar por el AJAX Request
    var dni = $('#dni').val();
      //Se envian los datos al servidor
      $.ajax({
        method: "POST",
        url: "censosDNIRequest.php",
        data: { dni: dni }
      })
      .done(function( msg ) {
        //Se agrega la respuesta a la tabla
        $('#arbolesPorDNI > tbody').html('');
        $('#arbolesPorDNI > tbody:last-child').append(msg);
      })
      .always(() => {
        spinner.toggle();
        spinner.next().toggle();
        $("#buscarPorUsuario").prop("disabled", false);
      });
    return false;
  });
</script>

<script type="text/javascript">
  //Buscar todos los censos realizados entre dos fechas
  $( "#formBuscarCaracteristicas" ).submit(function( event ) {
    //Mostrar spinner de carga de informacion y deshabilitar boton hasta que finalice
    $("#buscarCaracteristicas").prop("disabled", true);
    var spinner = $("#buscarCaracteristicas").find("span").first();
    spinner.toggle();
    spinner.next().toggle();
    //Variables a utilizar por el AJAX Request
    var dni = $(this).find("#dni").val();
    //Falta estado sanitario (averiguar si es string o bool)
    var danios = $(this).find("#tieneDanios").prop("checked");
    var cazuela = $(this).find("#tieneCazuela").prop("checked");
    var luminaria = $(this).find("#tieneLuminaria").prop("checked");
    var podas = $(this).find("#tienePodas").prop("checked");
    var cable = $(this).find("#tieneCable").prop("checked");
      //Se envian los datos al servidor
      $.ajax({
        method: "POST",
        url: "caracteristicasRequest.php",
        data: { 
          dni: dni, 
          danios: danios, 
          cazuela: cazuela, 
          luminaria: luminaria,
          podas: podas,
          cable: cable
        }
      })
      .done(function( respuesta ) {
        //Se agrega la respuesta a la tabla
        $('#arbolesPorCaracteristicas > tbody').html('');
        $('#arbolesPorCaracteristicas > tbody:last-child').append(respuesta);
      })
      .always(() => {
        spinner.toggle();
        spinner.next().toggle();
        $("#buscarCaracteristicas").prop("disabled", false);
      });
    return false;
  });
</script>

<script type="text/javascript">
  $('#arbolesPorDNI').on("click", "td[name='arbolminiatura']", function(event) {
    var imageSource = $(this).find('img').attr('src');
    $("#arbolcompleto").attr("src", imageSource);
   $('#arbolmodal').modal();
  });
</script>

<style type="text/css">
  .modal-dialog{
    position: relative;
    display: table; /* This is important */ 
    overflow-y: auto;    
    overflow-x: auto;
    width: auto;
    min-width: 300px;   
  }
</style>