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
<H1>Registrar Cita</H1>
<div>
  <?= form_open('registerDateController/disponibilidad'); ?>
  <p>
    <?= form_label('Especialidad odontológica :', 'especialidad'); ?>
    <?= form_dropdown('especialidad', $especialidades, 0,['id'=>'especialidad']); ?>
  </p>
  <?= form_submit('','Buscar'); ?>
  <?= form_close(); ?>

<?php if (isset($disponibles)) { ?>
  Resultados ------
  <div class="available">
    <?= form_open('registerDateController/pedirCita'); ?>

      <?php
      $selected = 0;
      foreach ($disponibles as $cita):
      ?>

      <table>
        <tr>
            <th>Odontologo</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
      </table>
      <td>
        <?=  form_radio(array('name' => 'disp', 'value' => $cita->id, 'checked' => ($cita->id == $selected) ? TRUE : FALSE, 'id' => $cita->id)) .  form_label($cita->nombre, $cita->id); ?>
      </td>
      <?php

    endforeach; ?>
    <br>
    <?= form_submit('', 'Solicitar Cita'); ?>
    <? form_close(); ?>
  </div>

<?php } ?>




  <div class="msg_result">
    <p><?php if(isset($result)) { echo $result;} ?></p>
  </div>

</div>
<div style="margin-top: 50px;">
  <p>
    <input type="button" onclick="location.href='http://localhost/Tarea_Marzo24/index.php/Menu/';" value="Volver al menú" />
  </p>
</div>

</body>
