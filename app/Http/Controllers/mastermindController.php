<?php

namespace App\Http\Controllers;

use App\Users;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Session;



class mastermindController extends Controller
{
    public function index(Request $request){
    	session_start();

    	$nombre = $request->input('nombre');
    	$longitud = $request->input('longitud');
    	$nOpciones = $request->input('nOpciones');
    	$repeticiones = $request->input('repeticiones');
    	$intentos = $request->input('intentos');

    	$opciones=array("azul", "rojo", "verde", "negro", "amarillo", "morado", "gris", "marron");
    	$clave[]=array();
    	$opciones1=$opciones;

    	$clave[0]="al";
    	array_splice($opciones, $nOpciones);
    	array_splice($opciones1, $nOpciones);
    	$txt='';
    	for($i=0;$i<$longitud;$i++){
    		$indice=random_int(0, count($opciones)-1);
    		$clave[$i]=$opciones[$indice];
    		if($repeticiones=="no"){
    			unset($opciones[$indice]);
    			$opciones=array_values($opciones);
    		}
    		
   //$txt=$txt."  //indice=".$indice."//  ".join(',', $opciones);
       	}


    	session(['clave' => $clave]);
    	session(['nombre' => $nombre]);
    	session(['opciones' => $opciones1]);
    	session(['nOpciones' => $nOpciones]);
    	session(['intentos' => $intentos]);
    	session(['historial' => null]);
    	//session(['txt' => $txt]);

    	return view('mastermind');

    }
    public function comprobar(Request $request){
    	session_start();

		$clave=Session('clave');
		$nOP=Session('nOpciones');
		$candidato=0;
		$acierto=0;
		$intentos=Session('intentos');
		if ($intentos>0){
			$intentos--;
			$resultado="";
			for($i=0;$i<$nOP;$i++){
				$opCompleto[$i] = $request->input('op'.$i);
				$resultado=$resultado."<img src='".$opCompleto[$i].".png' width='100px' height='100px'> ";

				if($clave[$i]==$opCompleto[$i]){
					$acierto++;
				}elseif (in_array($opCompleto[$i], $clave)) {
					$candidato++;
				}
			}


			$historial=Session('historial');
			if ($historial==null){
				$historial=array();
			}
			$hist=array($resultado,$acierto,$candidato);

			
			array_push($historial, $hist);
			session(['historial' => $historial]);
			session(['intentos' => $intentos]);
		}

		

		return view('mastermind');

    }
}
