<?php
	session_start();
if($_SESSION['tipo']!=1){
    header ("Location: index.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">
  <meta name="description" content="descripcion" />
  <meta name="keywords" content="preservacion" />
  <title>Publicación de nueva colección | Preservación Digital</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">
 
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CRaleway:600,400%7CHind' rel='stylesheet'>
  
  <link rel="stylesheet" href="../../themes/css/settings.css" />
  <link rel="stylesheet" href="../../themes/css/rev-slider.css" />
  <link rel="stylesheet" href="../../themes/css/font-icons.css" />
  <link rel="stylesheet" href="../../themes/css/sliders.css" /> 
  <link rel="stylesheet" href="../../themes/css/style.css" />
  <link rel="stylesheet" href="../../themes/css/responsive.css" />
  <link rel="stylesheet" href="../../themes/css/spacings.css" />
  <link rel="stylesheet" href="../../themes/css/animate.min.css" />
  <link rel="shortcut icon" href="../../themes/img/gral/ico.png">
  <link rel="apple-touch-icon" href="../../themes/img/gral/ico.png">

    
  <style type="text/css">
   .invisible {display:none }
   .invisibleOp {opacity: 0}
   
  </style>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
  <script src="change.js" type="text/javascript"></script>
  
  
  
</head>

<body>

 <div class="main-wrapper oh">
  <section class="section-wrap" id="register">

   <div class="container">
    <div class="row">
     <div class="">
      <center><br /><br /><br /><br />
      <img src="../../themes/img/gral/logo-black.png" />
      <br /><br />
      <form class="relative" id="formulario" name="formulario" action="guardar_coleccion.php"  method="POST" enctype="multipart/form-data">
       
       <div class="col-sm-6">
        <label class="left text-left">Autor:</label>
        <select id="autor" name="autor" REQUIRED>
  		 <option value="Miguel Ángel Aleman">Miguel Ángel Aleman</option>
		 <option value="Tzutzumatzin Soto Cortés">Tzutzumatzin Soto Cortés</option>
		 <option value="Ulises Valderrama">Ulises Valderrama</option>
		 <option value="Israel Gardida">Israel Gardida</option>
		</select>
        
       </div>
       <div class="col-sm-6">
        <label class="invisibleOp left text-left">Usuario:</label>
        <input class="invisibleOp" type="text" REQUIRED id="usuario" name="usuario" value="Administrador"/><br /><br />
       </div>
       <div class="col-sm-6">
        <label class="left text-left">Grupo:</label>
        <select id="grupo" name="grupo" onchange="cambia()" REQUIRED>
          <option value="0">Seleccione su grupo</option>
          <option value="1">Las fiestas del pueblo</option>
          <option value="2">Vida cotidiana</option>
          <option value="3">Arquitectura y paisaje</option>
        </select>
       </div>
       <div class="col-sm-6">
        <label class="left text-left">Serie:</label>
        <select id="serie" name="serie" REQUIRED>
          <option value="-">-</option>
        </select><br /><br />
       </div>
       
	   <div class="col-sm-12">
        <label class="left text-left">Título de la colección:</label>
        <input type="text" REQUIRED name="coleccion" placeholder="Título de la colección" value=""/><br /><br />
       </div>
       <div class="col-sm-6">
        <label class="left text-left">Fecha de toma: <i>(formato dd/mm/aaaa)</i></label>
        <input type="text" REQUIRED name="fecha" placeholder="Fecha de la toma" value=""/><br /><br />
       </div>
       <div class="col-sm-6">
        <label class="left text-left">Lugar de la toma: </label>
        <input type="text" REQUIRED name="lugar" placeholder="Lugar de la toma..." value=""/><br /><br />
       </div>
       <div>
        <label class="left text-left">Descripción de colección: <span><i>(máximo 200 caracteres)</i></span></label>
        <input type="text" REQUIRED name="descripcion" placeholder="Describe tu colección..." value=""/><br /><br />
       </div>
      
      <label class="left text-left">Selecciona tus imágenes <span><i>(una a una. máximo 25 imágenes)</i></span></label>
      <input class="button" type="file" REQUIRED id="img1" name="img1" /><br />
      <input class="button invisible" type="file" id="img2" name="img2" />
      <input class="button invisible" type="file" id="img3" name="img3" />
      <input class="button invisible" type="file" id="img4" name="img4" />
      <input class="button invisible" type="file" id="img5" name="img5" />
      <input class="button invisible" type="file" id="img6" name="img6" />
      <input class="button invisible" type="file" id="img7" name="img7" />
      <input class="button invisible" type="file" id="img8" name="img8" />
      <input class="button invisible" type="file" id="img9" name="img9" />
      <input class="button invisible" type="file" id="img10" name="img10" />
      <input class="button invisible" type="file" id="img11" name="img11" />
      <input class="button invisible" type="file" id="img12" name="img12" />
      <input class="button invisible" type="file" id="img13" name="img13" />
      <input class="button invisible" type="file" id="img14" name="img14" />
      <input class="button invisible" type="file" id="img15" name="img15" />
      <input class="button invisible" type="file" id="img16" name="img16" />
      <input class="button invisible" type="file" id="img17" name="img17" />
      <input class="button invisible" type="file" id="img18" name="img18" />
      <input class="button invisible" type="file" id="img19" name="img19" />
      <input class="button invisible" type="file" id="img20" name="img20" />
      <input class="button invisible" type="file" id="img21" name="img21" />
      <input class="button invisible" type="file" id="img22" name="img22" />
      <input class="button invisible" type="file" id="img23" name="img23" />
      <input class="button invisible" type="file" id="img24" name="img24" />
      <input class="button invisible" type="file" id="img25" name="img25" />
       
      <br /><br />
      
      
       
      
      <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="btn" value="Guardar"/>
     </form>
     
     <script type="text/javascript">
	  var serie_1 = new Array ("-","Altar","Arreglo floral","Baile","Banda","Cambio de mayordomia Niñopa","Castillo","Chinelo (s)","Chirimia","Cohete","Comida de fiesta","Conjunto musical","Danza","Dj","Domingo de ramos","Estandarte","Imagen religiosa","Jaripeo","Judas","Juego mecánico","Marimba","Matraca","Mayordomo (s)","Misa","Mogiganga","Música","Norteños","Ofrenda de muertos","Padrino","Pan de fiesta","Papel picado","Pelea de gallo","Pregrinación (ir a ver al santo)","Portada","Procesión (pasear al santo)","Puesto de feria","Sonidero","Tapete de aserrín","Torito","Utensilio de cocina");
	  var serie_2 = new Array ("-","Acocote","Accidente","Amanecer","Basura","Bicicleta","Bicitaxi","Carro","Comida","Dulce tradicional","Familia","Fruta","Huelemoles","Maguey","Manifestación","Marchante","Mercado","Niño Dios","Preparación de comida","Pulque","Remero","Santo","Sismo","Solsticio","Tejedor","Tlachiquero","Tulero","Virgen" );
	  var serie_3 = new Array ("-","Agua","Ahuehuete (sauce)","Ahuejote","Asentamiento irregular","Calle","Callejón","Canal","Capilla","Capilla posa","Capillita","Casa","Centro cultural","Cerro","Chinampa","Contaminación","Fauna","Iglesia","Local comercial","Mercado","Milpa","Montaña","Monumento","Panteón","Portales","Pulquería","Río","Trajinera","Zona arqueológica" );
	  
	   function cambia(){
			var grupo;
			grupo = document.formulario.grupo[document.formulario.grupo.selectedIndex].value;   
			if(grupo!=0){
				mis_series = eval("serie_" + grupo);
				num_series = mis_series.length;
				document.formulario.serie.length = num_series;
				
				for(i=0; i<num_series; i++){
					document.formulario.serie.options[i].value = mis_series[i];
					document.formulario.serie.options[i].text = mis_series[i];
				}
			}else{
			 	document.formulario.serie.length = 1;
				document.formulario.serie.options[0].value="-";
				document.formulario.serie.options[0].text="-";
			 }
			 
			 document.formulario.serie.options[0].selected = true;
	   }
	   
	 </script>
     
     <br />
     <div class="text-medium" id="respuesta"></div><br /><br />
     <div id="vista-previa"></div>
     
    
    </center>

   </div>
  </div>
 </div> 
  
  </section>
 </div>

</body>
</html>


