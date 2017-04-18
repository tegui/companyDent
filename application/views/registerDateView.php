<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Registrar Cita</title>
</head>
<body style="margin-top:100px; margin-left: 30px">
<H1 style="text-align: center;">Registrar Cita</H1>
<div style="margin: auto; width:50%; height:50%; border: 3px solid black; padding: 10px; border-radius: 25px;">
  <?= form_open('registerDateController/disponibilidad'); ?>
  <p>
    <?= form_label('Por favor selecciona una especialidad odontológica :', 'especialidad'); ?>
    <?= form_dropdown('especialidad', $especialidades, 0,['id'=>'especialidad']); ?>
  </p>
  <?= form_submit('','Buscar'); ?>
  <?= form_close(); ?>

<?php if (isset($disponibles)) { ?>
  <br>
  <div class="available">
    <?= form_open('registerDateController/pedirCita'); ?>
    <table style="border-collapse: collapse;border: 1px solid black; padding: 5px;">
      <tr style="border: 1px solid black; padding: 10px;">
          <th style="border: 1px solid black; padding: 10px;">Odontologo</th>
          <th style="border: 1px solid black; padding: 10px;">Dia</th>
          <th style="border: 1px solid black; padding: 10px;">Hora</th>
      </tr>
      <?php
      $selected = 0;

      foreach ($disponibles as $cita):
        $ava = $availability[$cita->id];
        $days = array();
        while ($name = current($ava)) {
          $days[] = key($ava);
          next($ava);
        }
        $dispo = 'disponibilidad' . ($cita->id);
        $di = 'dia' . ($cita->id);
      ?>
        <tr>
          <td style="border: 1px solid black; padding: 10px;">
            <?=  form_radio(array('name' => 'disp', 'value' => $cita->id, 'checked' => ($cita->id == $selected) ? TRUE : FALSE, 'id' => $cita->id)) .  form_label($cita->nombre, $cita->id); ?>
          </td>
          <td style="border: 1px solid black; padding: 10px;">
            <?= form_dropdown($di, $days,0, ['id'=>$di]);?>
          </td>
          <td style="border: 1px solid black; padding: 10px;">
            <?= form_dropdown($dispo, $ava,0, ['id'=>$dispo]);?>
          </td>
        </tr>

      <?php

    endforeach; ?>
    </table>
    <br>
    <?= form_submit('', 'Solicitar Cita'); ?>
    <? form_close(); ?>
  </div>

<?php } ?>




  <div class="msg_result">
    <p><?php if(isset($result)) { echo $result;} ?></p>
  </div>

</div>

</body>
