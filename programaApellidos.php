<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* -** Genaro Parra**- legajo 4868-mail: parragenaro429@gmail.com- Github: darnok45 "
-** Villegas Salinas Emmanuel Patricio **- legajo 4925-mail:Emmanuel.villegas@est.fi.uncoma.edu.ar- Github:emmavillegas*/
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPartidas(){
    $coleccionPartidas = [
    ["palabraWordix" => "QUESO", "jugador" => "miguel", "intento" => 0, "puntaje" => 0],
    ["palabraWordix" => "FUEGO", "jugador" => "miguel", "intento" => 2, "puntaje" => 13],
    ["palabraWordix" => "MUJER", "jugador" => "miguel", "intento" => 3, "puntaje" => 8],
    ["palabraWordix" => "CASAS", "jugador" => "miguel", "intento" => 4, "puntaje" => 7],
    ["palabraWordix" => "RASGO", "jugador" => "pinqui", "intento" => 5, "puntaje" => 7],
    ["palabraWordix" => "GATOS", "jugador" => "pinqui", "intento" => 0, "puntaje" => 0],
    ["palabraWordix" => "GOTAS", "jugador" => "feli", "intento" => 1 , "puntaje" => 9],
    ["palabraWordix" => "HUEVO", "jugador" => "feli", "intento" => 2 , "puntaje" => 18],
    ["palabraWordix" => "TINTO", "jugador" => "feli", "intento" => 0 , "puntaje" => 0],
    ["palabraWordix" => "NAVES", "jugador" => "leo", "intento" => 0 , "puntaje" => 0 ],
    ["palabraWordix" => "VERDE", "jugador" => "leo", "intento" => 0 , "puntaje" => 0],
    ["palabraWordix" => "MELON", "jugador" => "leo", "intento" => 6 , "puntaje" => 5],
    ["palabraWordix" => "YUYOS", "jugador" => "milo", "intento" => 1 , "puntaje" => 13],
    ["palabraWordix" => "PIANO", "jugador" => "milo", "intento" => 2 , "puntaje" => 9],
    ["palabraWordix" => "PISOS", "jugador" => "pipi", "intento" => 3 , "puntaje" => 7],
    ["palabraWordix" => "PASTO", "jugador" => "roro", "intento" => 4 , "puntaje" => 11] ];
    return $coleccionPartidas;
}


function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "MOUSE", "PASTO", "JEANS", "TUMBA", "PLANO"
    ];

    return ($coleccionPalabras);
}
function menu(){
    echo"╔════════════════════════════════════════════════════════════════════════════════╗\n";
    echo"║ seleccione una opcion:                                                         ║\n";
    echo"║ 1) Jugar al wordix con una palabra elegida.                                    ║\n";
    echo"║ 2) Jugar al wordix con una palabra aleatoria.                                  ║\n";
    echo"║ 3) mostrar una partida.                                                        ║\n";
    echo"║ 4) mostrar la primer partida ganadora.                                         ║\n";
    echo"║ 5) mostrar resumen de jugador.                                                 ║\n";
    echo"║ 6) mostrar el listado de partidas ordenadas por jugador y por palabra.         ║\n";
    echo"║ 7) agregar una palabra de 5 letras a wordix.                                   ║\n";
    echo"║ 8) salir.                                                                      ║\n";
    echo"╚════════════════════════════════════════════════════════════════════════════════╝\n";
$tecladoMenu=solicitarNumeroEntre(1, 20);
return $tecladoMenu;
}
function solicitarNombre(){
    $salida=true;
    do{
       echo"ingrese nombre de usuario \n";
       $nombreUsuario=trim(fgets(STDIN));
          if(is_numeric($nombreUsuario)){
             echo"el nombre de usuario no puede ser numerico \n";
       }else{
          $salida=false;
       }
    }while($salida);
    return strtolower($nombreUsuario);
    }
function mostrarPartida($partida, $nroPartida){
    
    $palabra = $partida["palabraWordix"];
    $nombreJugador = $partida["jugador"];
    $intentos = $partida["intentos"];
    $puntaje = $partida["puntaje"];
    
    
    if ($intentos > 0) {
    $resultadoIntento = "Adivinó la palabra en $intentos intentos.";
    } else {
        $resultadoIntento = "No adivinó la palabra";
    }
    
    echo "Partida WORDIX". $nroPartida.": palabra". $palabra."\n";
    echo "Jugador:". $nombreJugador."\n";
    echo "Puntaje:". $puntaje."puntos\n";
    echo "Intento:". $resultadoIntento. "\n";

}
function mostrarPartidaGanadora($nombreUsuario, $partida){
$partidas=[];
$partidas[] = $partida;
    foreach ($partidas as $partida){
        if ($partida["jugador"] == $nombreUsuario) {
            if ($partida["intentos"] == 0) {
                echo "La primera partida no fue ganadora.\n";
                return;
            } else {
                echo "La primera partida ganadora fue encontrada:\n";
                echo "Jugador: " . $partida["jugador"] . "\n";
                echo "puntaje: " .$partida["puntaje"] . "\n";
                echo "intento: " .$partida["intentos"] . "\n";
                return; 
            }
        }
    }
}
function agregarLetra($nuevaPalabra,$coleccionPalabras){
    echo "La palabra '$nuevaPalabra' ha sido agregada a Wordix.\n";

    echo "Palabras en Wordix: " . array_push($coleccionPalabras,$nuevaPalabra) . "\n";
    var_dump($coleccionPalabras);

}
function numeroAleatorio($coleccionPalabras,$palabraAnterior,$nroPartida,$nombreUsuario){
    $bandera2 = false;
            $palabraWordix = rand(1,count($coleccionPalabras)); // Genera un número aleatorio entre 1 y 10

            do {
                echo"se te ha asignado aleatorio la palabra numero:".$palabraWordix ."\n";

                if($palabraWordix-1 == $palabraAnterior){
                    echo"¡La palabra es igual a la anterior! se te asignara otra palabra aleatoria.\n ";
                    $palabraWordix = rand(1,count($coleccionPalabras));
                } else {
                    echo"la palabra es:".$coleccionPalabras[$palabraWordix-1]."\n\n";
                    $palabraAnterior =  $palabraWordix-1;
                    $bandera2= true;
                }
                $partida = jugarWordix($coleccionPalabras[$palabraWordix-1], strtolower($nombreUsuario));
            echo "\n";
            $nroPartida = $nroPartida + 1;
    } while (!$bandera2);

}
function seleccionarPalabra($coleccionPalabras,$palabraAnterior,$nombreUsuario,$nroPartida){
    $bandera=true;
    do{
        echo "ingrese el numero de la palabra: \n";
        $palabraWordix=trim(fgets(STDIN));
    if($palabraWordix-1 == $palabraAnterior){
          echo "¡La palabra es igual a la anterior! Ingrese otra palabra.\n";
        }else{
            $coleccionPalabras[$palabraWordix-1]."\n\n";
            $palabraAnterior=$palabraWordix-1;
            $bandera=false;
        }
    }while($bandera);
    
    $partida = jugarWordix($coleccionPalabras[$palabraWordix-1], strtolower($nombreUsuario));
    echo "\n";
    $nroPartida = $nroPartida + 1;
}


