<?php
 
 
class Indicador_model extends CI_Model{

	public function getAllIndicadors(){
		$indicadors = $this->db->get('mindicador')->result();
		return $indicadors;
	}

	public function getAllIndicadoresvalores($id){
	    $indicadors = $this->db->where('mindicador',$id)->get('mindicadorvalor')->result();
		return $indicadors;
	}




	public function storeIndicador($data){
		$this->db->insert('mindicador',$data);
	}

	public function getIndicador($id){
		return $this->db->where('id',$id)->get('mindicador')->row();
	}

	public function updateIndicador($id,$data){
		$this->db->where('id',$id)->update('mindicador',$data);
	}

	public function deleteIndicador($id){
		$this->db->where('id',$id)->delete('mindicador');
	}
	
	
	
	public function deleteIndicadorValor(){
		$this->db->where('id > 0')->delete('mindicadorvalor');
	}
	public function storeIndicadorValor($data){
		$this->db->insert('mindicadorvalor',$data);
	}
}
