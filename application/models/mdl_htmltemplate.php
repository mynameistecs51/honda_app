<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_htmltemplate extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

 public function sel_province()   
  {
    $sql = "SELECT id_mprv,id_mzone,name_th 'province_nameth' from mprv" ;
    $result=$this->db->query($sql);
    return $result->result_array();
  }

  public function sel_district($PROVINCE_ID)   
  {
    $sql = "SELECT  id_mdist,name_th 'district_nameth' from mdist where id_mprv='$PROVINCE_ID' and name_th NOT LIKE '%*%' " ;
    $result=$this->db->query($sql);
    return $result->result_array();
  }

  public function sel_mcmp_auto($id_mcmp)   
  {
    $sql = "SELECT id_mcmp,name_th 'mcmp_nameth' from mcmp where id_mcmp='$id_mcmp' ";
    $result=$this->db->query($sql);
    return $result->result_array();
  }
  public function sel_mzone()   
  {
    $sql = "SELECT id_mzone,mzone_code from mzone" ;
    $result=$this->db->query($sql);
    return $result->result_array();
  }
  public function get_mcmp_detail($id_mcmp)   
  {
    $sql = "SELECT
				a.id_mcmp,
				a.id_mprv,
				a.id_mdist,
			  	b.id_mzone,
				a.adr_line,
				a.contact,
				a.telephone,
				a.fax
			FROM
				mcmp a
			LEFT JOIN mprv b ON a.id_mprv = b.id_mprv WHERE id_mcmp='$id_mcmp' ";
    $result=$this->db->query($sql);
    return $result->result();
  }

  public function get_mcmp_ajax_search($keyword)
  {
  	$sql = "SELECT id_mcmp,name_th 'mcmp_nameth' from mcmp where name_th LIKE '%$keyword%' LIMIT 20;" ;
  	$q = $this->db->query($sql);
    return $q->result_array();
  }

}
