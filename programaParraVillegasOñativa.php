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
/**
 * funciones predefinidas de php
 * empty: comprueba si la variable es vacia. Utilizado en la function solicitarNombreUsuario.
 * is_numeric: comprueba si un valor es numerico. Utilizado en la function solicitarNombreUsuario.
 * strtolower: se utiliza para que una cadena de texto este en minuscula. lo utilizamos en el nombre de usuario.
 * rand: generar un numero entero aleatorio. Utilizado en el case 2.
 * array_push: se utiliza para agregar uno o mas elementos al final de un array. Utilizado en case 1, 2, 7 y function cargarColeccionPartidas.
 * var_dump: se utiliza para mostrar información detallada sobre una o mas variables. Utilizado function agregarPalabra.
 * print_r:  se utiliza para mostrar información sobre una variable. Utilizado en el function partidasOrdenadas.
 * uosort:  se utiliza para ordenar un array asociativo mediante una función de comparación. Utilizado en el function partidasOrdenadas
*/
/**************************************/
/*******        switch        *********/
/***funciona de forma similar a una ***/
/******  serie de sentencias if  ******/
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
    $coleccion = [];
    $p1=["palabraWordix" => "QUESO", "jugador" => "miguel", "intentos" => 0, "puntaje" => 0];
    $p2=["palabraWordix" => "FUEGO", "jugador" => "miguel", "intentos" => 2, "puntaje" => 13];
    $p3=["palabraWordix" => "MUJER", "jugador" => "miguel", "intentos" => 3, "puntaje" => 8];
    $p4=["palabraWordix" => "CASAS", "jugador" => "miguel", "intentos" => 4, "puntaje" => 7];
    $p5=["palabraWordix" => "RASGO", "jugador" => "pinqui", "intentos" => 5, "puntaje" => 7];
    $p6=["palabraWordix" => "GATOS", "jugador" => "pinqui", "intentos" => 0, "puntaje" => 0];
    $p7=["palabraWordix" => "GOTAS", "jugador" => "feli", "intentos" => 1 , "puntaje" => 9];
    $p8=["palabraWordix" => "HUEVO", "jugador" => "feli", "intentos" => 2 , "puntaje" => 18];
    $p9=["palabraWordix" => "TINTO", "jugador" => "feli", "intentos" => 0 , "puntaje" => 0];
    $p10=["palabraWordix" => "NAVES", "jugador" => "leo", "intentos" => 0 , "puntaje" => 0 ];
    $p11=["palabraWordix" => "VERDE", "jugador" => "leo", "intentos" => 0 , "puntaje" => 0];
    $p12=["palabraWordix" => "MELON", "jugador" => "leo", "intentos" => 6 , "puntaje" => 5];
    $p13=["palabraWordix" => "YUYOS", "jugador" => "milo", "intentos" => 1 , "puntaje" => 13];
    $p14=["palabraWordix" => "PIANO", "jugador" => "milo", "intentos" => 2 , "puntaje" => 9];
    $p15=["palabraWordix" => "PISOS", "jugador" => "pipi", "intentos" => 3 , "puntaje" => 7];
    $p16=["palabraWordix" => "PASTO", "jugador" => "roro", "intentos" => 4 , "puntaje" => 11];
    array_push($coleccion,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16);
    return $coleccion;
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
 * @param string $nombreUsuario
 * @param boolean $salida
 * @return string
 */
