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
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registro">Registrarse</a></span>
      		<span class="right"><a href="login">Login</a></span>
      		<span class="right" style="display:none;"><a href="/logout">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Inicio</a></span>
		<span><a href='pregunta.html'>Preguntas</a></span>
		<span><a href='creditos.html'>Creditos</a></span>
	</nav>
    <section class="main" id="s1">
    
	<div>
		<?php

    $link = mysqli_connect("localhost","id2920920_amaiajokin","","id2920920_quiz");
    
    $sql = "INSERT INTO preguntas VALUES ('','$_POST[textoEmail]','$_POST[textoPregunta]','$_POST[textoCorrecto]','$_POST[textoIncorrecto1]','$_POST[textoIncorrecto2]','$_POST[textoIncorrecto3]','$_POST[textoComplejidad]','$_POST[textoTema]','')";
    if (!mysqli_query($link,$sql)){
        die ("Pulsa en REPETIR para intentarlo de nuevo </br> <input type='button' value = 'REPETIR' onclick='history.back'()">);
		
    }
    echo "Añadida una nueva fila";
    echo "Pulsa aqui para ver todos los datos: ";
    echo '</br>';
    echo '<a href="verPreguntas.php">Ver preguntas</a>';
    echo '</br>';
    echo '<input type="button" value="VOLVER ATRÁS" name="atras" onclick="history.back()" />';
mysqli_close($link);

    ?>
	
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
  </div>
  
</html>

