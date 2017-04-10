# guemil-040720177

## Probando JSON && PHP

```
<?php
$json = file_get_contents('data.json');
$json_data = json_decode($json,true);
$datos = array_values( $json_data );
?>
```
Los $datos se pueden ver al final de la página, con un `<?php print_r($datos);?>`

Se puede ver funcionando en [faco.cl/prueba-guemi](http://www.faco.cl/prueba-guemil/)

Lo que queda por resolver es el conteo del coincidencias de puntaje asignado a cada respuesta, que son números entre 1 y 6, esto dentro de cada pictograma…

> Para **01_Man** tengo 102 respuestas, pero necesito saber cuántas de esas tienen asignado el puntaje 1, cuántas el puntaje 2, cuántas el 3, cuántas el 4, cuántas el 5 y cuántas el 6. De esa manera podré sacar un valor de efectividad.
