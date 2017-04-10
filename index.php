<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Guemil</title>
    <meta name="robots" content="noindex">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--ahora llamo los datos-->
    <?php
    $json = file_get_contents('data.json');
    $json_data = json_decode($json,true);
    $datos = array_values( $json_data );

    ?>
    <!--ya llamé a los dato-->
    <!--acá estoy parchando de manera cuma-->
    <?php $nombre_de_hoja = array(
      "01_Man",
      "02_Woman",
      "05_Assembly_group",
      "06_Assembly_family",
      "07_Girl",
      "08_Boy",
      "09_Authority_instruction",
      "25_Food",
      "29_School",
      "46_Earthquake",
      "48_Alluvium",
      "49_Avalanche",
      "51_Flood",
      "53_Info_point",
      "56_Messaging_twoways",
      "58_North_sign",
      "61_Wifi",
      "62_@_internet",
      "69_Warning_strip_2",
      "73_Arrow_backward"
    );?>
    <!--dejo el arreglo para otro día-->
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<h1>Esta es una prueba<br />
<small>Estoy leyendo el <a href="data.json">data.json</a> con PHP</small></h1>
</div>

<?php for ($a = 0; $a < $all = count($datos); $a++) {?>
   <?php 
   $q1=0; 
   $q2=0; 
   $q3=0; 
   $q4=0; 
   $q5=0; 
   $q6=0; 
   ?>
   
<div class="col-sm-10 col-sm-offset-1">
    <h2><?php echo($nombre_de_hoja[$a]);?></h2>
    <h3>Efectividad del no. %</h3>
    <h4>Tenemos <?echo (count($datos[$a]))?> respuestas.</h4>
    <h4>Desglose:</h4>
    <p>no. <strong>Correcta <code>[1]</code></strong></p>
    <p>no. <strong>Casi Correcta <code>[2]</code></strong></p>
    <p>no. <strong>Dudosa <code>[3]</code></strong></p>
    <p>no. <strong>Incorrecta <code>[4]</code></strong></p>
    <p>no. <strong>Significado Opuesto <code>[5]</code></strong></p>
    <p>no. <strong>Sin Respuesta <code>[6]</code></strong></p>
    <h4>Las respuestas fueron:</h4>
    <ol>
      <!--Aqui empiezo a jugar con los calculos y ponderaciones!
      Con un if, le digo que cada vez que encuentre un "1" en el puntaje,
      le vaya sumando a la variable $q1. Y asi con todas.-->
      <?php for ($b = 0; $b < $respuesta = count($datos[$a]); $b++) {?>
        <li><?php echo($datos[$a][$b]['respuesta']);?> <code>[<?php echo($datos[$a][$b]['puntaje']);?>]</code></li>
          <?php 
          if (($datos[$a][$b]['puntaje']) == "1"){
            $q1++;
             }
          if (($datos[$a][$b]['puntaje']) == "2"){
            $q2++;
             }
          if (($datos[$a][$b]['puntaje']) == "3"){
            $q3++;
             }
          if (($datos[$a][$b]['puntaje']) == "4"){
            $q4++;
             }
          if (($datos[$a][$b]['puntaje']) == "5"){
            $q5++;
             }
          if (($datos[$a][$b]['puntaje']) == "6"){
            $q6++;
             }
             
          $desempeno= ($q1+$q2*0.75+$q3*0.5)*100/($q1+$q2+$q3+$q4+$q5+$q6);
                };?>
      <li><?php echo ($q1);?></li>
    </ol>
    <h4>Totales:</h4>
    <p><strong><?php echo ($q1);?></strong> Correctas</p>
    <p><strong><?php echo ($q2);?></strong> Casi Correctas</p>
    <p><strong><?php echo ($q3);?></strong> Dudosas</p>
    <p><strong><?php echo ($q4);?></strong> Inorrectas</p>
    <p><strong><?php echo ($q5);?></strong> Opuestas</p>
    <p><strong><?php echo ($q6);?></strong> Sin Respuesta</p>
    <h4>Desempeno:</h4>
    <p><strong><?php echo (round($desempeno));?></strong>%</p>
    <hr />
  </div>
<?php };?>

<div class="clearfix"></div>
<div class="col-sm-10 col-sm-offset-1">
<pre>
<code>
<?php print_r($datos);?>
</code>
</pre>
</div>
</div><!--/row-->
</div><!--/container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
