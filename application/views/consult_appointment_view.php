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

    <h2>CompanyDent - Consultar citas</h2>
    <table>
        <tr>
            <th>Odontologo</th>
            <th>Fecha</th>
            <th>Hora</th>

        </tr>
        <?php
        foreach ($appointments as $appointment):
        ?>
        <tr>
            <td><?= $appointment->patientName ?></td>
            <td><?= $appointment->data_date ?></td>
            <td><?= $appointment->hour ?></td>
        </tr>
        <?php
        endforeach;

        ?>
    </table>
    <p><?php if(isset($resul)) { ?>
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
    <?php echo $resul; ?>
  </div> <?php } ?></p>
