<!DOCTYPE html>
<html>
<head>
	<title>Mastermind</title>
</head>
<body>
	<h1>Nombre{{Session::get('nombre')}}</h1>
	
	<h3>Clave</h3>
	{{print_r(Session::get('clave'))}}
	<br>
	@foreach(Session::get('clave') as $c)
 
		<img src="{{$c}}.png" width="100px" height="100px">

	@endforeach
	<h1>Opciones</h1>
	@if(Session::get('intentos')>0)
	<form action="/mastermind_comprobar" method="get">
		@for($i = 0; $i < Session::get('nOpciones'); $i++)
			<select name="op{{$i}}">
				@foreach(Session::get('opciones') as $opcion)
			 		<option value="{{$opcion}}">{{$opcion}}</option>
				@endforeach
			</select>
		@endfor
		<input type="submit" value="Comprobar">

	</form>
	@endif
	@if(Session::get('intentos')<= 0)
	<h1>Ya terminaron tus intentos, imbecil</h1>
	@endif
	<?php
		$historial[]=Session('historial');

	 	if($historial!=""){
			foreach($historial as $hist){
				if($hist!=""){
					foreach($hist as $linea){
						echo $linea[0];
						echo "Aciertos:".$linea[1];
						echo "Candidatos:".$linea[2];
						echo "<br>";			
					}	
				}			
			}
		}
	?>


</body>
</html>

