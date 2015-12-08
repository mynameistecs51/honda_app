<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class datatables {

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('mdl_datatables');
	}

	public function getDatatables($requestData,$sqlQuery)
	{   // sample of requestData parameter
	 $totalData = $this->CI->mdl_datatables->getTotalData($sqlQuery['sql_full']);
	 $totalFiltered = $this->CI->mdl_datatables->getTotalData($sqlQuery['sql_search']);
	 $data_rs = $this->CI->mdl_datatables->getData($requestData,$sqlQuery['sql_search']);
	 $data=$this->setFieldArray($data_rs,$sqlQuery['sql_search']);
	 return $this->jsonData($data,$requestData,$totalData,$totalFiltered);
	}

	

	private function setFieldArray($Adata,$sql_search)
     {
        $columns = $this->GetColumns($sql_search);
        $data = array();
        
	    foreach ($Adata as $row) {
	        $nestedData=array(); 		
	        	foreach($columns as $field)
	    		{
		    		$nestedData[$field] = $row[$field];  	
	    		}
		$data[] = $nestedData;		
        }          
        return $data;
    }

	private function GetColumns($sql_search)
	{
		return $this->CI->mdl_datatables->GetColumnName($sql_search);
	}

    private function jsonData($data,$requestData,$totalData,$totalFiltered)
    {
    	$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
		echo json_encode($json_data);  // send data as json format
    }
}?>

