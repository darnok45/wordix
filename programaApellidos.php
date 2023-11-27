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
function seleccionarPalabra($palabraAnterior, $coleccionPalabras){
    $bandera=true;
    do{
        echo "ingrese el numero de la palabra: \n";
        $palabraWordix = solicitarNumeroEntre(1, count($coleccionPalabras));
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
                if($palabraWordix - 1 == $palabraAnterior){
                    echo"¡La palabra es igual a la anterior! se te asignara otra palabra aleatoria.\n ";
                    $palabraWordix = rand(1,count($coleccionPalabras));
                } else {
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
function mostrarPartida($coleccionPartidas, $nroPartida){
    $nroPartida--;
    echo "═══════════════════════════════════════════════════════════════════════════════════════". " \n";
    echo "Partida WORDIX ".$nroPartida+1 .": palabra ". $coleccionPartidas[$nroPartida]["palabraWordix"]."\n";
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
 * @param array $partida
 * @param string $nombreUsuario

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
    echo "el jugador no existe.";
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
        
    
    
         if ( $partida["intentos"] > 0  ) {
        $resumenJugador ["victorias"] = $resumenJugador ["victorias"] + 1;
         }
    
         if ($partida["intentos"] == 1 ){
         $resumenJugador ["intento1"] = $resumenJugador ["intento1"] + 1;
         }
    
         if ($partida["intentos"] == 2 ){
         $resumenJugador ["intento2"] = $resumenJugador ["intento2"] + 1;
         }
    
         if ($partida["intentos"] == 3 ){
         $resumenJugador ["intento3"] = $resumenJugador ["intento3"] + 1;
         }
    
         if ($partida["intentos"] == 4 ){
         $resumenJugador ["intento4"] = $resumenJugador ["intento4"] + 1;
         }
    
         if ($partida["intentos"] == 5 ){
         $resumenJugador ["intento5"] = $resumenJugador ["intento5"] + 1;
         }
    
         if ($partida["intentos"] == 6 ){
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
function agregarPalabra($nuevaPalabra,$coleccionPalabras){
    array_push($coleccionPalabras,$nuevaPalabra);
    
    echo "La palabra '$nuevaPalabra' ha sido agregada a Wordix"."\n";
    var_dump($coleccionPalabras);
return $coleccionPalabras;
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
*@param string $nombreUsuario
*@param string $nuevaPalabra
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
$palabraAnterior = -10;
//variables case 2

//variables case 3

//variables case 4
//variables case 5 
$coleccionPartidas = [];
$coleccionPartidas= cargarColeccionPartidas();
//variables case 6

//variables case 7

//Proceso:

do {
    $opcion = menu();

    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
            $nombreUsuario = solicitarNombre();
            $palabraWordix = seleccionarPalabra($palabraAnterior, $coleccionPalabras);
            $palabraAnterior = $palabraWordix;
            $partida = jugarWordix($coleccionPalabras[$palabraWordix], strtolower($nombreUsuario));
            echo "\n";
            array_push($coleccionPartidas, $partida);
            $nroPartida = count($coleccionPartidas) + 1;
           
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $nombreUsuario = solicitarNombre();
            $palabraWordix = numeroAleatorio($coleccionPalabras,$palabraAnterior);
            $partida = jugarWordix($coleccionPalabras[$palabraWordix-1], strtolower($nombreUsuario));
            array_push($coleccionPartidas, $partida);
            $nroPartida = count($coleccionPartidas) + 1;
            echo"\n";
            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            echo "Ingrese el número de partida: ". "\n";
            $nroPartida = trim(fgets(STDIN)). "\n";
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
            print_r($resumenPartidas);

            break;
        case 6:
            $partidasOrdenadas = $coleccionPartidas;
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
            
            $coleccionPalabras = agregarPalabra($nuevaPalabra,$coleccionPalabras);
            break;
        case 8:
            echo "saliendo del wordix, los esperamos la proxima";

            break;
    }
} while ($opcion != 8);
