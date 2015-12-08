<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HTMLtemplate{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('mdl_htmltemplate');
	}

	public function getHTML($fn)
	{
		switch ($fn) {
			case 'mcmp_info':
				return $this->companyInfo();
				break;
			
			/*default:
				return $this->companyInfo();
				break;*/
		}
	}

	private function companyInfo()
	{
		return "
				<div class=\"row form_input\" style=\"text-align:left;\"> 
					<div class=\"col-md-6\">
					<fieldset>
					<legend>ข้อมูลบริษัทหลัก</legend>     
					  <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					  <div class=\"col-md-7\">
					    <p>ชื่อบริษัทหลัก</p><p class=\"required\">*</p> 
					      <select name=\"main_id_mcmp\" ID=\"main_id_mcmp\" class=\"selectpicker form-control input-sm \"  data-live-search=\"true\" title=\"--เลือก--\" >
					     </select>
					    <div class=\"help-block with-errors\"></div>
					  </div>
					  <div class=\"col-md-5\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">    
					    <p>ชื่อผู้ติดต่อ</p><p class=\"required\">*</p>
					    <input type=\"text\" class=\"input form-control\" name=\"main_mcmp_contact\" ID=\"main_mcmp_contact\" >
					  </div>
					  </div>
					</div>
					<div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					  <div class=\"col-md-7\">
					    <p>ที่อยู่บริษัท</p><p class=\"required\">*</p>
					    <textarea class=\"form-control\" ID=\"main_adr_mcmp\" name=\"main_adr_mcmp\" style=\"height: 100px; padding:5px;\"></textarea>
					  </div>
					  <div class=\"col-md-5\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					      <p>เบอร์โทรศัพท์</p><p class=\"required\">*</p>
					      <input type=\"text\" class=\"input form-control\" ID=\"main_mcmp_call\" name=\"main_mcmp_call\" >
					    </div>
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					      <p>Fax.</p>
					      <input type=\"text\" class=\"input form-control\" ID=\"main_mcmp_fax\" name=\"main_mcmp_fax\" >
					    </div>
					  </div>
					  </div>

					  <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					  <div class=\"col-md-4\">
					    <p>ชื่อจังหวัด</p> 
					      <select name=\"main_province\" ID=\"main_province\" class=\"selectpicker show-tick form-control input-sm \"  style=\"display: none;\"  data-live-search=\"true\" title=\"--เลือก--\"  >
					        <option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>
					     </select>
					    <div class=\"help-block with-errors\"></div>
					  </div>
					    <div class=\"col-md-3\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">    
					    <p>พื้นที่บริการ</p>
					    <select name=\"main_mcmp_zone\" ID=\"main_mcmp_zone\" class=\"selectpicker show-tick form-control input-sm \"  style=\"display: none;\"  data-live-search=\"true\" data-error=\"กรุณาเลือก\"  >
					        <option style=\"font-size:12px;\" value=\"\" >-- เลือก --</option>
					        <option style=\"font-size:12px;\" value=\"1\" selected>1</option> 
					        <option style=\"font-size:12px;\" value=\"2\" >2</option> 
					        <option style=\"font-size:12px;\" value=\"3\" >3</option> 
					        <option style=\"font-size:12px;\" value=\"4\" >4</option> 
					     </select> 
					  </div>
					  </div>
					  <div class=\"col-md-5\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">    
					    <p>ชื่ออำเภอ/เขต</p>
					    <select name=\"main_district\" ID=\"main_district\" class=\"selectpicker show-tick form-control input-sm \"  style=\"display: none;\"  data-live-search=\"true\" data-error=\"กรุณาเลือก\"  disabled=\"true\">
					        <option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>
					     </select>
					    <div class=\"help-block with-errors\"></div>
					  </div>
					  </div>
					</div>

					</fieldset>
					</div>    

					    <div class=\"col-md-6\">
					    <fieldset>
					<legend>ข้อมูลไซต์งาน</legend>
					<div class=\"row form_input\" style=\"text-align:left; margin-top:-20px; \">
					<div class=\"col-md-12\">
					<input type=\"checkbox\" id=\"copy_main_mcmp\"> เลือกที่เดียวกับบริษัท 
					</div>
					</div>      
					  <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					  <div class=\"col-md-7\">
					    <p>สถานที่ไซต์งาน</p><p class=\"required\">*</p> 
					      <select name=\"site_id_mcmp\" ID=\"site_id_mcmp\" class=\"selectpicker form-control input-sm \"  data-live-search=\"true\" title=\"--เลือก--\" >
					     </select>
					    <div class=\"help-block with-errors\"></div>
					  </div>
					  <div class=\"col-md-5\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">    
					    <p>ชื่อผู้ติดต่อ</p><p class=\"required\">*</p>
					    <input type=\"text\" class=\"input form-control\" name=\"site_mcmp_contact\" ID=\"site_mcmp_contact\" >
					  </div>
					  </div>
					</div>
					<div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					  <div class=\"col-md-7\">
					    <p>ที่อยู่ไซต์งาน</p><p class=\"required\">*</p>
					    <textarea class=\"form-control\" ID=\"site_adr_mcmp\" name=\"site_adr_mcmp\" style=\"height: 100px; padding:5px;\"></textarea>
					  </div>
					  <div class=\"col-md-5\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					      <p>เบอร์โทรศัพท์</p><p class=\"required\">*</p>
					      <input type=\"text\" class=\"input form-control\" ID=\"site_mcmp_call\" name=\"site_mcmp_call\" >
					    </div>
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					      <p>Fax.</p>
					      <input type=\"text\" class=\"input form-control\" ID=\"site_mcmp_fax\" name=\"site_mcmp_fax\" >
					    </div>
					  </div>
					  </div>

					  <div class=\"row form_input\" style=\"text-align:left; margin:0;\">
					  <div class=\"col-md-4\">
					    <p>ชื่อจังหวัด</p> 
					      <select name=\"site_province\" ID=\"site_province\" class=\"selectpicker show-tick form-control input-sm \"  style=\"display: none;\"  data-live-search=\"true\" data-error=\"กรุณาเลือก\"  >
					        <option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>
					     </select>
					    <div class=\"help-block with-errors\"></div>
					  </div>
					    <div class=\"col-md-3\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">    
					    <p>พื้นที่บริการ</p>
					    <select name=\"site_mcmp_zone\" ID=\"site_mcmp_zone\" class=\"selectpicker show-tick form-control input-sm \"  style=\"display: none;\"  data-live-search=\"true\" data-error=\"กรุณาเลือก\"  >
					        <option style=\"font-size:12px;\" value=\"\" >-- เลือก --</option>
					        <option style=\"font-size:12px;\" value=\"1\" selected>1</option> 
					        <option style=\"font-size:12px;\" value=\"2\" >2</option> 
					        <option style=\"font-size:12px;\" value=\"3\" >3</option> 
					        <option style=\"font-size:12px;\" value=\"4\" >4</option> 
					     </select> 
					  </div>
					  </div>
					  <div class=\"col-md-5\">
					    <div class=\"row form_input\" style=\"text-align:left; margin:0;\">    
					    <p>ชื่ออำเภอ/เขต</p>
					    <select name=\"site_district\" ID=\"site_district\" class=\"selectpicker show-tick form-control input-sm \"  style=\"display: none;\"  data-live-search=\"true\" data-error=\"กรุณาเลือก\"  disabled=\"true\">
					        <option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>
					     </select>
					    <div class=\"help-block with-errors\"></div>
					  </div>
					  </div>
					</div>

					</fieldset>
					    </div>
					</div>
	<script type=\"text/javascript\" charset=\"utf-8\">
	$(function(){ 
		  copy_main_mcmp_fn();
		  do_company('main',0);
		  do_company('site',0);   
	});

	function do_company(_mcmp,_idmcmp)
	{
		select_province_fn(_mcmp,0,0);
		select_mcmp_fn(_mcmp,_idmcmp);
		get_sel_mzone_fn(_mcmp,0);
	}

	function select_mcmp_fn(_mcmp,_idmcmp)
	{
		get_sel_mcmp_auto_fn(_mcmp,_idmcmp);
		get_mcmp_detail_fn(_mcmp,_idmcmp);
		get_mcmp_ajax_search_fn(_mcmp);
		$('#'+_mcmp+'_id_mcmp').on('change',function(){ 
		get_mcmp_detail_fn(_mcmp,$(this).val());
		});
	}

	function get_mcmp_ajax_search_fn(_mcmp)
	{		
		var options = {
        ajax: {
            url: '".base_url()."htmltemplate/get_mcmp_ajax_search/',
            type: 'POST',
            dataType: 'json',
            // Use \"{{{q}}}\" as a placeholder and Ajax Bootstrap Select will
            // automatically replace it with the value of the search query.
            data: {
                keyword: '{{{q}}}'
            }
        },
        log: 3,
        preprocessData: function (data) {
            var i, l = data.length, array = [];
            //console.log(l);
            if (l) {
                for(i = 0; i < l; i++){
                    array.push($.extend(true, data[i], {
                        text: data[i].mcmp_nameth,
                        value: data[i].id_mcmp,
                        /*data: {
                            subtext: data[i].id_mcmp
                        }*/
                    }));
                }
            }
            // You must always return a valid array when processing data. The
            // data argument passed is a clone and cannot be modified directly.
            return array;
        }
    };

	$('#'+_mcmp+'_id_mcmp.selectpicker').change();
	$('#'+_mcmp+'_id_mcmp').selectpicker().ajaxSelectPicker(options)
	}

	
	function get_sel_mcmp_auto_fn(_mcmp,_idmcmp)
	{
	    $.ajax({
	        type: \"POST\",
	        url: '".base_url()."htmltemplate/get_sel_mcmp_auto/',
	        data: {id_mcmp: _idmcmp},
	        dataType: \"JSON\"
	        }).done(function(rs){  
	          $('#'+_mcmp+'_id_mcmp option').remove();
	          $.each( rs, function( i, op ) {
	             var option='';
	                 if(op.id_mcmp == _idmcmp)
	                 {
	                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mcmp+'\" selected>'+op.mcmp_nameth+'</option>';
	                 }else
	                 {
	                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mcmp+'\">'+op.mcmp_nameth+'</option>';
	                 }
	                 $('#'+_mcmp+'_id_mcmp').append(option);
	        });
	          $('#'+_mcmp+'_id_mcmp.selectpicker').change();
	          $('#'+_mcmp+'_id_mcmp.selectpicker').selectpicker('refresh');
	        });
	}

	function get_mcmp_detail_fn(_mcmp,_id_mcmp)
	{
	    $.ajax({
	        type: \"POST\",
	        url: '".base_url()."htmltemplate/get_mcmp_detail/',
	        data: {id_mcmp: _id_mcmp},
	        dataType: \"JSON\"
	        }).done(function(rs){  
		      $('#'+_mcmp+'_mcmp_contact').val(rs[0].contact);
		      $('#'+_mcmp+'_adr_mcmp').val(rs[0].adr_line);
		      $('#'+_mcmp+'_mcmp_call').val(rs[0].telephone);
		      $('#'+_mcmp+'_mcmp_fax').val(rs[0].fax);
		      select_province_fn(_mcmp,rs[0].id_mprv,rs[0].id_mdist);
		      get_sel_mzone_fn(_mcmp,rs[0].id_mzone);
		      $('.selectpicker').selectpicker('refresh');
	        });
	}

  	function copy_main_mcmp_fn()
  	{
  		$('#copy_main_mcmp').on('click',function(){
  			if($(this).is(':checked'))
  			{
				$('#main_id_mcmp').find('option').clone().appendTo('#site_id_mcmp');
				$('#site_id_mcmp').change();
				$('#site_province option[value=\"'+$('#main_province').val()+'\"]').prop('selected',true);
  				$('#site_mcmp_zone option[value=\"'+$('#main_mcmp_zone').val()+'\"]').prop('selected',true);
  				get_sel_district_fn('site',$('#main_province').val(),$('#main_district').val())
				$('#site_mcmp_contact').val($('#main_mcmp_contact').val());
				$('#site_adr_mcmp').val($('#main_adr_mcmp').val());
				$('#site_mcmp_call').val($('#main_mcmp_call').val());
				$('#site_mcmp_fax').val($('#main_mcmp_fax').val());
				$('.selectpicker').selectpicker('refresh');
  			}else
  			{
  				$('#site_id_mcmp').find('option').remove();
  				$('#site_province option[value=\"\"]').prop('selected',true);
  				$('#site_mcmp_zone option[value=\"\"]').prop('selected',true);
  				$('#site_district option[value=\"\"]').prop('selected',true);
  				$('#site_mcmp_contact').val('');
				$('#site_adr_mcmp').val('');
				$('#site_mcmp_call').val('');
				$('#site_mcmp_fax').val('');
  				$('.selectpicker').selectpicker('refresh');
  			}
  		});
  	}

	function select_province_fn(_mcmp,_idprovince,_idamphur)
	{	    
	    get_sel_province_fn(_mcmp,_idprovince);
	    if(_idamphur!=0){
	    get_sel_district_fn(_mcmp,_idprovince,_idamphur);
	    $('#'+_mcmp+'_district').prop('disabled',false);
	    }
	    $('#'+_mcmp+'_province').on('change', function(){
	    get_sel_mzone_fn(_mcmp,$(this).find('option:selected').data('id_mzone'));
	    get_sel_district_fn(_mcmp,$(this).val(),_idamphur);
	      $('#'+_mcmp+'_district').prop('disabled',false);
	    });
	}
	function get_sel_province_fn(_mcmp,_idprovince)
		{
		    $.ajax({
		        type: \"POST\",
		        url: '".base_url()."htmltemplate/get_sel_province/',
		        dataType: \"JSON\"
		        }).done(function(rs){  
		          $('#'+_mcmp+'_province option').remove();
		          var option='';
		              option+='<option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>';
		              $('#'+_mcmp+'_province').append(option);
		          $.each( rs, function( i, op ) {
		             var option='';
		                 if(op.id_mprv == _idprovince)
		                 {
		                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mprv+'\" data-id_mzone=\"'+op.id_mzone+'\" selected>'+op.province_nameth+'</option>';
		                 }else
		                 {
		                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mprv+'\" data-id_mzone=\"'+op.id_mzone+'\">'+op.province_nameth+'</option>';
		                 }
		                 $('#'+_mcmp+'_province').append(option);
		        });
		          $('#'+_mcmp+'_province.selectpicker').selectpicker('refresh');
		        });
		}

		function get_sel_district_fn(_mcmp,_idprovince,_idamphur)
		{
		    $.ajax({
		        type: \"POST\",
		        url: '".base_url()."htmltemplate/get_sel_district/',
		        data: {province_id: _idprovince},
		        dataType: \"JSON\"
		        }).done(function(rs){  
		          $('#'+_mcmp+'_district option').remove();
		          var option='';
		              option+='<option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>';
		              $('#'+_mcmp+'_district').append(option);
		          $.each( rs, function( i, op ) {
		             var option='';
		                 if(op.id_mdist == _idamphur)
		                 {
		                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mdist+'\" selected>'+op.district_nameth+'</option>';
		                 }else
		                 {
		                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mdist+'\">'+op.district_nameth+'</option>';
		                 }
		                 $('#'+_mcmp+'_district').append(option);
		        });
				  $('#'+_mcmp+'_district').prop('disabled',false);
		          $('#'+_mcmp+'_district.selectpicker').selectpicker('refresh');
		        });
		}

		function get_sel_mzone_fn(_mcmp,_idmzone)
		{
		    $.ajax({
		        type: \"POST\",
		        url: '".base_url()."htmltemplate/get_sel_mzone/',
		        dataType: \"JSON\"
		        }).done(function(rs){  
		          $('#'+_mcmp+'_mcmp_zone option').remove();
		          var option='';
		              option+='<option style=\"font-size:12px;\" value=\"\" selected>----เลือก----</option>';
		              $('#'+_mcmp+'_mcmp_zone').append(option);
		          $.each( rs, function( i, op ) {
		             var option='';
		                 if(op.id_mzone == _idmzone)
		                 {
		                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mzone+'\" selected>'+op.mzone_code+'</option>';
		                 }else
		                 {
		                 option+='<option style=\"font-size:12px;\" value=\"'+op.id_mzone+'\">'+op.mzone_code+'</option>';
		                 }
		                 $('#'+_mcmp+'_mcmp_zone').append(option);
		        });
		          $('#'+_mcmp+'_mcmp_zone.selectpicker').selectpicker('refresh');
		        });
		}
	</script>
			 ";   
	}
	
	} //class
?>