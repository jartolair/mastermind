<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h1>Configuracion</h1>
        <form action="/mastermind" method="get">
            Jugador:
            <input type="text" name="nombre">
            <br>
            Numero de elementos a adivinar:
            <br>
            <input type="radio" name="longitud" value="4"> 4
            <input type="radio" name="longitud" value="5"> 5
            <input type="radio" name="longitud" value="6"> 6
            <br>
            Valores posibles
            <br>
            <input type="radio" name="nOpciones" value="4"> 4
            <input type="radio" name="nOpciones" value="5"> 5
            <input type="radio" name="nOpciones" value="6"> 6
            <input type="radio" name="nOpciones" value="7"> 7
            <input type="radio" name="nOpciones" value="8"> 8
            <br>
            Permitir repeticiones
            <br>
            <input type="radio" name="repeticiones" value="si"> Si
            <input type="radio" name="repeticiones" value="no"> No
            <br>
            Numero de intentos
            <input type="number" name="intentos">
            <br>
            <input type="submit">
        </form>
    </body>
</html>
