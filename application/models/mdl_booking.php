<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_booking extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSale($idSale)
	{
		$sql = 
			"
			SELECT 
			CONCAT(m.firstname,' ',m.lastname) AS salename,
			m.id_mmember,
			m.mmember_code
			FROM mmember m
			WHERE m.id_mmember ='".$idSale."'
			";
		$query_sql = $this->db->query($sql)->result();
		return  $query_sql;
	}

}

/* End of file mdl_booking.php */
/* Location: ./application/models/mdl_booking.php */