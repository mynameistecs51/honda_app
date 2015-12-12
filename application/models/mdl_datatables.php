<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_datatables extends CI_Model
{

public function __construct()
{
  parent::__construct();
}

public function getTotalData($sqlQuery)
{
  $sql=" $sqlQuery ";
  $query= $this->db->query($sql);
  return $query->num_rows();
}
 
 public function getData($requestData,$sqlQuery)
 {
   $columns = $this->GetColumnName($sqlQuery);
   $sql=" $sqlQuery ";
   $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']. " ";  // adding length
   $sql.= " LIMIT ".$requestData['start'].", ".$requestData['length']." ";
   $result=$this->db->query($sql);
   return $result->result_array();
 
 }

  public function GetColumnName($sql)
    {
        $columns=array();
        $query = $this->db->query($sql);
        foreach ($query->list_fields() as $field)
        {
           $columns[] = $field;
        } 
        return $columns;
    }
}
