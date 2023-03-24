<!DOCTYPE html>	
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<SCRIPT>
 
    $(document).ready(function() {
      table = $('#example').DataTable({ 
  
		"language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
            }
      });
    });
</SCRIPT>

  </head>
    <body>
	 <div class="container">
			<div class="row">
			<div class="col-12 mb-3 text-right">
				<a href="<?=base_url('indicador/carga')?>" class="btn btn-primary">Carga Indicador</a>
			</div>
				<div class="col-12">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title m-b-0"><?=$title?></h5>
						
						</div>
						
        <table id="example" class="table table-striped table-bordered" style="width:100%">
      
           <thead>
								<tr>
									<th scope="col">Indicador</th>
								    <th scope="col">Fecha</th>
								   <th scope="col">Valor</th>
							
								
								</tr>
							</thead>
						
       
        <tbody>
         

								<?php 
								if(count($indicadors)>0){
									foreach($indicadors as $indicador){ ?>
									<tr>
										<td><?=$indicador->mindicador?></td>
										<td><?=$indicador->fecha?></td>
										<td><?=$indicador->valor?></td>
										
									</tr>
									<?php 
									}
								}else{ ?>
								<tr><td>No Indicadores</td></tr>
								<?php } ?>
							</tbody>
						</table>			
					
        </tbody>
        <tfoot>
           	<tr>
									<th scope="col">Indicador</th>
								    <th scope="col">Fecha</th>
								   <th scope="col">Valor</th>
							
								
								</tr>
        </tfoot>
    </table>
    </body>
</html>
