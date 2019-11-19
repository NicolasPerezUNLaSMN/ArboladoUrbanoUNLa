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
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
    
  
  
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
		
		
		
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		
		
	<style>
		html, body {
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
            <a class="nav-link" href="https://1drv.ms/u/s!AgB0dw0E7wKakawoPEO77-A-VB25Iw?e=YDSbUn" target="_blank">Descarga nuesta APP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" target="_blank">Tutoriales</a>
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
            <a href="https://github.com/NicolasPerezUNLaSMN/ArboladoUrbanoUNLa" class="nav-link border border-light rounded"
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
  
    <div class="container">

      

      <hr class="my-5">

      <!--Section: Main features & Quick Start-->
      <section>

        <h3 class="h3 text-center mb-5">Censos realizados</h3>

        <!--Grid row-->
        <div class="row wow fadeIn">

          

          <!--Grid column-->
          
          
          			              
                    
		          

		<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
		    type: 'doughnut',
		    data:{
			datasets: [{
				data: [60,18,10, 8, 4],
				backgroundColor: ['#42a5f5', 'red', 'green','blue','violet'],
				label: 'Comparacion de navegadores'}],
				labels: ['Google Chrome','Safari','Edge','Firefox','Opera']},
		    options: {responsive: true}
		});
		</script>

          
          
          
        					     					          
		
         <div id='map'></div>


		<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
		<script src="../src/leaflet-gps.js"></script>

	 			<script>
	        var cities = L.layerGroup();
	        
	        
		        var blueIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-blue.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var redIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-red.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var greenIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-green.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var orangeIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-orange.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var yellowIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-yellow.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var violetIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-violet.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var greyIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-grey.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	
	var blackIcon = new L.Icon({
		iconUrl: 'img/marker-icon-2x-black.png',
		shadowUrl: 'img/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});


	        
	     
	        
	        
	             <?php
					
					
					$servername = "localhost";
					$username = "id11206201_mipc_24624265";
					$password = "arboladoroot";
					$database = "id11206201_mipc_24624265_arbolado";
					
					$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
					
					$sql = $conn->prepare("SELECT `censo`.*, `arbol`.*, `calle`.*, `coordenada`.*, `estadodelarbol`.*, `imagen`.*, `usuario`.* FROM `censo` LEFT JOIN `arbol` ON `arbol`.`idCenso` = `censo`.`idCenso` LEFT JOIN `calle` ON `calle`.`idCenso` = `censo`.`idCenso` LEFT JOIN `coordenada` ON `coordenada`.`idCenso` = `censo`.`idCenso` LEFT JOIN `estadodelarbol` ON `estadodelarbol`.`idCenso` = `censo`.`idCenso` LEFT JOIN `imagen` ON `imagen`.`idCenso` = `censo`.`idCenso` LEFT JOIN `usuario` ON `usuario`.`idCenso` = `censo`.`idCenso`");
					$sql->execute();
					
					if($sql->rowCount()) {
						while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 

					?>
					
					var lat = <?php echo $row['latitud'];?>;
					var lon = <?php echo $row['longitud'];?>;
					var fecha = '<?php echo $row['fechaHora'];?>';
					var imagen = '<img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['img']);?>"/>';
					var usuario = '<?php echo $row['nombre'];?>';
					var especie = '<?php echo $row['especie'];?>';
					
					var comentario = '<?php echo $row['comentario'];?>';
					var estadoSanitario = '<?php echo $row['estadoSanitario'];?>';
					
									
					
										
				
					if(especie == 'Especie' ||especie =='DESCONOCIDA'){									


                        if(estadoSanitario =='D'){
                           L.marker([ lat,lon], {icon: redIcon}).bindPopup("<b>Latitud: </b>" +lat + "&nbsp&nbsp<b>Longitud: </b>" + lon  +"<br><b>Usuario: </b>" +usuario +"<b>&nbsp&nbspEspecie: </b>" +especie +"<br>"+imagen+"<br><b>Comentario opcional: </b><br>" +comentario+"<br><br>" +"<canvas id="myChart"></canvas>" ).addTo(cities);  
                        }else{
					   L.marker([ lat,lon], {icon: orangeIcon}).bindPopup("<b>Latitud: </b>" +lat + "&nbsp&nbsp<b>Longitud: </b>" + lon  +"<br><b>Usuario: </b>" +usuario +"<b>&nbsp&nbspEspecie: </b>" +especie +"<br>"+imagen+"<br><b>Comentario opcional: </b><br>" +comentario+"<br><br>" +"<canvas id="myChart"></canvas>").addTo(cities);
                            
                        }
					    
					}else {
					    if(estadoSanitario =='D'){
                           L.marker([ lat,lon], {icon: redIcon}).bindPopup("<b>Latitud: </b>" +lat + "&nbsp&nbsp<b>Longitud: </b>" + lon  +"<br><b>Usuario: </b>" +usuario +"<b>&nbsp&nbspEspecie: </b>" +especie +"<br>"+imagen+"<br><b>Comentario opcional: </b><br>" +comentario+"<br><br>"+"<canvas id="myChart"></canvas>" ).addTo(cities);  
                        }else{
					    
					   L.marker([ lat,lon], {icon: greenIcon}).bindPopup("<b>Latitud: </b>" +lat + "&nbsp&nbsp<b>Longitud: </b>" + lon  +"<br><b>Usuario: </b>" +usuario +"<b>&nbsp&nbspEspecie: </b>" +especie +"<br>"+imagen+"<br><b>Comentario opcional: </b><br>" +comentario +"<br><br>"+"<canvas id="myChart"></canvas>" ).addTo(cities); 
					    
					}
					}
					
					
					
					
					
					
						<?php
						}
					
					
					
				
					} else {
					
					    print('No se puede acceder a los datos, reintente en unos minutos.');
					
					}?>
					
					
				


			
	
				var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> desarrollado por , ' +
						'<a href="https://www.unla.edu.ar">UNLA</a>, ' +
						'Map: Â© <a href="https://www.mapbox.com/">Mapbox</a>',
					mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
			
				var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
					streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
					
					
					
					var HikeBike_HikeBike = L.tileLayer('https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png', {
						maxZoom: 19,
						attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
					});
					
			
				var map = L.map('map', {
					center: [-34.7291, -58.3870],
					zoom: 15,
					layers: [HikeBike_HikeBike, cities]
				});
				
				
			

			
				var baseLayers = {
					"Grayscale": grayscale,
					"Streets": streets,
					"Local": HikeBike_HikeBike
				};
			
				var overlays = {
					"Censos": cities
				};
			
				L.control.layers(baseLayers, overlays).addTo(map);
			</script>

					
		



          <!--/Grid column-->

        </div>
        <!--/Grid row-->

      </section>
      <!--Section: Main features & Quick Start-->

      <hr class="my-5">

      

      <hr class="mb-5">

      <!--Section: More-->
      <section>

        <h2 class="my-5 h3 text-center">...opciones</h2>

        <!--First row-->
        <div class="row features-small mt-5 wow fadeIn">

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fab fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2 pl-3">
                <h5 class="feature-title font-bold mb-1">Navega por nuestra Web</h5>
                <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge, son alguno de los navegadores que te permitiraÃƒÂ¡n utilizar nuestros servicios.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-level-up-alt fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">ÃƒÅ¡ltimas mejoras</h5>
                <p class="grey-text mt-2">Consulte las ultimas opciones que le hemos agregado o mejorado al servicio.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-comments fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Comunicate con nosotros</h5>
                <p class="grey-text mt-2">Esperamos tu interacciÃƒÂ³n pronto.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Ã‚Â¿AÃƒÂºn no tiene cuenta?</h5>
                <p class="grey-text mt-2">Si te interesa tener permisos especiales sobre nuestra Web, ingresa aquÃƒÂ­.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

        </div>
        <!--/First row-->

      

        

        
       

      </section>
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

      <a href="https://github.com/NicolasPerezUNLaSMN/ArboladoUrbanoUNLa" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      Ã‚Â© 2019 Copyright:
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
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
