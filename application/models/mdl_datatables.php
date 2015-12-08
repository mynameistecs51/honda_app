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

 /*public function GetColumnName($sql)
    {
        $columns = array();
        $result = mysql_query($sql);
        // get column metadata 
        $i = 0;
        while ($i < mysql_num_fields($result)) {
            $meta = mysql_fetch_field($result, $i);
            if ($meta) {
                $columns[$i] = $meta->name;
                $i++;
            }         
        }
        mysql_free_result($result);
        return $columns;
    }
  */




























    /*function Total_Row($data)
    {
      $sql = $this->Table($data);

      $query = $this->db->query($sql);
      return $query->num_rows();
    }

    function Table($data)
    {
      $field = implode(",", $data['field']);

      if($data['table'] == "")
      {
        $sql = $data['full_sql'];
      }
      else
      {
        $sql = "SELECT ".$field." FROM ".$data['table']."";
      }

      if(isset($data['search']) && $data['search'] != "")
      {
        $sql .= " WHERE CONCAT_WS('', ".$field.") LIKE '%".$data['search']."%' ";
      }

      return $sql;
    }

    function Get_Data($data, $start_row, $limit)
    {
      $sql = $this->Table($data);

      $sql .= " LIMIT $start_row, $limit";
      
      $q = $this->db->query($sql);
      return $q->result();
    }*/
}
