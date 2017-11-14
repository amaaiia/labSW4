<?php
    $xml = simplexml_load_file("preguntas.xml");
   
    echo "<table border='1px' align='center' background-color='blue'> <tr> <th> Pregunta </th> <th> Tema </th> <th> Complejidad </th> </tr>";
foreach ($xml->assessmentItem as $item) 
	{
    $atributos = $item->attributes();
    $pregunta = $item->itemBody->p;

    echo "<tr> <td>". utf8_decode($pregunta)."</td> <td>". utf8_decode($atributos['subject'])."</td> <td>".$atributos['complexity']."</td></tr>";

	}
    echo "</table></body></html>"
?>