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

    <h2>CompanyDent - Consultar odontologos</h2>
    <table>
        <tr>
            <th>Identificacion</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Especialidad</th>           
            <th></th>
            <th></th>
                    
        </tr>
        <?php

        foreach ($dentists as $dentist):
        
        ?>
        <tr>
            <td><?= $dentist->id ?></td>
            <td><?= $dentist->name ?></td>
            <td><?= $dentist->lastname ?></td>
            <td><?= $dentist->specialty ?></td>
            <td><a href="<?= base_url();?>user_management/update_dent/<?= $dentist->id ?>">Modificar</a></td>
            <td><a href="<?= base_url()?>user_management/delete_dentist/<?= $dentist->id ?>">Eliminar</a></td>
               
        </tr>
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
</center>     
</html>