function solicitarNombre(){
    $salida=true;
    do{
        echo"ingrese nombre de usuario \n";
        $nombreUsuario=trim(fgets(STDIN));
        if(empty($nombreUsuario)){
            echo"el nombre de usuario no puede ser vacio."."\n";
        }elseif(is_numeric($nombreUsuario[0])){
            echo"el nombre de usuario no puede ser numerico."."\n";
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
 * La palabra ya fue utilizada elegia otra
 * @param array $coleccionPalabras
 * @param boolean $bandera 
 * @param array $coleccionPartidas
 * @param string $nombreUsuario
 */
function seleccionarPalabra($coleccionPalabras, $coleccionPartidas, $nombreUsuario){
    do{
        echo "ingrese el numero de la palabra: "."\n";
        $palabraWordix = solicitarNumeroEntre(1, count($coleccionPalabras));
        $palabraWordix = $palabraWordix - 1;

        $bandera = false;
        for ($i = 0; $i < count($coleccionPartidas); $i++) {
            if ($coleccionPartidas[$i]["jugador"] == $nombreUsuario && $coleccionPartidas[$i]["palabraWordix"] == $coleccionPalabras[$palabraWordix]) {
            echo "¡ya jugo con esa palabra! Ingrese otra palabra.\n";
            $bandera = true;
            }
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
 * @param array $coleccionPartidas
 * @param string $nombreUsuario
 * @param string $palabraWordix
 * @param int $indiceAleatorio
 * @param boolean $bandera2
 */
function numeroAleatorio($coleccionPalabras,$coleccionPartidas, $nombreUsuario){
    do {
        $indiceAleatorio = rand(0,count($coleccionPalabras)-1);
        $palabraWordix = $coleccionPalabras[$indiceAleatorio];
        $bandera2 = false;

            for ($i = 0; $i < count($coleccionPartidas); $i++) {
                if ($coleccionPartidas[$i]["jugador"] == $nombreUsuario && $coleccionPartidas[$i]["palabraWordix"] == $palabraWordix){
                    echo "¡ya jugo con esta palabra! se le asigno otra.\n";
                    $bandera2 = true;
            }
        }
    } while ($bandera2);
return $palabraWordix;
}
/**************************************/
/**********FUNCIONES CASE 3************/
/**************************************/
/**
 * le mostramos al usuario los datos del numero de partida que nos pide
 * @param int $nroPartida
 * @param array $coleccionPartidas
 */
function mostrarPartida($coleccionPartidas, $nroPartida){
    $nroPartida--;
    echo "═══════════════════════════════════════════════════════════════════════════════════════". " \n";
    echo "Partida WORDIX ".$nroPartida + 1 .": palabra ". $coleccionPartidas[$nroPartida]["palabraWordix"]."\n";
    echo "Jugador: ". $coleccionPartidas[$nroPartida]["jugador"]."\n";
    echo "Puntaje: ". $coleccionPartidas[$nroPartida]["puntaje"] ." puntos \n";
    if ($coleccionPartidas[$nroPartida]["intentos"] == 0){
        echo "No Adivino la palabra"."\n";
    } else {
        echo "Intento: ". $coleccionPartidas[$nroPartida]["intentos"]. "\n";
    }
    echo "═══════════════════════════════════════════════════════════════════════════════════════ \n";
}
/**************************************/
/**********FUNCIONES CASE 4************/
/**************************************/
/**
 * mostramos la primera partida ganadora segun el nombre de usuario solicitado
 * @param array $coleccionPartidas
 * @param string $nombreUsuario
 * @param boolean $bandera3
 */
function mostrarPartidaGanadora($nombreUsuario,$coleccionPartidas){
$bandera3 = false;
$j=0;
do{
   if($coleccionPartidas[$j]["jugador"] == $nombreUsuario){
       if ($coleccionPartidas[$j]["intentos"] > 0) {
           echo "La primera partida ganadora fue encontrada:\n";
           echo "Jugador: " . $coleccionPartidas[$j]["jugador"] . "\n";
           echo "Puntaje: " . $coleccionPartidas[$j]["puntaje"] . "\n";
           echo "Intento: " . $coleccionPartidas[$j]["intentos"] . "\n";
           $bandera3 = true;
        }
    }
    $j++;
}while(!$bandera3 && $j < count($coleccionPartidas));
if(!$bandera3){
    echo "el jugador no existe.","\n";
    return -1;
}
}
/**************************************/
/**********FUNCIONES CASE 5************/
/**************************************/
/**
 * generamos un resumen de partida de un jugador mediante el nombre de usuario
 * @param string $nombreDeJugador
 * @param array $coleccionPartidas
 * @param array $partida
 * @param array $resumenJugador
 */
function generarResumenJugador($coleccionPartidas, $nombreDeJugador){
    $resumenJugador = [
        "nroTotalPartidas" => 0,
        "totalPuntaje" => 0,
        "victorias" => 0,
        "porcentajeVictorias" => 0,
        "intento1" => 0,
        "intento2" => 0,
        "intento3" => 0,
        "intento4" => 0,
        "intento5" => 0,
        "intento6" => 0,
    ];    
    
foreach ($coleccionPartidas as $partida){
    if ($nombreDeJugador ==  $partida["jugador"]){
        $resumenJugador["nroTotalPartidas"]++;
        $resumenJugador["totalPuntaje"] = $resumenJugador["totalPuntaje"] +  $partida["puntaje"];
        
         if ( $partida["intentos"] > 0  ) {
            $resumenJugador["victorias"]++;
         }
    
         if ($partida["intentos"] == 1 ){
        $resumenJugador["intento1"]++;
         }
    
         if ($partida["intentos"] == 2 ){
        $resumenJugador["intento2"]++;
         }
    
         if ($partida["intentos"] == 3 ){
        $resumenJugador["intento3"]++;
         }
    
         if ($partida["intentos"] == 4 ){
        $resumenJugador["intento4"]++;
         }
    
         if ($partida["intentos"] == 5 ){
        $resumenJugador["intento5"]++;
         }
    
         if ($partida["intentos"] == 6 ){
        $resumenJugador["intento2"]++;
        } 
        if ($resumenJugador["nroTotalPartidas"] > 0) {
            $resumenJugador["porcentajeVictorias"] = $resumenJugador["victorias"] * 100 / $resumenJugador["nroTotalPartidas"];
        } else {
            $resumenJugador["porcentajeVictorias"] = 0;
        }        
    }   
}
echo "═════════════════════════════════════════════════════════════════════════". " \n";
echo "Número total de partidas: ".$resumenJugador["nroTotalPartidas"]."\n";
echo "Total de puntajes: ".$resumenJugador["totalPuntaje"]."\n";
echo "Número de victorias: ".$resumenJugador["victorias"]."\n";
echo "Porcentaje de victorias: ".$resumenJugador["porcentajeVictorias"]."%"."\n";
echo "Intentos 1: ".$resumenJugador["intento1"]."\n";
echo "Intentos 2: ".$resumenJugador["intento2"]."\n";
echo "Intentos 3: ".$resumenJugador["intento3"]."\n";
echo "Intentos 4: ".$resumenJugador["intento4"]."\n";
echo "Intentos 5: ".$resumenJugador["intento5"]."\n";
echo "Intentos 6: ".$resumenJugador["intento6"]."\n";
echo "═════════════════════════════════════════════════════════════════════════". " \n";
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
/**
 * comparamos los nombres de usuarios y palabras para poder ordenarlos alfabeticamente
 * @param array $coleccionPartidas
 */
function partidasOrdenadas($coleccionPartidas){
    if ($coleccionPartidas == 0){
        echo "no hay partidas.";
    }else{
        uasort($coleccionPartidas,'comparacion');
        print_r($coleccionPartidas);
    }
}
/**************************************/
/**********FUNCIONES CASE 7************/
/**************************************/
/**
 * agregamos una palabra de 5 letras a la coleccion de palabras
 * @param string $nuevaPalabra
 * @param string $palabraVieja
 * @param array $coleccionPalabras
 * @return array
 */
function agregarPalabra($nuevaPalabra,$coleccionPalabras,&$palabraVieja){
    if($nuevaPalabra == $palabraVieja){
        echo"la palabra se repite, no sera agregada"."\n";
    }else{
        array_push($coleccionPalabras,$nuevaPalabra);
        
        echo "La palabra '$nuevaPalabra' ha sido agregada a Wordix"."\n";
        var_dump($coleccionPalabras);
        $palabraVieja = $nuevaPalabra;
    }
return $coleccionPalabras;
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
*@param string $nombreUsuario
*@param array $coleccionPartidas
*@param array $coleccionPalabras
*@param array $partida
*/
//Inicialización de variables:
$coleccionPalabras = [
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
    "MOUSE", "PASTO", "JEANS", "TUMBA", "PLANO"
];
$coleccionPartidas = [];
$coleccionPartidas= cargarColeccionPartidas();


//Proceso:

do {
    $opcion = menu();

    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            $nombreUsuario = solicitarNombre();
            $palabraWordix = seleccionarPalabra($coleccionPalabras, $coleccionPartidas,$nombreUsuario);
            $partida = jugarWordix($coleccionPalabras[$palabraWordix], strtolower($nombreUsuario));
            echo "\n";
            array_push($coleccionPartidas, $partida); 
            break;
        case 2:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $nombreUsuario = solicitarNombre();
            $palabraWordix = numeroAleatorio($coleccionPalabras,$coleccionPartidas,$nombreUsuario);
            $partida = jugarWordix($palabraWordix, strtolower($nombreUsuario));
            array_push($coleccionPartidas, $partida);
            echo"\n";
            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "Ingrese el número de partida: ". "\n";
            $nroPartida = solicitarNumeroEntre(1, count($coleccionPartidas)). "\n";
            mostrarPartida($coleccionPartidas,$nroPartida). "\n";
            break;
        case 4:
            //completar que secuencia de pasos ejecuatar sie le usuario elige la opcion 4
            $nombreUsuario = solicitarNombre();
            mostrarPartidaGanadora($nombreUsuario,$coleccionPartidas);
            break;
        case 5:
            $nombreDeJugador = solicitarNombre();

            $resumenPartidas = generarResumenJugador ($coleccionPartidas, $nombreDeJugador,);
            break;
        case 6:
            partidasOrdenadas($coleccionPartidas);
            break;
        case 7:
            // Solicitar una palabra de 5 letras al usuario
            $nuevaPalabra = leerPalabra5Letras();
            $coleccionPalabras = agregarPalabra($nuevaPalabra,$coleccionPalabras,$palabraVieja);
            break;
        case 8:
            echo "saliendo del wordix, los esperamos la proxima";

            break;
    }
} while ($opcion != 8);
