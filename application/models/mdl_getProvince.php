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
		$sql_query ='SELECT z.ZIPCODE,p.PROVINCE_NAME,a.AMPHUR_NAME,d.DISTRICT_NAME
		FROM zipcode z
		LEFT JOIN province p
		ON z.PROVINCE_ID = p.PROVINCE_ID
		LEFT JOIN amphur a
		ON z.AMPHUR_ID = a.AMPHUR_ID
		LEFT JOIN district d
		ON z.DISTRICT_ID=d.DISTRICT_ID
		WHERE z.ZIPCODE = "'.$zipcode.'"';
		$query = $this->db->query($sql_query)->result_array();
		return $query;
	}

}

/* End of file mdl_getProvince.php */
/* Location: ./application/models/mdl_getProvince.php */