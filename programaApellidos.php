<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* -** Genaro Parra**- legajo 4868-mail: parragenaro429@gmail.com- Github: darnok45 "
-** Villegas Salinas Emmanuel Patricio **- legajo 4925-mail:Emmanuel.villegas@est.fi.uncoma.edu.ar- Github:emmavillegas*/
/** Daniela Oñatibia   * legajo - FAI-4775  * Email: danielajuana032@gmail.com   * Github : DanielaJuana   */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**************************************/
/********FUNCIONES GENERALES **********/
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
/**
 * Obtiene una colección de partidas
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

    return ($coleccionPartidas);
}
/**
 * imprime el menu de opciones
 * @return int
 */
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
$tecladoMenu=solicitarNumeroEntre(1, 8);
return $tecladoMenu;
}
/**
 * pedimos un nombre de usuario que no inicie en numeros
 * @return string
 */
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
/**************************************/
/**********FUNCIONES CASE 1************/
/**************************************/
/**
 * solicitamos el numero de palabra si igual a la anterior debe ingresar una distinta
 * @param int $palabraAnterior
 * @param boolean $bandera 
 */
function seleccionarPalabra($palabraAnterior){
    $bandera=true;
    do{
        echo "ingrese el numero de la palabra: \n";
        $palabraWordix=trim(fgets(STDIN));
        $palabraWordix = $palabraWordix - 1;
    if($palabraWordix == $palabraAnterior){
          echo "¡La palabra es igual a la anterior! Ingrese otra palabra.\n";
        }else{
            $bandera=false;
        }
    }while($bandera);
return $palabraWordix;
}
/**************************************/
/**********FUNCIONES CASE 2************/
/**************************************/
/**
 *le damos un numero aleatorio que no puede ser igual al anterior
 * @param array $coleccionPalabras
 * @param int $palabraAnterior
 * @param boolean $bandera2
 */
function numeroAleatorio($coleccionPalabras,$palabraAnterior,){
    $bandera2 = false;
            $palabraWordix = rand(1,count($coleccionPalabras));
            do {
                echo"se te ha asignado aleatorio la palabra numero:". $palabraWordix ."\n";

                if($palabraWordix - 1 == $palabraAnterior){
                    echo"¡La palabra es igual a la anterior! se te asignara otra palabra aleatoria.\n ";
                    $palabraWordix = rand(1,count($coleccionPalabras));
                } else {
                    echo"la palabra es:".$coleccionPalabras[$palabraWordix - 1]."\n\n";
                    $palabraAnterior =  $palabraWordix - 1;
                    $bandera2= true;
                }
    } while (!$bandera2);
return $palabraWordix;
}
/**************************************/
/**********FUNCIONES CASE 3************/
/**************************************/
/**
 * le mostramos al usuario los datos del numero de partida que nos pide
 * @param array $partida
 * @param int $nroPartida
 * @param string palabra
 * @param string nombreJugador
 * @param int intentos
 * @param int puntaje
 * @param string resultadoIntento
 */
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
/**************************************/
/**********FUNCIONES CASE 4************/
/**************************************/
/**
 * mostramos la primera partida ganadora segun el nombre de usuario solicitado
 * @param array $partida
 * @param string $nombreUsuario

 */
function mostrarPartidaGanadora($nombreUsuario, $partida){
    foreach ($partida as $nombreUsuario){
        if ($partida["jugador"] == $nombreUsuario) {
            if ($partida["intentos"] == 0) {
                echo "La primera partida no fue ganadora.\n";
            } else {
                echo "La primera partida ganadora fue encontrada:\n";
                echo "Jugador: " . $partida["jugador"] . "\n";
                echo "puntaje: " . $partida["puntaje"] . "\n";
                echo "intento: " .$partida["intentos"] . "\n";
            }
        }
    }
}
/**************************************/
/**********FUNCIONES CASE 5************/
/**************************************/
/**
 * generamos un resumen de partida de un jugador mediante el nombre de usuario
 * @param array $coleccionPalabras
 * @param string $nombreDeJugador
 * @return array resumenJugador
 * @param string nombreDeJugador
 * @param array coleccionPartidas
 * @param array partida
 */
