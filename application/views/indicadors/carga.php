<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
		<style>
			 @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

			body {
				background-color: #673AB7;
				font-family: 'Calibri', sans-serif !important
			}

			.container {
				margin-top: 100px
			}

			.card {
				position: relative;
				display: -webkit-box;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-ms-flex-direction: column;
				flex-direction: column;
				min-width: 0;
				word-wrap: break-word;
				background-color: #fff;
				background-clip: border-box;
				border: 0px solid transparent;
				border-radius: 0px
			}
			}

			.card-body {
				-webkit-box-flex: 1;
				-ms-flex: 1 1 auto;
				flex: 1 1 auto;
				padding: 1.25rem
			}

			.card .card-title {
				position: relative;
				font-weight: 600;
				margin-bottom: 10px
			}

			.table {
				width: 100%;
				max-width: 100%;
				margin-bottom: 1rem;
				background-color: transparent
			}

			* {
				outline: none
			}

			.table th,
			.table thead th {
				font-weight: 500
			}

			.table thead th {
				vertical-align: bottom;
				border-bottom: 2px solid #dee2e6
			}

			.table th {
				padding: 1rem;
				vertical-align: top;
				border-top: 1px solid #dee2e6
			}

			.table th,
			.table thead th {
				font-weight: 500
			}

			th {
				text-align: inherit
			}
		</style>
		<script>
function ValIndicador() {
 var combo = document.getElementById("Indicador");
var cod = combo.options[combo.selectedIndex].text;
document.getElementById('cod').value= cod;
}
</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title m-b-0"><?=$title?></h5>
							<form method="post" action="<?=base_url('indicador/cargadatos')?>">
  <input type="text" id="cod" name="cod" class="form-control" required />
		

		<div class="form-group">
			
<?php 
								if(count($indicadors)>0){
								?>
								<select name="Indicador" id="Indicador" class="form-control"  onChange="ValIndicador();" >
								<OPTION>Seleccion Indicador</option>
		<?php
									foreach($indicadors as $ind){ 
									 ?>
									 <option value="<?php echo $ind->id ?>"><?php echo $ind->descripcion; ?></option>
                               		<?php 
									} ?>
								 </select>
									 <?php
									 
								}else{ ?>
								<tr><td>No Products</td></tr>
								<?php } ?>
	</div>


					
								 <div class="form-group">
								<input type="date" id="ini" name="ini" class="form-control" required />
								<label for="ini">Fecha Inicio:</label>

							</div>

							<div class="form-group">
							<input type="date" id="fin" name="fin" class="form-control" required />
							<label for="fin">Fecha Termino:</label>

							</div>
							
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Carga Datos</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
