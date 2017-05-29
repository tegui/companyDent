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
			            	<h2>Registro de odontologo</h2>
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
                        Tipo de Usuario:
                        <?= form_dropdown('specialty',['Endodoncia',
                                                      'Ortodoncia' ,
                                                      'Cirugía y traumatología'],0,['id'=>'specialty']); ?>
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
    <?php if(isset($resul)) { ?>
      <p style="text-align: center;">
      <?php echo $resul; ?>
      </p>
      <?php } ?>

<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/patients.js"></script>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
</body>
</html>
