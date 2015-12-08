<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modalDatatables {

	public function __construct()
	{
		$this->CI =& get_instance();
	}
	/***dataParameter formats  in array***/
	/*
		1.รูปแบบ การกำหนด ชื่อ title ของ modal
		$dataParameter['modal'] = array("screenName" => "ตาราง Datatables test");
		2.รูปแบบ การกำหนด หัวข้อ TH ของตาราง
		$dataParameter['modal']['th'] = array("รหัสพนักงาน","ชื่อ-สกุล(ภาษาไทย)");
		3.รูปแบบ การเรียก modal จากการคลิกส์ที่ <input type="text">
		$dataParameter['datatables']['click'] = array("URL" => "ctl_test/getList", // กำหนด URL ของการ Query
											          "ID" => "input1",	// กำหนด ชื่อ ID ช่อง input สำหรับคลิกส์และรับข้อมูล 										          
											          "gettype" => "table", // กำหนดประเภทของรับข้อมจากแหล่งใด มี 3 รูปแบบ คือ 'table'=รับข้อมูลจากช่อง TD ของ table ,'inputID'=รับข้อมูลจาก input ที่ใช้ค่า ID ,'inputClass'=รับข้อมูลจาก input ที่ใช้ค่า Class
											          "getvalue" => "0");//if gettype = 'table' then value = index of table TD tag elseif gettype = 'inputID/Class' then value = ID/Class of input type hidden or text
		4.รูปแบบ การรีบข้อมูลหลังจาก เลือกข้อมูลจาก modal ที่ต้องการรับค่ามากกว่า 1 ค่า
		$dataParameter['datatables']['GetIDclick'][] = array('ID' => 'input3', 'gettype'=>'table' ,'getvalue' => '0'); // get type 'table' , 'inputID', 'inputClass'  มี 3 รูปแบบเช่นกัน
		5.รูปแบบ การกำหนด function อื่นของ datatables เพิ่มเติม
		$dataParameter['datatables']['functions']  = array('iDisplayLength' => 6,'bFilter' => true );// กำหนดจำนวน records,ใช้ช่อง search ตามลำดับ
		6.รูปแบบ การกำหนด Columnsที่แสดงใน TD มี 4 รูปแบบ ดังนี้
		 1>แบบทั่วไป sWidth = กำหนดความกว้าง , mData = กำหนด field ที่ต้องการแสดง
		 $dataParameter['datatables']['aoColumns'][] =  array('sWidth' => 10, 'mData' => 'memp_code');
		 2>แบบ IFELSE กำหนด mRender array rule=if เพื่อสร้างโค้ด JS ใช้ IFELSE, 'iffield'=ฟิลด์ ,'ifvalue'=ค่า ที่ต้องการตรวจสอบ , 'rsyes/no'=ผลลัพท์ที่ต้องการแสดง
		 $dataParameter['datatables']['aoColumns'][] =  array('sWidth' => 10, 'mData' => 'status', 'bSortable'=> 'false',
															 'mRender' => array('rule' => 'if','iffield' => 'status','ifvalue' => '1','rsyes'=>'ใช้งาน','rsno'=>'ยกเลิก'));
		 3>แบบ เพิ่ม input แบบ hidden
		 $hiddenClass[] =  array('nameClass'=> 'x_memp_name', 'mData'=>'name_th'); / 'nameClass'=ชื่อClass ของ input hidden, 'mData'= ฟิลด์ที่ต้องการเก็บ ใน Value
		 $hiddenClass[] =  array('nameClass'=> 'x_mobile', 'mData'=>'mobile');
		 กำหนด mRender array rule=hidden เพื่อสร้างโค้ด JS ของ input hidden ที่กำหนด ใน $hiddenClass[]
		 $dataParameter['datatables']['aoColumns'][] =  array('sWidth' => 10, 'mData' => 'comment', 'bSortable'=> 'false',
															 'mRender' => array('rule' => 'hidden','Class'=>$hiddenClass));
		 4>แบบ เพิ่ม View modal ำหนด mRender array rule=action เพื่อสร้างโค้ด JS ของ ดำเนินการ view modal 'idfield' =ค่าID ของข้อมูลที่จำส่งไป Where ใน Query,'url_view' = หน้าที่ต้องการแสดง ใน modal view 
		 $dataParameter['datatables']['aoColumns'][] =  array('sWidth' => 10, 'mData' => 'null', 'bSortable'=> 'false',
															 'mRender' => array('rule' => 'action','idfield' => 'id_memp','url_view' => 'ctl_test/DETAIL/')); 													 
	*/

	/***main call function***/
	public function getModalDatatables($dataParameter)
	{
    return "<script type=\"text/javascript\" charset=\"utf-8\">

	      $(\"#".$dataParameter['datatables']['click']['ID']."\").click(function(){    
	      var screenname='".$dataParameter['modal']['screenName']."';
	 	      var n='datatables';
	      modal_datatables(n,screenname);
	      		$('#datatablesmodal').DataTable({ 
			        responsive: true,			        
			        tableTools: {
			                        \"sRowSelect\": \"os\",
			                        \"aButtons\": [ \"select_all\", \"select_none\" ]
			                    },
			         \"oLanguage\": {
			                        \"sProcessing\": \"<img height='32' width='32' src='".base_url()."images/ajax-loader.gif'>\",
			                        \"sSearch\": \"".$sSearch="ค้นหา :"."\",
			                        \"sInfo\": \"".$Showing="จำนวนข้อมูล"." _START_ ".$to="ถึง"." _END_ ".$total="จาก"." _TOTAL_  ".$total="รายการทั้งหมด"."\",
			                        \"sInfoFiltered\": \"(จากข้อมูลที่ค้นหาทั้งหมด _MAX_ รายการ)\",
			        \"oPaginate\": {
			                        \"sFirst\": \"".$sFirst="ไปหน้าแรก"." \",
			                        \"sLast\": \"".$sLast="ไปหน้าสุดท้าย"."\",
			                        \"sNext\": \"".$sNext="ถัดไป"." \",
			                        \"sPrevious\": \" ".$sPrevious="ย้อนกลับ"." \"                      
			                        }},

			        \"bFilter\": false,
			        \"bLengthChange\": false,
			        \"iDisplayLength\": 3,
			        \"order\": [[ '0', \"DESC\" ]], 
			        \"processing\": true,
			        \"serverSide\": true,
			        \"ajax\":{
			            url :\"".base_url().$dataParameter['datatables']['click']['URL']."\", // json datasource
			            type: \"post\",  // method  , by default get            
			            error: function(){  // error handling        
			                $(\".datatablesmodal-error\").html(\"\");
			                $(\"#datatablesmodal tbody tr\").remove();                            
			                $(\"#datatablesmodal_processing\").css(\"display\",\"none\");                            
			            }
			        },
			        \"aoColumns\": [".$this->getFnaoColumns($dataParameter)."],
			        ".$this->getFnDatatables($dataParameter)."
			        	} );
			     
				      	var modal = $('#myModal'+n);
				        	modal.on('show.bs.modal').modal({backdrop: 'static',keyboard: true});
			       
		$('#datatablesmodal tbody').on( 'click', 'img.view', function () {
           datatablesmodelview($(this).data('idview'));			
          } );

        $('#datatablesmodal tbody').on( 'click', 'td', function () {
           var findview = $(this).find('img.view').length;
           if(findview==0){
           var idxtr = $(this).closest('tr').index();
           var value = ".$this->getClickValue($dataParameter)."
           $('#".$dataParameter['datatables']['click']['ID']."').val(value);
           ".$this->getIDclickValue($dataParameter)."
           $('#myModaldatatables').modal('hide');
           }		
          } );
		
			       });

    function datatablesmodelview(num)
    { 
      var screenname=\"รายละเอียดข้อมูลพนักงาน\"; 
      var baseurl_detail = $('.datatable_url_view').val();
      var url=baseurl_detail+num; 
      var n='view';
      $('.datatablesmodalL2').html('');
      modal_form_view_datatables(n,screenname);
      var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
            modal.on('show.bs.modal', function () {
            modalBody.load(url);
            }).modal({backdrop: 'true',keyboard: true});
    }

	function modal_datatables(n,screenname)
	{
		    var div='';
		    div+='<form name=\"main\" role=\"form\" data-toggle=\"validator\" id=\"form\" method=\"post\">';
		    div+='<!-- Modal -->';
		    div+='<div class=\"modal modal-datatables fade \" id=\"myModal'+n+'\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">';
		    div+='<div class=\"modal-dialog\">';
		    div+='<div class=\"modal-content\">';
		    div+='<div class=\"modal-header\" style=\"background:#B40404;color:#FFFFFF;\">';
		    div+='<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>';
		    div+='<h4 class=\"modal-title\">'+screenname+'</h4>';
		    div+='</div>';
		    div+='<div class=\"modal-body\">';
		    div+='<table id=\"datatablesmodal\"  cellpadding=\"0\" cellspacing=\"0\" class=\"table table-striped table-hover\" width=\"100%\"  >';
		    div+='      <thead>';                       
		    div+='        <tr>';
		    ".$this->getFnTableTH($dataParameter)."
		    div+='        </tr>';
		    div+='      </thead>';
		    div+='      </table>';
		    div+='</div>';
		    div+='<div class=\"modal-footer\" style=\"text-align:center; background:#F6CECE;\">';
		  //div+='<button type=\"submit\" id=\"save\" class=\"btn btn-modal\"><span class=\"   glyphicon glyphicon-floppy-saved\"> บันทึก</span></button>';
		  //div+='<button type=\"reset\" class=\"btn btn-modal\" data-dismiss=\"modal\"><span class=\"   glyphicon glyphicon-floppy-remove\"> ยกเลิก</span></button>';
		    div+='</div>';
		    div+='</div><!-- /.modal-content -->';
		    div+='</div><!-- /.modal-dialog -->';
		    div+='</div><!-- /.modal -->';
		    div+='</form>';
		  	$('.datatablesmodalL1').html(div);
	   }

	function modal_form_view_datatables(n,screenname)
	   {
	   	var div='';
	   	div+='<form name=\"main\" role=\"form\" data-toggle=\"validator\" id=\"form\" method=\"post\">';
	    div+='<!-- Modal -->';
	  	div+='<div class=\"modal modal-wide fade\" id=\"myModal'+n+'\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">';
	  	div+='<div class=\"modal-dialog\">';
	  	div+='<div class=\"modal-content\">';
	  	div+='<div class=\"modal-header\" style=\"background:#B40404;color:#FFFFFF;\">';
	  	div+='<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>';
	  	div+='<h4 class=\"modal-title\">'+screenname+'</h4>';
	  	div+='</div>';
	  	div+='<div class=\"modal-body\">';
	    div+='</div>';
	  	div+='<div class=\"modal-footer\" style=\"text-align:center; background:#F6CECE;\">';
	  	//div+='<button type=\"reset\" class=\"btn btn-modal\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-floppy-remove\"> ปิด </span></button>';
	  	div+='</div>';
	  	div+='</div><!-- /.modal-content -->';
	  	div+='</div><!-- /.modal-dialog -->';
	  	div+='</div><!-- /.modal -->';
	    div+='</form>';
		$('.datatablesmodalL2').html(div);
	   }
	</script>
	<style type=\"text/css\">
		.modal.modal-datatables .modal-dialog {  width: 80%; }
	</style>
	<div class=\"datatablesmodalL1\"></div>
	<div class=\"datatablesmodalL2\"></div>
		";   
	}

	private function getClickValue($dataParameter)
	{
		$fndata='';
					 if(!empty($dataParameter['datatables']['click']['gettype'])  && !empty($dataParameter['datatables']['click']['ID'])
					 																&& is_numeric($dataParameter['datatables']['click']['getvalue'])
					 																&& $dataParameter['datatables']['click']['gettype'] == 'table'){
					 	$fndata.="$('#datatablesmodal tbody tr:eq('+idxtr+')').find('td:eq(".$dataParameter['datatables']['click']['getvalue'].")').html();";

					 }elseif(!empty($dataParameter['datatables']['click']['gettype'])  && !empty($dataParameter['datatables']['click']['ID'])
					 																	 && !empty($dataParameter['datatables']['click']['getvalue'])
					 																	 && $dataParameter['datatables']['click']['gettype'] == 'input'){
					 	$fndata.="$('#".$dataParameter['datatables']['click']['getvalue']."').val();";
					 }else{

					 	$fndata.="\"\"";
					 }					 
		return $fndata;
			
	}
	private function getIDclickValue($dataParameter)
	{
		$fndata='';
		if(!empty($dataParameter['datatables']['GetIDclick'])){
		foreach ($dataParameter['datatables']['GetIDclick'] as $fnkey => $fnval) {
					
					if(!empty($fnval['ID']) && !empty($fnval['gettype']) 
											&& is_numeric($fnval['getvalue']) 											
											&& $fnval['gettype']=='table')
					{        	
			    		$fndata.="$('#".$fnval['ID']."').val($('#datatablesmodal tbody tr:eq('+idxtr+')').find('td:eq(".$fnval['getvalue'].")').html());\n";

			    	}elseif(!empty($fnval['ID']) && !empty($fnval['gettype'])
			    								 && !empty($fnval['getvalue'])
												 && $fnval['gettype']=='inputID')
			    	{
			    		$fndata.="$('#".$fnval['ID']."').val($('#".$fnval['getvalue']."').val());\n";
			    	}elseif(!empty($fnval['ID']) && !empty($fnval['gettype'])
			    								 && !empty($fnval['getvalue'])
												 && $fnval['gettype']=='inputClass')
			    	{
			    		$fndata.="$('#".$fnval['ID']."').val($('#datatablesmodal tbody tr:eq('+idxtr+')').find('input.".$fnval['getvalue']."').val());\n";
			    	}else{

			    		$fndata.="";
			    	}

			    }
		}
		return $fndata;
	}
	private function getFnDatatables($dataParameter)
	{
		$fndata='';
		foreach ($dataParameter['datatables']['functions'] as $fnkey => $fnval) {
			            	$fndata.="\"".$fnkey."\":\"".$fnval."\",";
			    }
		return $fndata;

	}
	private function getFnTableTH($dataParameter)
	{
		$fndata='';
		foreach ($dataParameter['modal']['th'] as $fnval) {
			            	$fndata.="div+='<th>".$fnval."</th>';\n";
			    }
		return $fndata;

	}

	private function setHTMLhidden($data)
	{
		$fndata='';
		foreach ($data as $fnkey => $fnval) {
			    	$fndata.="html +='<input type=\"hidden\" class=\"".$fnval['nameClass']."\" value=\"' + full['".$fnval['mData']."'] + '\">';\n\t\t\t\t\t\t";
			    }
		return $fndata;
	}

	private function getFnaoColumns($dataParameter)
	{
		$fndata='';
		foreach ($dataParameter['datatables']['aoColumns'] as $fnkey => $fnval) {

					$fndata.='{';
	            	if(!empty($fnval['sWidth'])) {
	            		$fndata.="\"sWidth\": \"".$fnval['sWidth']."%\",\n";
	                }
	                if(!empty($fnval['mData'])) {
	                	$fndata.="\"mData\": \"".$fnval['mData']."\",\n";
	                }
	                if(!empty($fnval['bSortable'])) {
	                	$fndata.="\"bSortable\": ".$fnval['bSortable'].",\n";
	                }
	                if (!empty($fnval['mRender'])) {
	                	if(!empty($fnval['mRender']['rule']) && !empty($fnval['mRender']['iffield']) 
	                										 && !empty($fnval['mRender']['ifvalue']) 
	                										 && !empty($fnval['mRender']['rsyes'])
	                										 && !empty($fnval['mRender']['rsno']) 
	                										 && $fnval['mRender']['rule']=='if'){
	                	$fndata.="\"mRender\": function(data, type, full) { 
			                        if(full['".$fnval['mRender']['iffield']."']=='".$fnval['mRender']['ifvalue']."'){ return \"".$fnval['mRender']['rsyes']."\"; }else{ return \"".$fnval['mRender']['rsno']."\"; } 
			                      },\n";
	                	}

	                	if(!empty($fnval['mRender']['rule']) && !empty($fnval['mRender']['idfield'])
	                										 && !empty($fnval['mRender']['url_view'])
	                										 && $fnval['mRender']['rule']=='action'){
						$fndata.=" \"mRender\": function(data, type, full) { 
			                        var html ='';
			                        html +='<img src=\"".base_url()."images/list_view.png\"   title=\"รายละเอียด\" class=\"btnopt view\" data-idview=\"' + full['".$fnval['mRender']['idfield']."'] + '\"></img>';
			                         /*if($('#btn_view').val()==1){ 
			                            html +='<img src=\"".base_url()."images/list_view.png\"   title=\"รายละเอียด\" class=\"btnopt view\" data-idview=\"' + full['".$fnval['mRender']['idfield']."'] + '\"></img>';
			                        }else{ 
			                            html +='<img src=\"".base_url()."images/un_list_view.png\"   title=\"ไม่ได้รับสิทธิ์ดูรายละเอียด\" class=\"btnoptUnclick\" data-idview=\"' + full['".$fnval['mRender']['idfield']."'] + '\"></img>';
			                        } 
			                       if($('#btn_edit').val()==1){ 
			                            html +='<img src=\"".base_url()."images/list_edit.png\"   title=\"แก้ไข\" class=\"btnopt edit\" data-idedit=\"' + full['".$fnval['mRender']['idfield']."'] + '\"></img>';
			                        }else{ 
			                            html +='<img src=\"".base_url()."images/un_list_edit.png\"   title=\"ไม่ได้รับสิทธิ์แก้ไขข้อมูล\" class=\"btnoptUnclick\" data-idedit=\"' + full['".$fnval['mRender']['idfield']."'] + '\"></img>';
			                        }*/		                            
			                            html +='<input type=\"hidden\" ID=\"id_memp' + full['".$fnval['mRender']['idfield']."'] + '\" value=\"' + full['".$fnval['mRender']['idfield']."'] + '\">';
			                            html +='<input type=\"hidden\" class=\"datatable_url_view\" value=\"".$fnval['mRender']['url_view']."\">';
			                        return html;
			                      }";
						}
						if(!empty($fnval['mRender']['rule']) && !empty($fnval['mRender']['Class'])	                										 
	                										 && $fnval['mRender']['rule']=='hidden'){
						$fndata.=" \"mRender\": function(data, type, full) { 
			                        var html ='';
			                        ".$this->setHTMLhidden($fnval['mRender']['Class'])."
			                        return html;
			                      }";
						}

	                }	$fndata.="},";

			    }
		return $fndata;
	}

}?>