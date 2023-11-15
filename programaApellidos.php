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

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$resultadoPalabra=0;
//Varibles case1
$coleccionPalabras = [
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
    "MOUSE", "PASTO", "JEANS", "TUMBA", "PLANO"
];
$palabraAnterior=0;
//variables case2
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
            $count=$count+1;
            $resultadoPalabra = $coleccionPalabras[$palabraWordix-1];
            
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $nombreUsuario = solicitarNombre();
            $bandera2 = false;

            $numeroAleatorio = rand(1,count($coleccionPalabras)-2); // Genera un número aleatorio entre 1 y 10

            do {
                echo"se te ha asignado aleatorio la palabra numero:".$numeroAleatorio ."\n";

                if($numeroAleatorio-1 == $palabraAnterior){
                    echo"¡La palabra es igual a la anterior! se te asignara otra palabra aleatoria.\n ";
                    $numeroAleatorio = rand(1,count($coleccionPalabras));
                } else {
                    echo"la palabra es:".$coleccionPalabras[$numeroAleatorio-1]."\n\n";
                    $palabraAnterior =  $numeroAleatorio-1;
                    $bandera2= true;
                }

            } while (!$bandera2);

            $partida = jugarWordix($coleccionPalabras[$numeroAleatorio-1], strtolower($nombreUsuario));
            echo "\n";
            $resultadoPalabra = $coleccionPalabras[$numeroAleatorio-1];
            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            $partida = [
                $resultadoPalabra => $palabraWordix,
                $nombreUsuario => $nombreUsuario,
                "intentos" => $nroIntento,
                "puntaje" => $puntaje
            ];
            break;
        
            //...
    }
} while ($opcion != 8);
//print_r($partida);
//imprimirResultado($partida);