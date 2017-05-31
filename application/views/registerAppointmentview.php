
<body style="margin-top:100px; margin-left: 30px">
  <H1 style="text-align: center;">Pedir Cita</H1>
  <div style="margin: auto; width:50%; height:50%; border: 3px solid black; padding: 10px; border-radius: 25px;">
    <?= form_open('user/dentistAvailability'); ?>
    <p>
      <?= form_label('Por favor selecciona una especialidad odontológica :', 'especialidad'); ?>
      <?= form_dropdown('especialidad', $specialties, 0,['id'=>'especialidad']); ?>
    </p>
    <?= form_submit('','Buscar'); ?>
    <?= form_close(); ?>

    <?php if (isset($available)) { ?>
      <br>
      <div class="available">
        <?= form_open('user/requestAppointment'); ?>
        <table style="border-collapse: collapse;border: 1px solid black; padding: 5px;">
          <tr style="border: 1px solid black; padding: 10px;">
            <th style="border: 1px solid black; padding: 10px;">Odontologo</th>
            <th style="border: 1px solid black; padding: 10px;">Dia</th>
            <th style="border: 1px solid black; padding: 10px;">Hora</th>
          </tr>
          <?php
          $selected = 0;
          foreach ($available as $appointment):
            $ava = $appointment['availability'];
            $days = array();
            while ($name = current($ava)) {
              $days[] = key($ava);
              next($ava);
            }
            $dispo = 'disponibilidad';
            $di = 'dia';
            ?>
            <tr>
              <td style="border: 1px solid black; padding: 10px;">
                <?=  form_radio(array('name' => 'disp', 'value' => $appointment['dentist_id'], 'checked' => ($appointment['dentist_id'] == $selected) ? TRUE : FALSE, 'id' => $appointment['dentist_id'])) .  form_label($appointment['name'], $appointment['dentist_id']); ?>
              </td>
              <td style="border: 1px solid black; padding: 10px;">
                <?= form_dropdown($di, $days,0, ['id'=>$di]);?>
              </td>
              <td style="border: 1px solid black; padding: 10px;">
                <?= form_dropdown($dispo, $appointment['availability'],0, ['id'=>$dispo]);?>
              </td>
            </tr>

            <?php
          endforeach; ?>
        </table>
        <br>
        <?= form_submit('', 'Pedir Cita'); ?>
        <? form_close(); ?>
      </div>

      <?php } ?>




      <div class="msg_result">
        <p><?php if(isset($result)) { echo $result;} ?></p>
      </div>

    </div>