function generarResumenJugador ($coleccionPartidas, $nombreDeJugador){

    
    $resumenJugador = [
        "jugador" => $nombreDeJugador, "numTotalPartidas" => 0,  "totalPuntajes" => 0, "victorias" => 0, 
        "porcentajeVictorias" => 0,
        "intento1" => 0, "intento2" => 0, "intento3" => 0, "intento4" => 0, 
        "intento5" => 0, "intento6" => 0, ];
    
    foreach ($coleccionPartidas as $partidas)
    {
        if ($nombreDeJugador == $partidas["jugador"]){
    
        $resumenJugador["numTotalPartidas"] =   $resumenJugador["numTotalPartidas"] + 1;
    
        $resumenJugador ["totalPuntajes"] =   $resumenJugador ["totalPuntajes"] + $partidas ["puntaje"];
        
    
    
         if ($partidas ["intento"] > 0  ) {
        $resumenJugador ["victorias"] = $resumenJugador ["victorias"] + 1;
         }
    
         if ($partidas ["intento"] == 1 ){
         $resumenJugador ["intento1"] = $resumenJugador ["intento1"] + 1;
         }
    
         if ($partidas ["intento"] == 2 ){
         $resumenJugador ["intento2"] = $resumenJugador ["intento2"] + 1;
         }
    
         if ($partidas ["intento"] == 3 ){
         $resumenJugador ["intento3"] = $resumenJugador ["intento3"] + 1;
         }
    
         if ($partidas ["intento"] == 4 ){
         $resumenJugador ["intento4"] = $resumenJugador ["intento4"] + 1;
         }
    
         if ($partidas ["intento"] == 5 ){
         $resumenJugador ["intento5"] = $resumenJugador ["intento5"] + 1;
         }
    
         if ($partidas ["intento"] == 6 ){
         $resumenJugador ["intento6"] = $resumenJugador ["intento6"] + 1;
         } 
         $resumenJugador ["porcentajeVictorias" ] = $resumenJugador ["victorias"] * 100 /  $resumenJugador["numTotalPartidas"];
    
        }
    
    }
}     
return $resumenJugador;






/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$resultadoPalabra = 0;
$nroPartida = 0;
//Varibles case1
$coleccionPalabras = [
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
    "MOUSE", "PASTO", "JEANS", "TUMBA", "PLANO"
];
$palabraAnterior=0;
//variables case2
//variables case 3
//variables case 4

//Proceso:

do {
    $opcion = menu();

    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            
            $nombreUsuario=solicitarNombre();
           seleccionarPalabra($coleccionPalabras,$palabraAnterior,$nombreUsuario,$nroPartida);
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $nombreUsuario = solicitarNombre();
            numeroAleatorio($coleccionPalabras,$palabraAnterior,$nroPartida,$nombreUsuario);
            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "Ingrese el número de partida: ";
            $nroPartida = trim(fgets(STDIN));
            
            mostrarPartida($partida,$nroPartida);
            break;
        case 4:
            //completar que secuencia de pasos ejecuatar sie le usuario elige la opcion 4
            $nombreUsuario = solicitarNombre();
            mostrarPartidaGanadora($nombreUsuario, $partida);
            break;
        case 5:
            $nombreDeJugador = solicitarNombre();

            $resumenPartidas = generarResumenJugador ($coleccionPartidas, $nombreDelJugador);



             //completar que secuencia de pasos ejecuatar sie le usuario elige la opcion 4
        case 6:
            //completar que secuencia de pasos ejecuatar sie le usuario elige la opcion 4       

        case 7:
            // Solicitar una palabra de 5 letras al usuario
            
            $nuevaPalabra = leerPalabra5Letras();

            agregarLetra($nuevaPalabra,$coleccionPalabras);
            break;

        case 8:
            echo "saliendo del wordix, los esperamos la proxima";

            break;
    }
} while ($opcion != 8);
//print_r($partida);
//imprimirResultado($partida);