function generarResumenJugador ($coleccionPartidas, $nombreDeJugador){
    $resumenJugador = [
        "jugador" => $nombreDeJugador, 
        "numTotalPartidas" => 0,  
        "totalPuntajes" => 0, 
        "victorias" => 0, 
        "porcentajeVictorias" => 0,
        "intento1" => 0, "intento2" => 0, "intento3" => 0, "intento4" => 0, 
        "intento5" => 0, "intento6" => 0, 
    ];
    
    foreach ($coleccionPartidas as $partida)
    {
        if ($nombreDeJugador ==  $partida["jugador"]){
    
        $resumenJugador["numTotalPartidas"] =   $resumenJugador["numTotalPartidas"] + 1;
    
        $resumenJugador ["totalPuntajes"] =   $resumenJugador ["totalPuntajes"] +  $partida["puntaje"];
        
    
    
         if ( $partida["intento"] > 0  ) {
        $resumenJugador ["victorias"] = $resumenJugador ["victorias"] + 1;
         }
    
         if ($partida["intento"] == 1 ){
         $resumenJugador ["intento1"] = $resumenJugador ["intento1"] + 1;
         }
    
         if ($partida["intento"] == 2 ){
         $resumenJugador ["intento2"] = $resumenJugador ["intento2"] + 1;
         }
    
         if ($partida["intento"] == 3 ){
         $resumenJugador ["intento3"] = $resumenJugador ["intento3"] + 1;
         }
    
         if ($partida["intento"] == 4 ){
         $resumenJugador ["intento4"] = $resumenJugador ["intento4"] + 1;
         }
    
         if ($partida["intento"] == 5 ){
         $resumenJugador ["intento5"] = $resumenJugador ["intento5"] + 1;
         }
    
         if ($partida["intento"] == 6 ){
         $resumenJugador ["intento6"] = $resumenJugador ["intento6"] + 1;
        } 
        $resumenJugador ["porcentajeVictorias" ] = $resumenJugador ["victorias"] * 100 /  $resumenJugador["numTotalPartidas"];
        
    }   
}
return $resumenJugador;
}     
/**************************************/
/**********FUNCIONES CASE 6************/
/**************************************/
/**
 * comparamos los nombres de usuarios y palabras para poder ordenarlos alfabeticamente
 * @param int $a
 * @param int $b
 * @return int 
 */
function comparacion($a, $b){
    if($a["jugador"] == $b["jugador"]){
        if($a["palabraWordix"] == $b["palabraWordix"]){
            return 0;
        }
        if($a["palabraWordix"] < $b["palabraWordix"]){
        return -1;
        }else
        return 1;
    }
    if($a["jugador"] < $b["jugador"]){
    return -1;
    }else 
    return 1;
}
/**************************************/
/**********FUNCIONES CASE 7************/
/**************************************/
/**
 * agregamos una palabra de 5 letras a la coleccion de palabras
 * @param string $nuevaPalabra
 * @param array $coleccionPalabras
 */
function agregarLetra($nuevaPalabra,$coleccionPalabras){
    echo "La palabra '$nuevaPalabra' ha sido agregada a Wordix.\n";

    echo "Palabras en Wordix: " . array_push($coleccionPalabras,$nuevaPalabra) . "\n";
    var_dump($coleccionPalabras);

}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
*@param string $nombreUsuario
*@param string $nuevaPalabra
*@param int $nroPartida
*@param int $palabraAnterior
*@param boolean $bandera
*@param boolean $bandera2
*@param array $resumenPartidas
*@param array $coleccionPartidas
*@param array $partidasOrdenadas
*@param array $coleccionPalabras
*@param array $partida
*/
//Inicialización de variables:
$nroPartida = 0;
//Varibles case1
$coleccionPalabras = [
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
    "MOUSE", "PASTO", "JEANS", "TUMBA", "PLANO"
];
$palabraAnterior = - 10;
//variables case 2

//variables case 3

//variables case 4

//variables case 5 
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
    ["palabraWordix" => "PASTO", "jugador" => "roro", "intento" => 4 , "puntaje" => 11] 
];
//variables case 6

//variables case 7

//Proceso:

do {
    $opcion = menu();

    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            $nombreUsuario = solicitarNombre();
            $palabraWordix = seleccionarPalabra($palabraAnterior);
            $palabraAnterior = $palabraWordix;
            $partida = jugarWordix($coleccionPalabras[$palabraWordix], strtolower($nombreUsuario));
            echo "\n";
            $nroPartida = $nroPartida + 1;
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $nombreUsuario = solicitarNombre();
            $palabraWordix = numeroAleatorio($coleccionPalabras,$palabraAnterior);
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
            $nombreDeJugador = solicitarNombre();

            $resumenPartidas = generarResumenJugador ($coleccionPartidas, $nombreDeJugador,);
            print_r($resumenPartidas);

            break;
        case 6:
            $partidasOrdenadas = cargarColeccionPartidas();
            if ($partidasOrdenadas == 0){
                echo "no hay partidas.";
            }else{
                uasort($partidasOrdenadas,'comparacion');
                print_r($partidasOrdenadas);
            }
            break;
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
