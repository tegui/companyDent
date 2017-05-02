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
						
			            	<?php foreach ($patients as $patients): ?>	

							<form  style="padding:0px 15px; "class="form-horizontal" role="form" action="<?= base_url();?>user_management/update_patient/<?= $patients->id ?>" method="POST">
							 
		            			<div class="form-group">Identificacion
		            				<input type="text" name="id"  value = '<?php echo $patients->id ?>' readonly="readonly" required/>
		            			</div>
		            			<div class="form-group">Nombre
		            				<input type="text" name="name" class="form-control" value = '<?php echo $patients->name ?>' />
		            			</div>
		            			<div class="form-group">Fecha de nacimiento
		            				<input type="text" name="date" class= "tcal" value = '<?php echo $patients->brithdate ?>' />
		            			</div>		            			
		            		    <div class="form-group">Email
		            				<input type="email" name="email" class="form-control" value = '<?php echo $patients->email ?>' />
		            			</div>
		            			<div class="form-group">Telefono
		            				<input type="text" name="phone" class="form-control" value = '<?php echo $patients->phone ?>' />
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

 
<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/patients.js"></script>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
</body>
</html>
</body>
</html>