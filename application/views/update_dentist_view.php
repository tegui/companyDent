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
			            	<h2>Actualizar  odontologo</h2>
						
			            	<?php foreach ($dentists as $dentist): ?>	

							<form  style="padding:0px 15px; "class="form-horizontal" role="form" action="<?= base_url();?>user_management/update_dentist/<?= $dentist->id ?>" method="POST">
							 
		            			<div class="form-group">Id
		            				<input type="text" name="id"  value = '<?php echo $dentist->id ?>' readonly="readonly" required/>
		            			</div>
		            			<div class="form-group">Nombre
		            				<input type="text" name="name" class="form-control" value = '<?php echo $dentist->name ?>' />
		            			</div>
		            			<div class="form-group">Apellido
		            				<input type="text" name="lastname" class="form-control" value = '<?php echo $dentist->lastname ?>' />
		            			</div>	            			
		            		    <div class="form-group">Especialidad
		            				<input type="text" name="specialty" class="form-control" value = '<?php echo $dentist->specialty ?>' />
		            			</div>
		            			            			
		            			<div class="form-group">
				            		<button type="submit" class="btn btn-primary btn-block" value="Actualizar">Actualizar</button>


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
<script src="<?php echo base_url();?>assets/js/dentist.js"></script>
<script src="<?php echo base_url();?>assets/js/login.js"></script>
</body>
</html>
</body>
</html>