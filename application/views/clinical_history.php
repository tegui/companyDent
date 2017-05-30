<div class="container">

  <section class="contenido">
    <div class="row">
      <div class="tab-content">
        <div class="tab-pane  active" id="tab1">
          <div class="col-lg-4"></div>
          <div class="col-lg-4 text-center">
            <h2 style="margin-top: 100px;">Registro Tratamiento</h2>
            <form  style="padding:0px 15px; "class="form-horizontal" role="form" action="<?= base_url('dentist/saveClinicalHistory')?>" method="POST">
              <div class="form-group">
                Paciente:
                <?= form_dropdown('patientId',$patients,0,['id'=>'patientId']); ?>
              </div>

              <div class="form-group">
                <textarea type="text" name="diagnose" class="form-control" placeholder="Diagnóstico"/></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" value="Registrar">Registrar historia</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
