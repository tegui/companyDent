
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
			            	<h2>Registro de paciente</h2>


							<form  style="padding:0px 15px; "class="form-horizontal" role="form" action="<?= base_url('user_management/save')?>" method="POST">
		            			<div class="form-group">
		            				<input type="text" name="id" class="form-control" placeholder="Identificacion"/>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="name" class="form-control" placeholder="Nombre  "/>
		            			</div>
		            			<div class="form-group">Fecha de nacimiento
		            				<input type="date" name="date" class= "datepicker" value=""/>
		            			</div>
		            		    <div class="form-group">
		            				<input type="email" name="email" class="form-control" placeholder="Email"/>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="phone" class="form-control" placeholder="Telefono"/>
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


<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/patients.js"></script>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
</body>
</html>
</body>
</html>
