<div class="container">

  <section class="contenido">
    <div class="row">
      <div class="tab-content">
        <div class="tab-pane  active" id="tab1">
          <div class="col-lg-4"></div>
          <div class="col-lg-4 text-center">
            <h2>Registro Tratamiento</h2>
            <form  style="padding:0px 15px; "class="form-horizontal" role="form" action="<?= base_url('user_management/saveDentist')?>" method="POST">
              <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="Identificacion"/>
              </div>
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username  "/>
              </div>
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombre  "/>
              </div>
              <div class="form-group">
                <input type="text" name="lastname" class="form-control" placeholder="Apellido  "/>
              </div>

                <div class="form-group">
                  Pacientes:
                  <?= form_dropdown('patients',$patients,0,['id'=>'patients']); ?>
                </div>

                <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Contraseña"/>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" value="Registrar">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
