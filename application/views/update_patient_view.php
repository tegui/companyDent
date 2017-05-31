<link rel="stylesheet" type="text/css" href="http://localhost/companyDent/css/tcal.css" />
<script type="text/javascript" src="http://localhost/companyDent/js/tcal.js"></script>
<body style="margin-top:100px; margin-left: 30px">
  <div class="container">

    <section class="contenido">
      <div class="row">
        <div class="tab-content">
          <div class="tab-pane  active" id="tab1">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center">
              <h2>Actualizar  paciente</h2>

              <?php foreach ($patients as $patient): ?>

                <form  style="padding:0px 15px; "class="form-horizontal" role="form" action="<?= base_url();?>user_management/update_patient/<?= $patient->id ?>" method="POST">

                  <div class="form-group">Identificacion
                    <input type="text" name="id"  value = '<?php echo $patient->id ?>' readonly="readonly" required/>
                  </div>
                  <div class="form-group">Nombre
                    <input type="text" name="name" class="form-control" value = '<?php echo $patient->name ?>' />
                  </div>
                  <div class="form-group">Apellido
                    <input type="text" name="lastname" class="form-control" value = '<?php echo $patient->lastname ?>' />
                  </div>
                  <div class="form-group">Fecha de nacimiento
                    <input type="text" name="date" class= "tcal" value = '<?php echo $patient->brithdate ?>' />
                  </div>
                  <div class="form-group">Email
                    <input type="email" name="email" class="form-control" value = '<?php echo $patient->email ?>' />
                  </div>
                  <div class="form-group">Telefono
                    <input type="text" name="phone" class="form-control" value = '<?php echo $patient->phone ?>' />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" value="Registrar">Actualizar</button>
                  </div>
                </form>
              <?php endforeach; ?>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
