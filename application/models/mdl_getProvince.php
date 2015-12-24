<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_getProvince extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getProvince($zipcode) // province and zipcode
	{
		$sql_query ='SELECT z.ZIPCODE,p.PROVINCE_ID,p.PROVINCE_NAME,a.AMPHUR_ID,a.AMPHUR_NAME,d.DISTRICT_ID,d.DISTRICT_NAME
		FROM zipcode z
		INNER JOIN mprovince p
		ON z.PROVINCE_ID = p.PROVINCE_ID
		INNER JOIN mamphur a
		ON z.AMPHUR_ID = a.AMPHUR_ID
		INNER JOIN mdistrict d
		ON z.DISTRICT_ID=d.DISTRICT_ID
		WHERE z.ZIPCODE ="'.$zipcode.'"';
		$query = $this->db->query($sql_query)->result_array();
		return $query;
	}

}

/* End of file mdl_getProvince.php */
/* Location: ./application/models/mdl_getProvince.php */