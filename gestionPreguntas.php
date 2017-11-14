<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body onbeforeunload="restarConectados();">
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registrar.php" >Registrarse</a></span>
      		<span class="right"><a href="login.php" >Login</a></span>
          <span class="logueadoDatos" id="logueadoImagen"></span></br></br>
          <span class="logueadoDatos"><label id = "usuarioMostrar"/></span>
      		<span class="right" style="display:none;" id ="logout" ><a href="logout.php">Logout</a></span>
          
          
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html' id="layout">Inicio</a></span>
		<span><a href='pregunta.php' id="preguntas">Preguntas</a></span>
		<span><a href='creditos.php' id="creditos">Creditos</a></span>
    <span><a href='verPreguntas.php' id="verPreguntas">Ver preguntas</a></span>
    <span><a href='verPreguntasXML.php' id="verPreguntasXML">Ver preguntas XML</a></span>
    <span><a href='gestionarPreguntas.php' id="gestionar">Gestionar preguntas</a></span>
	</nav>
    <section class="main" id="s1">
    
    
  <div>
    <p>Número de usuarios editando preguntas:</p>
    <label id ="contador"></label>
  </div>
  <hr/>
    <p>TOTAL PREGUNTAS/TUYAS</p>
    <label id="totaltuyas"></label>
  <div>
    
  </div>
  
  <hr/>
	<div>
		<form enctype="multipart/form-data" id='fpreguntas' name='fpreguntas' action="pregunta.php" method='POST'>
			<p>Introduce tu correo electr&oacute;nico*:   
			<input type='text' id = 'textoEmail' name = 'textoEmail'> </br>
			Escribe tu pregunta*:   
			<input type='text' id = 'textoPregunta' name = 'textoPregunta'> </br>
			Respuesta correcta*:
			<input type='text' id = 'textoCorrecto' name = 'textoCorrecto'> </br>
			Respuesta incorrecta 1*:
			<input type='text' id = 'textoIncorrecto1' name = 'textoIncorrecto1'> </br>
			Respuestas incorrecta 2*:
			<input type='text' id = 'textoIncorrecto2' name = 'textoIncorrecto2'> </br>
			Respuestas incorrecta 3*:
			<input type='text' id = 'textoIncorrecto3' name = 'textoIncorrecto3'> </br>
			Introduce la complejidad de la pregunta del 1 al 5*:
			<input type='text' id = 'textoComplejidad' name = 'textoComplejidad'> </br>
      Tema de la pregunta*:
			<input type='text' id = 'textoTema' name = 'textoTema'> </br>
      </p>
      </br> </br>
			<input type ='button' id="botonenviar" value='Enviar' class = "boton" onclick="insertarDatos();"/><input type ='button' id="verPreguntas" value="Ver preguntas" class = "boton" onclick="verPreguntasAJAX();"/>
      </br></br>
      <div class="error">
        <label id="error" style="color:red;font-size: 50px;"></label>
      </div>
      <label id="mensaje" style="font-size: 50px;"></label>
      </br>
      <label id="mensajeXML" style="font-size: 30px;"></label>
      </br>
      <a href='verPreguntasXML.php' id="verXML" style="display:none"> Clic aquí para visualización XML</a>
		</form>
    
    
	</div>
  <div id="mostrar"></div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
  </div>
  <script type="text/javascript" src='https://code.jquery.com/jquery-3.2.1.js'></script>
  <script type="text/javascript">
	if (window.FileReader) {
      function seleccionArchivo(evt) {
        var files = evt.target.files;
        var f = files[0];
        var leerArchivo = new FileReader();
          leerArchivo.onload = (function(elArchivo) {
            return function(elArchivo) {
              $("#vista_previa").html('<img src="'+ elArchivo.target.result +'" alt="" width="250" />');
            };
          })(f);
    
          leerArchivo.readAsDataURL(f);
      }
     } else {
      $("#vista_previa").html("El navegador no soporta vista previa");
    }
      $("#archivos").on('change', seleccionArchivo);
   

	
  function logueado(nombre,imagen){
    $('.right').hide();
    $('#logout').show();
    $('#layout').hide();
    $('#preguntas').show();
    $('#usuarioMostrar').text("Bienvenido/a " + nombre);
    $('#logueadoImagen').html('<img src="imagenes/'+imagen+'" style="height:60px;width:auto" />');
  }
  
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4){
      if (xmlhttp.status==200){
        
         document.getElementById('mensaje').innerHTML=xmlhttp.responseText;         
         
        
  
      } else {
          document.getElementById('error').innerHTML="Ha ocurrido algun error";
        }
    }
 };
   
  
  function insertarDatos(){
      var datos = $('#fpreguntas').serialize();
      xmlhttp.open('GET',"insertarPreguntasAJAX.php?"+datos);
      xmlhttp.send();
  }
  
  xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange=function(){
    if (xmlhttp2.readyState==4){
      if (xmlhttp2.status==200){
         document.getElementById('mostrar').innerHTML=xmlhttp2.responseText;
      } else {
          document.getElementById('error').innerHTML="Ha ocurrido algun error";
        }
    }
 };
  
  function verPreguntasAJAX(){
    xmlhttp2.open('GET','verPreguntasAJAX.php');
    xmlhttp2.send();
    totaltuyas();
  }
 
  function cont(){
    $.ajax({
    url : 'contador.xml?q='+ new Date().getTime(),
    cache : false,
    success : function(d){
      var usuarios = $(d).find('usuarios');
        $('#contador').text(usuarios[0].childNodes[0].nodeValue);
      }
    });
  }
  
  function totaltuyas(){
    var mail = "<?php echo $_GET['usuario']; ?>";
    $.ajax({
    url : 'totaltuyos.php?usuario='+ mail,
    cache : false,
    success : function(data) {
     $('#totaltuyas').text(data);
   }
    });
  }
    
    totaltuyas();
    cont();
    setInterval("cont()",20000);
    setInterval("totaltuyas()",20000);
    
     function restarConectados() {
      $.ajax({
    url : 'modificarContador.php?q=restar',
    cache : false,
    });
    }
    
    function sumarConectados(){
     $.ajax({
     url : 'modificarContador.php?q=sumar',
     cache : false
     });
    }
    sumarConectados();
    
   

  
  </script>

</body>
</html>

<?php
function logueado(){
  $email = $_GET['usuario'];
  $link = mysqli_connect("localhost","id2920920_amaiajokin","","id2920920_quiz");
  $sql = "select * from usuarios where email = '$email'";
  $resul = mysqli_query($link,$sql);
  $datos = mysqli_fetch_array($resul);
  $nombre = $datos['nombre'];
  $img = $datos['foto'];
  echo "<script> logueado('$nombre','$img'); $('#textoEmail').attr('value','$email'); $('#textoEmail').attr('readonly','readonly');</script>";
  echo "<script> $('#fpreguntas').attr('action','pregunta.php?usuario=$email');</script>";
  echo "<script> $('#preguntas').attr('href','pregunta.php?usuario=$email');</script>";
  echo "<script> $('#creditos').attr('href','creditos.php?usuario=$email');</script>";
  echo "<script> $('#gestionar').attr('href','gestionPreguntas.php?usuario=$email');</script>";
  mysqli_close($link);
}
if (isset($_GET['usuario'])){
    logueado();
  }
  
  

?>



