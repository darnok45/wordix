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
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $nombreUsuario = solicitarNombre();
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

            } while (!$bandera2);

            $partida = jugarWordix($coleccionPalabras[$palabraWordix-1], strtolower($nombreUsuario));
            echo "\n";
            $nroPartida = $nroPartida + 1;
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
             //completar que secuencia de pasos ejecuatar sie le usuario elige la opcion 4
        case 6:
            //completar que secuencia de pasos ejecuatar sie le usuario elige la opcion 4       

        case 7:
            // Solicitar una palabra de 5 letras al usuario
            do {
                $nuevaPalabra = strtoupper(readline("Ingrese una palabra de 5 letras para agregar a Wordix: "));
            } while (strlen($nuevaPalabra) !== 5 || !ctype_alpha($nuevaPalabra));
            //hace lo mismo que la funcin de pedir palabra de 5 letras

            // Agregar la nueva palabra a la colección de palabras Wordix
            $coleccionPalabras[] = $nuevaPalabra;

            // Mostrar un mensaje indicando que la palabra ha sido agregada
            echo "La palabra '$nuevaPalabra' ha sido agregada a Wordix.\n";

            // Puedes imprimir las palabras actuales en Wordix si lo deseas
            echo "Palabras en Wordix: " . implode(", ", $coleccionPalabras) . "\n";
            //hace lo mismo que un array_push
            break;

        case 8:
            echo "saliendo del wordix, los esperamos la proxima";

            break;
    }
} while ($opcion != 8);
//print_r($partida);
//imprimirResultado($partida);