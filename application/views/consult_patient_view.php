<style type="text/css">
    /*los estilos*/
    th{
        background-color: #222;
        color: #fff;
    }
    td{
        padding: 5px 40px 5px 40px;
        background-color: #D0D0D0;
    }
    label{
        display: block;
    }

</style>
<center>
    <br></<br>
    <br></<br>
    <br></<br>

    <h2>CompanyDent - Consultar Pacientes</h2>
    <table>
        <tr>
            <th>Identificacion</th>
            <th>Nombre</th>
            <th>Fecha de nacimiento</th>
            <th>Email</th>
            <th>Telefono</th>
            <th></th>
            <th></th>

        </tr>
        <?php

        foreach ($patients as $patient):

        ?>
        <tr>
            <td><?= $patient->id ?></td>
            <td><?= $patient->name ?></td>
            <td><?= $patient->birthdate ?></td>
            <td><?= $patient->email ?></td>
            <td><?= $patient->phone ?></td>
            <td><a href="<?= base_url();?>user_management/update/<?= $patient->id ?>">Modificar</a></td>
            <td><a href="<?= base_url()?>user_management/delete/<?= $patient->id ?>">Eliminar</a></td>

        </tr>
        </tr>
        <?php
        endforeach;

        ?>
    </table>

    <p><?php if(isset($resul)) {  ?>
      <div style=";
      bottom: -10%;
      left: 38.4%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 100px;
      text-align: center;
      border-radius: 25px;
      border: 4px solid #000000;
      padding: 20px;
      max-width: 300px;";>
      </div>
      <?php echo $resul;} ?>
    </p>




</body>
</center>
</html>
