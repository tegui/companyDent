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

        foreach ($citas as $cita):
        
        ?>
        <tr>
            <td><?= $cita->nombre ?></td>
            <td><?= $cita->fecha ?></td>
            <td><?= $cita->hora ?></td>
        </tr>
        <?php
        endforeach;
        
        ?>
    </table>
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
    <p><?php if(isset($resul)) { echo $resul;} ?></p>

</div>

</body>
<p class="footer"><strong><input type="button" onclick="location.href='http://localhost/CompanyDent/index.php/Welcome'" value="Volver al menú" /></strong> </p>
</center>     
</html>

