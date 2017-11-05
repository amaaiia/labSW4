<?php
    $xml = simplexml_load_file("preguntas.xml");
    echo "<html><head><style type='text/css'>
            body{
                font-family: verdana;
                font-size:1;
            }
            
            table th {
                background-color:#d4e3e5;
                padding: 8px;
            }
            
            table td {
                background-color: #ffc992;
            }
            
            table tr {
                text-align: center;
}
            </style> </head> <body>";
    echo "<table border='1px' align='center' background-color='blue'> <tr> <th> Pregunta </th> <th> Tema </th> <th> Complejidad </th> </tr>";
foreach ($xml->assessmentItem as $item) 
	{
    $atributos = $item->attributes();
    $pregunta = $item->itemBody->p;
    //echo "Complejidad--> " .$atributos['complexity']. ",tema--> " .$atributos['subject']. "<br>";
	//echo $item->valor;
    echo "<tr> <td>". utf8_decode($pregunta)."</td> <td>". utf8_decode($atributos['subject'])."</td> <td>".$atributos['complexity']."</td></tr>";
   
    //$pregunta = $body->p;
    //echo $pregunta."<br>";
    
	}
    echo "</table></body></html>"
?>