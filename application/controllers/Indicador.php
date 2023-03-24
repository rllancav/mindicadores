<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Indicador extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('indicador_model');
	}

	public function index()
	{	
		$data['indicadors']  = $this->indicador_model->getAllIndicadors();
		$data['title'] = "INDICADORES";
		$this->load->view('indicadors/index',$data);
	}

	public function consulta($id)
	{
		$data['indicadors']  = $this->indicador_model->getAllIndicadoresvalores($id);
		$data['title'] = "VALORES DE INDICADORES";
		$this->load->view('indicadors/consulta',$data);	
	}

	public function carga()
		{
		$data['indicadors']  = $this->indicador_model->getAllIndicadors();
		$data['title'] = "CARGA DE INDICADORES";
		$this->load->view('indicadors/carga',$data);	
	}

	public function create(){
		$data['title'] = "Create Indicador";
		$this->load->view('indicadors/create',$data);
	}

	public function storeIndicador(){
	//	$data['title'] = $this->input->post('title');
		$data['descripcion'] = $this->input->post('descripcion');

		$this->indicador_model->storeIndicador($data);
		redirect('indicador');
	}

	public function edit($id){
		$data['indicador'] = $this->indicador_model->getIndicador($id);
		$data['title'] = "Edit Indicador";
		$this->load->view('indicadors/edit',$data);
	}

	public function updateIndicador($id){
		$data['id'] = $id;
		$data['descripcion'] = $this->input->post('descripcion');

		$this->indicador_model->updateIndicador($id,$data);
		redirect('indicador');
	}

	public function delete($id){
		$this->indicador_model->deleteIndicador($id);
		redirect('indicador');
	}
	
	public function cargadatos()
	{
		//$this->indicador_model->deleteIndicadorValor();
		?>
		<div id="progress" style="30px;width:100%;border:1px solid #ccc;"></div>
		<div class="row form-group">
		<div class="col-sm-15">
		<center><div id="information" style="width"></div></center>
		</div>
		</div>
		<div class="row form-group">
		<div class="col-sm-10">
		<center><div id="information1" style="width"></div></center>
		</div>
		</div>
	    <div class="row form-group">
		<div class="col-sm-10">
		<center><div id="information2" style="width"></div></center>
		</div>
		</div>
	
	<?php		
		$indicador =strtolower( $this->input->post("cod"));
		$fechaInicio = $this->input->post("ini");
		$fechaFin = $this->input->post("fin");

$date1 = new DateTime($fechaInicio);
$date2 = new DateTime($fechaFin);
$diff = $date1->diff($date2);


		# Fecha como segundos
		$tiempoInicio = strtotime($fechaInicio);
		//echo $tiempoInicio;
		
		$tiempoFin = strtotime($fechaFin);
		//echo $tiempoFin;
		# 24 horas * 60 minutos por hora * 60 segundos por minuto
		$dia = 86400;
        $i=-1;
		while($tiempoInicio <= $tiempoFin && $i <= $diff->days ){

		$fechaActual = date("d-m-Y", $tiempoInicio);
		$apiUrl = "https://mindicador.cl/api/".$indicador."/".$fechaActual;
			//Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
			if ( ini_get('allow_url_fopen') ) {
			$json = file_get_contents($apiUrl);
			} else {
			//De otra forma utilizamos cURL
			$curl = curl_init($apiUrl);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$json = curl_exec($curl);
			curl_close($curl);
			}
  
			$ind = json_decode($json);
				
			foreach($ind as $key => $value1) {
			
			if(!is_array($value1)) {
			}
            else
				{
				  $aux = $value1;
		
 $array1 = json_decode(json_encode($aux), true);
foreach ($array1 as $value) 
			$fec = $value["fecha"];
			$val = $value["valor"];	
	
			if(!empty($val))
					$valor = $val;
			else
					$valor = 0;
			if(!empty($fec))
			$fecha = $fec;
			else
			$fecha = $fechaActual; 

			$f = explode("T",$fecha);
			
			$timestamp = strtotime($f[0]);
			$f1=  date('Y-m-d', $timestamp);

            $data["mindicador"] = $indicador;
			$data["fecha"] = $f1;
			$data["valor"] = $valor;
			//echo "corr". $indicador." ".$f1." ".$valor."<BR>";
	        $this->indicador_model->storeIndicadorValor($data);

			$tiempoInicio += $dia;
		    $i = $i +1 ;
			$por =	intval($i/$diff->days * 100)."%";
			
   
			echo '<script language="javascript">
  document.getElementById("progress").innerHTML="<div style=\"width:'.$por.';background-color:red;\">&nbsp;</div>";
  document.getElementById("information").innerHTML="'.$i.'/'.$diff->days.' Registros Procesados...";
  document.getElementById("information1").innerHTML="'.$por.' Porcentaje...";
  document.getElementById("information2").innerHTML="Indicador:'.$indicador.'...";

	

 </script>';	
 // This is for the buffer achieve the minimum size in order to flush data
  echo str_repeat(' ',1024*64);

  // Send output to browser immediately
  flush();

  // Sleep one second so we can see the delay
  sleep(0);		
			
				
				
		}
	}	}	
}
}
