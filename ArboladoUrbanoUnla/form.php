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
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  
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
  <body>
    <hr class="my-5" />
    <div class="container">
      <form class="needs-validation" novalidate action="/actionForm.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombreU">Nombre</label>
          <input
            name="nombreU"
            type="text"
            class="form-control"
            id="nombreU"
            placeholder="Ingrese su Nombre"
            required
          />
          <div class="invalid-feedback">
            Por favor ingrese su nombre
          </div>
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input
            name="apellido"
            type="text"
            class="form-control"
            id="apellido"
            placeholder="Ingrese su Apellido"
            required
          />
          <div class="invalid-feedback">
            Por favor ingrese su apellido
          </div>
        </div>
        <div class="form-group">
          <label for="dni">DNI</label>
          <input
            name="dni"
             type="number" step="any"
            class="form-control"
            id="dni"
            placeholder="Ingrese DNI"
            required
          />
          <div class="invalid-feedback">
            Por favor ingrese su DNI
          </div>
        </div>
        <div class="form-group">
          <label for="nombre">Calle</label>
          <input
            name="nombre"
            type="text"
            class="form-control"
            id="nombre"
            placeholder="Ingrese Calle"
          />
        </div>
        <div class="form-group">
          <label for="numeroFrente">número de frente</label>
          <input
            name="numeroFrente"
             type="number" step="any"
            class="form-control"
            id="numeroFrente"
            placeholder="Ingrese el numero de frente"
          />
        </div>
        <div class="form-group">
          <label for="anchoVereda">Ancho de vereda</label>
          <input
            type="number"
            step="any"
            class="form-control"
            id="anchoVereda"
            name="anchoVereda"
            placeholder="Ingrese el ancho de la vereda (cm)"
          />
        </div>
        <div class="form-group">
          <label for="paridad">Paridad</label>
          <select class="custom-select" id="paridad" name="paridad">
            <option selected disabled value="">Elija Paridad</option>
            <option>Paridad</option>
            <option>PAR</option>
            <option>IMPAR</option>
          </select>
        </div>
        <div class="form-group">
          <label for="transito">Transito</label>
          <select class="custom-select" id="transito" name="transito">
            <option selected disabled value=""
              >Elija el tipo de Transito</option
            >
			<option>Transito</option>
            <option>PESADO</option>
            <option>PARTICULAR</option>
          </select>
        </div>
        <div class="form-group">
          <label for="especie">Especie</label>
          <select class="custom-select" id="especie" name="especie" >
            <option selected disabled value="">Especie</option>
            <option>OTRO</option>
            <option>Desconocido</option>
            <option>Alamo carolina</option>
            <option>Alamo de Italia</option>
            <option>Alamo negro del Canada</option>
            <option>Alamo plateado</option>
            <option>Arbol del amor (Ciclamor o Arbol de Judas)</option>
            <option>Arbol del cielo (Ailanto o Arbol de los dioses)</option>
            <option>Arbol del humo</option>
            <option>Arbol fuccia</option>
            <option>Abedul blanco</option>
            <option>Abedul comun (Abedul de Europa o Abedul verrugoso)</option>
            <option>Abutilo</option>
            <option>Acacia</option>
            <option>Acacia blanca</option>
            <option>Acacia bola</option>
            <option>Acacia de Baile (Mimosa de Baile)</option>
            <option>Acacia de constantinopla</option>
            <option>Acacia frisia</option>
            <option>Acacia negra</option>
            <option>Acacia rosada</option>
            <option>Acacia verde</option>
            <option>Adelfa amarilla</option>
            <option>Aesculus</option>
            <option>Afrocarpus</option>
            <option>Agatis blanco</option>
            <option>Agave vivipara</option>
            <option>Aguaribay</option>
            <option>Ahuehuete</option>
            <option>Alamo</option>
            <option>Alamo negro</option>
            <option>Alcanforero</option>
            <option>Alcornoque</option>
            <option>Algarrobo</option>
            <option>Algarrobo Blanco</option>
            <option>Aliso de ra¬o</option>
            <option>Almez (Almecino o Almecina)</option>
            <option>Almez de china</option>
            <option>Añangapira¬ (Grosella o Cereza de Cayena)</option>
            <option>Aralia</option>
            <option>Aralia elegantisima</option>
            <option>Aralia variegada</option>
            <option>Araucaria</option>
            <option>Araucaria (Araucaria de pisos)</option>
            <option>Araucaria columnar</option>
            <option>Arbol de las orquideas</option>
            <option>Arbol de las pasas</option>
            <option>Arbol del pomelo</option>
            <option>Arce</option>
            <option>Arce blanco</option>
            <option>Arce campestre (Arce comun o Arce menor)</option>
            <option>Arce japones</option>
            <option>Arce negundo</option>
            <option>Arce plateado (Arce blanco)</option>
            <option>Arce real</option>
            <option>Arce tridente</option>
            <option>Areca</option>
            <option>Arizanica (Cipres de Arizona)</option>
            <option>Aromo</option>
            <option>ArrayAn (Anacahuita)</option>
            <option>Aruera</option>
            <option>Avellano comun</option>
            <option>Azarero</option>
            <option>Bananero</option>
            <option>Betula</option>
            <option>Boj cepillo</option>
            <option>Boj comun</option>
            <option>Bola de nieve</option>
            <option>Boungavillea</option>
            <option>Brachichito rosa</option>
            <option>Brachichiton (Arbol botella Brachichito)</option>
            <option>Braquiquito</option>
            <option>Bunya-bunya (Araucaria de Bidwill)</option>
            <option>Caesalpinia</option>
            <option>Callistemon</option>
            <option>Camelia</option>
            <option>camellia</option>
            <option>Canela de venado</option>
            <option>Canelan</option>
            <option>Caoba del sur</option>
            <option>Capparis</option>
            <option>Caqui</option>
            <option>Caranday</option>
            <option>Carnaval(Vainillo)</option>
            <option>Casia (Rama negra)</option>
            <option>Cassia</option>
            <option>Castaño de Indias comun</option>
            <option>Casuarina</option>
            <option>Catalpa</option>
            <option>Catalpa</option>
            <option>Cedrela</option>
            <option>Cedro</option>
            <option>Cedro azulado</option>
            <option>Cedro blanco de California</option>
            <option>Cedro de San Juan</option>
            <option>Cedro del Atlas (Cedro plateado)</option>
            <option>Cedro del Himalaya</option>
            <option>Cedro del Himalaya variedad aurea</option>
            <option>Cedro del LA¬bano (Cedro de Salomon)</option>
            <option>Cedro misionero (Cedro colorado)</option>
            <option>Cefalotaxus</option>
            <option>Ceibo</option>
            <option>Ceibo</option>
            <option>Ceibo del monte</option>
            <option>Celtis tala</option>
            <option>Celtis tala</option>
            <option>Cerella</option>
            <option>Cerezo</option>
            <option>Chal Chal</option>
            <option>Chamaecyparis</option>
            <option>Cheflera</option>
            <option>Cica</option>
            <option>Cina cina</option>
            <option>Cinnamomun</option>
            <option>Cipres</option>
            <option>Cipres blanco</option>
            <option>Cipres fanebre (Lloron chino)</option>
            <option>Cipres funerario</option>
            <option>Cipres horizontal</option>
            <option>Cipres leylandi</option>
            <option>Cipres piramidal</option>
            <option>Cipres</option>
            <option>Cipres calvo</option>
            <option>Ciruelo</option>
            <option>Ciruelo de jardin</option>
            <option>Citricos</option>
            <option>Coculus</option>
            <option>Corona de cristo</option>
            <option>Coronillo</option>
            <option>Cotoneaster</option>
            <option>Cotoneaster</option>
            <option>Cotoneaster</option>
            <option>Crataegus</option>
            <option>Crataegus</option>
            <option>Crespon </option>
            <option>Criptomeria (Cedro del Japon)</option>
            <option>Curupa</option>
            <option>Dracena indivisa</option>
            <option>Dracena marginata</option>
            <option>dracaena</option>
            <option>Duranta</option>
            <option>Duranta variedad aurea</option>
            <option>Durazno</option>
            <option>El chañar</option>
            <option>Eleagno</option>
            <option>Eleagnus</option>
            <option>Encina</option>
            <option>Enebro comun</option>
            <option>Enterolobium</option>
            <option>Espina del bañado</option>
            <option>Espinillo (Aromo)</option>
            <option>Espino de fuego</option>
            <option>Espino de fuego</option>
            <option>Esterculea</option>
            <option>Estrella federal</option>
            <option>Eucalipto</option>
            <option>Eucalipto</option>
            <option>Eucalipto (Eucalipto comun)</option>
            <option>Eucalipto cinerea</option>
            <option>Eucalipto saligna</option>
            <option>Eucalipto sideroxylon</option>
            <option>Eucalipto tereticornis</option>
            <option>Euforbia</option>
            <option>Euphorbia</option>
            <option>Falso Alcanforero</option>
            <option>Falso alerce</option>
            <option>Falso cafeto</option>
            <option>Falso cipres de Lawson</option>
            <option>Falso Guayabo (Guayaba del Brasil)</option>
            <option>Fenix</option>
            <option>Fenix</option>
            <option>Fenix paludosa</option>
            <option>Ficus</option>
            <option>Ficus</option>
            <option>Ficus ali</option>
            <option
              >Ficus herrumbroso (Ficus oxidado o Higuera herrumbrosa)</option
            >
            <option>Ficus variegado</option>
            <option>Firmiana</option>
            <option>Fotinia</option>
            <option>Fotinia</option>
            <option>Fotinia</option>
            <option>Fresno</option>
            <option>Fresno (Fresno comun)</option>
            <option>Fresno americano</option>
            <option>Ginkgo</option>
            <option>Gomero</option>
            <option>Granado</option>
            <option>Grevillea</option>
            <option>Guabiyi</option>
            <option>Guaran amarillo</option>
            <option>Guayabo</option>
            <option>Guayaibi</option>
            <option>Hibiscus</option>
            <option>Higuera</option>
            <option>Higuera de Baha¬a</option>
            <option>Higueron</option>
            <option>IbirA pitA</option>
            <option>Ilex</option>
            <option>Inga</option>
            <option>Jazmin</option>
            <option>Jazmin del Paraguay</option>
            <option>Jazmin naranja</option>
            <option>Juglans</option>
            <option>Juniperus</option>
            <option>Juniperus</option>
            <option>Kauri de corteza lisa</option>
            <option>Lagunaria (Arbol pica-pica)</option>
            <option>Lapachillo</option>
            <option>Lapacho</option>
            <option>Lapacho amarillo</option>
            <option>Lapacho negro</option>
            <option>Lapacho rosado</option>
            <option>Laurel</option>
            <option>Laurel blanco</option>
            <option>Laurel cerezo</option>
            <option>Laurel de indias</option>
            <option>Laurel de jardin (Laurel de flor)</option>
            <option>Laurel del rio</option>
            <option>Laurus</option>
            <option>Libocedro (Calocedro)</option>
            <option>Libocedrus</option>
            <option>Ligustrina</option>
            <option>Ligustrina de California</option>
            <option>Ligustro</option>
            <option>Ligustro disciplinado (Ligustro variegado)</option>
            <option>Ligustrum</option>
            <option>Limonero</option>
            <option>Limpiatubos</option>
            <option>Liquidambar </option
            ><option>Livistona de China (Palmera china de abanico)</option>
            <option>Macrocarpa </option>
            <option>Magnolia</option>
            <option>Magnolia</option>
            <option>Malus</option>
            <option>Mandarino</option>
            <option>Mataojos</option>
            <option>Membrillero</option>
            <option>Mimosa (Aromo frances)</option>
            <option>Mirto</option>
            <option>Morera blanca</option>
            <option>Morera de papel (Moral de China)</option>
            <option>Morera negra</option>
            <option>Morera pendula</option>
            <option>Morus</option>
            <option>Naranjillo</option>
            <option>Naranjo amargo</option>
            <option>Naranjo de Luisana</option>
            <option>Naranjo dulce</option>
            <option>Nerium</option>
            <option>Nipero japones</option>
            <option>No Determinado</option>
            <option>Nogal americano</option>
            <option>Nogal criollo</option>
            <option>Nogal europeo (Nogal comun)</option>
            <option>Nolina</option>
            <option>Olea</option>
            <option>Olivo</option>
            <option>Olivo oloroso</option>
            <option>Olmo</option>
            <option>Olmo</option>
            <option>Olmo de montaña</option>
            <option>Olmo europeo</option>
            <option>Ombu</option>
            <option>Ombu</option>
            <option>PA¡tano de Oriente (PAtano oriental)</option>
            <option>Palma Bangalow (Palma Rey)</option>
            <option>Palma de california</option>
            <option>Palmera china</option>
            <option>Palmera del senegal</option>
            <option>Palmera enana</option>
            <option>Palmito</option>
            <option>Palo amarillo</option>
            <option>Palo amarillo</option>
            <option>Palo borracho</option>
            <option>Palo borracho blanco</option>
            <option>Palo borracho rosado</option>
            <option>Palo coca</option>
            <option>Palto</option>
            <option>Paraiso</option>
            <option>Paraiso umbraculifera</option>
            <option>Parasol de la china</option>
            <option>Pata de vaca (Pezuña de vaca)</option>
            <option>Paulonia (Arbol de la emperatriz)</option>
            <option>Pecan</option>
            <option>Peltophorum</option>
            <option>Peral comun</option>
            <option>Phyllanthus</option>
            <option>Picea</option>
            <option>Pindo</option>
            <option>Pino</option>
            <option>Pino</option>
            <option>Pino carrasco (Pino de Jerusalen)</option>
            <option>Pino de las canarias</option>
            <option>Pino de Siberia</option>
            <option>Pino del ParanA (Pino de Misiones o Pino de Brasil)</option>
            <option>Pino piñonero</option>
            <option>Pino rodeno</option>
            <option>PlAtano</option>
            <option>Plumerillo rojo</option>
            <option>Podocarpus</option>
            <option>Poinciana (Caesalpinia o Barba de chivo)</option>
            <option>Prosopis</option>
            <option>Prunus</option>
            <option>Quebracho colorado</option>
            <option>Quinoto</option>
            <option>Rafis (Palmerita china)</option>
            <option>Robinia</option>
            <option>Roble</option>
            <option>Roble americano</option>
            <option>Roble comun</option>
            <option>Roble palustre</option>
            <option>Roble sedoso (Grevillea)</option>
            <option>Robusta</option>
            <option>Rosa de China (Hibisco)</option>
            <option>Rosa de mayo</option>
            <option>Rosa de Siria</option>
            <option>Ruprechtia</option>
            <option>Rus</option>
            <option>Safora japonica</option>
            <option>Safora pandula</option>
            <option>Sambucus</option>
            <option>Sauce</option>
            <option>Sauce blanco</option>
            <option>Sauce blanco variedad tristis</option>
            <option>Sauce criollo</option>
            <option>Sauce electrico</option>
            <option>Sauce lloron</option>
            <option>Sauzgatillo</option>
            <option>Schinus</option>
            <option>Secuoya</option>
            <option>Sesbania</option>
            <option>Siempreverde</option>
            <option>Sota Caballo</option>
            <option>Tabaco ornamental</option>
            <option>Tabaquillo</option>
            <option>Taxodium</option>
            <option>Taxus</option>
            <option>Tejo chino</option>
            <option>Tilo</option>
            <option>Tilo</option>
            <option>Timba (Oreja de negro)</option>
            <option>Tipa blanca</option>
            <option>Trachycarpus</option>
            <option>Trichilia</option>
            <option>Tuja</option>
            <option>Tulipanero</option>
            <option>Tuya</option>
            <option>Tuya oriental</option>
            <option>Viburnum</option>
            <option>Viburnum dulce</option>
            <option>Virara (Virara crespo)</option>
            <option>Visco (Viscote Arca)</option>
            <option>Washingtonia</option>
            <option>washingtonia</option>
            <option>Washingtonia (Palmera)</option>
            <option>Yuca</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor para la especie
          </div>
        </div>
        <div class="form-group">
          <label for="numeroArbol">Numero del Arbol</label>
          <input
            name="numeroArbol"
            type="number" step="any"
            class="form-control"
            id="numeroArbol"
            placeholder="Ingrese el numero del arbol"
            required
          />
          <div class="invalid-feedback">
            Por favor ingrese el numero de árbol
          </div>
        </div>
        <div class="form-group">
          <label for="distanciaEntrePlantas">Distancia entre plantas</label>
          <input
            name="distanciaEntrePlantas"
            type="number" step="any"
            class="form-control"
            id="distanciaEntrePlantas"
            placeholder="Ingrese distancia (cm)"
          />
        </div>
        <div class="form-group">
          <label for="distanciaAlMuro">Distancia al Muro</label>
          <input
            name="distanciaAlMuro"
            type="number" step="any"
            class="form-control"
            id="distanciaAlMuro"
            placeholder="Ingrese distancia al muro (cm)"
          />
        </div>
        <div class="form-group">
          <label for="diametro">Diametro</label>
          <input
            name="diametro"
            type="number" step="any"
            class="form-control"
            id="diametro"
            placeholder="Ingrese el diametro (cm)"
          />
        </div>
        <div class="form-group">
          <label for="altura">Altura</label>
          <input
            name="altura"
            type="number" step="any"
            class="form-control"
            id="altura"
            placeholder="Ingrese la altura (cm)"
            
          />
         
        </div>
		
        <div class="form-group">
          <label for="cordon">Cordon</label>
          <input
            name="cordon"
            type="number" step="any"
            class="form-control"
            id="cordon"
            placeholder="Cordon (cm)"
       
          />
         
        </div>
        <div class="form-group">
          <label for="circunferenciaDelArbol">Circunferencia del arbol</label>
          <input
            name="circunferenciaDelArbol"
             type="number" step="any"
            class="form-control"
            id="circunferenciaDelArbol"
            placeholder="Ingrese la circunferencia del arbol (cm)"
          />
        </div> 
        <div class="form-group">
          <label for="cazuela">Cazuela</label>
          <select class="custom-select" id="cazuela" name="cazuela">
            <option selected disabled value="">Cazuela</option>
            <option>SI</option>
            <option>NO</option>
          </select>
        </div>
		
        <div class="form-group">
          <label for="raices">Raices</label>
          <select class="custom-select" id="raices" name="raices" >
            <option selected disabled value="">NORMAL</option>
            <option>20%</option>
            <option>40%</option>
            <option>60%</option>
            <option>80%</option>
            <option>100%</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
		
		
        <div class="form-group">
          <label for="superficie">Superficie afectada</label>
		  <select class="custom-select" id="raices" name="raices" >
            <option selected disabled value="">Metros Cuadrados:</option>
            <option><1</option>
            <option><2</option>
            <option><4</option>
            <option><5</option>
            <option>>5</option>
			<option>>10</option>
          </select>
		  
		
          <div class="invalid-feedback">
            Por favor ingrese la superficie afectada
          </div>
        </div>
        <div class="form-group">
          <label for="afecto">Afecto</label>
          <select class="custom-select" id="raices" name="afecto" >
            <option selected disabled value="">Afecto</option>
            <option>Caños</option>
            <option>Desagües</option>
            <option>Paredes</option>
            <option>Piso</option>
            <option>Otro</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="estadoSanitario">Estado sanitario</label>
          <select class="custom-select" id="estadoSanitario" name="estadoSanitario">
            <option selected disabled value="">Estado Sanitario</option>
            <option>S</option>
            <option>D</option>
            <option>M</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="inclinacion">Inclinacion</label>
          <select class="custom-select" id="inclinacion" name="inclinacion">
            <option selected disabled value="">Inclinacion</option>
            <option>NO</option>
            <option>LI</option>
            <option>MI</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="cable">Cables</label>
          <select class="custom-select" id="cable" name="cable">
            <option selected disabled value="">Cables</option>
            <option>PD</option>
            <option>PE</option>
            <option>IA</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="luminaria">Luminaria</label>
          <select class="custom-select" id="luminaria" name="luminaria">
            <option selected disabled value="">Luminaria</option>
            <option>PD</option>
            <option>PE</option>
            <option>IA</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="ahuecamiento">Ahuecamiento</label>
          <input
            name="ahuecamiento"
            type="text"
            class="form-control"
            id="ahuecamiento"
            placeholder="Ingrese el ahuecamiento"
          />
        </div>
        <div class="form-group">
          <label for="danios">Daños</label>
          <select class="custom-select" id="danios" name="danios" >
            <option selected disabled value="">Daños</option>
            <option>SI</option>
            <option>NO</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="veredas">Daños a veredas</label>
          <select class="custom-select" id="veredas" name="veredas" >
            <option selected disabled value="">Daños a veredas</option>
            <option>NO</option>
            <option>L</option>
            <option>I</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="podas">Podas</label>
          <select class="custom-select" id="podas" name="podas" >
            <option selected disabled value="">Podas</option>
            <option>NO</option>
            <option>L</option>
            <option>S</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="latitud">Latitud</label>
          <input
            name="latitud"
            type="text"
            class="form-control"
            id="latitud"
            placeholder="Ingrese la latitud"
            required
          />
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <label for="longitud">Longitud</label>
          <input
            name="longitud"
             type="number" step="any"
            class="form-control"
            id="longitud"
            placeholder="Ingrese la longitud"
            required
          />
          <div class="invalid-feedback">
            Por favor seleccione un valor
          </div>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input name="image[]" type="file" class="custom-file-input" id="image" multiple required>
            <label class="custom-file-label" for="image">Elija una imagen jpg - png - jpeg - gif</label>
            <div class="invalid-feedback">Elija un formato valido</div>
          </div>
        </div>
        <div class="form-group">
          <label for="comentario">Comentario</label>
          <textarea class="form-control" id="comentario" rows="3" name="comentario"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar datos</button>
        <input  hidden name="fechaHora" value="<?php echo date(
          'd/m/Y H:i:s'
        ); ?>" readonly="readonly">

      </form>
    </div>
    <script>
      (function() {
        'use strict';
        window.addEventListener(
          'load',
          function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener(
                'submit',
                function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                },
                false
              );
            });
          },
          false
        );
      })();

      window.onload = function() {
        $('input[type="file"]').on("change", function() {
        let filenames = [];
        let files = document.getElementById("image").files;
        if (files.length > 1) {
          filenames.push("Archivos Seleccionados (" + files.length + ")");
        } else {
          for (let i in files) {
            if (files.hasOwnProperty(i)) {
              filenames.push(files[i].name);
            }
          }
        }
        $(this)
          .next(".custom-file-label")
          .html(filenames.join(","));
      });
    }   
    </script>




<?php include 'footer.php'; ?>

  </body>
</html>
