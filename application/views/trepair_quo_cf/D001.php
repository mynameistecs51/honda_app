<style type="text/css">
.ui-datepicker {z-index: 100000 !important; display: none;}
</style>
<input type="hidden"  name="base_url" ID="base_url" value="<?php echo $base_url; ?>">
	<div class="row form_input" style="text-align:left; margin-bottom:20px">
    <div class="col-md-3" >
      <p>เลขที่ใบแจ้งซ่อม</p>
      <input type="text" class="form-control" name="telephone" value="CM-20150001" readonly>
    </div>
    <div class="col-md-3">
      <p>เลขที่ใบเปิดงานซ่อมผลิตภัณฑ์</p>
      <input type="text" class="form-control" name="telephone"  value="CM-20150001" readonly="true">
    </div>
    <div class="col-md-3">
      <p>วันที่เปิดงานซ่อมผลิตภัณฑ์</p>
        <div class="input-group" style="z-index:500  !important;">
        <input disabled type="text" name="issuedate" id="issuedate" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>
    <div class="col-md-3">
      <p>ประเภทความสำคัญของงาน</p>
      <div class="form-group">
            <select disabled id="mf_owner_mtck" name="orgName" class="selectpicker show-tick form-control input-sm "  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  readonly>
              <option style="font-size:12px;" value="" selected>----เลือก----</option>
              <option style="font-size:12px;" value="">ธรรมดา</option> 
              <option style="font-size:12px;" value="">ด่วน</option> 
              <option style="font-size:12px;" value="">ด่วนมาก</option> 
              <option style="font-size:12px;" value="">ด่วนที่สุด</option> 
            </select>
          <div class="help-block with-errors"></div>
        </div>
    </div>
  </div>

  <div class="row form_input" style="text-align:left;"> 
    <div class="col-md-6">
    <fieldset disabled>
      <legend>ข้อมูลบริษัทหลัก</legend>     
        <div class="row form_input" style="text-align:left; margin:0;">
          <div class="col-md-7">
            <p>ชื่อบริษัทที่ติดตั้ง</p>
            <select name="id_mcmp" ID="selmcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="">----เลือก----</option>
            <option style="font-size:12px;" value="1">THAINOLOGY</option> 
            <option style="font-size:12px;" value="2" selected>TNLG</option> 
          </select>
            <div class="help-block with-errors"></div>
          </div>
          <div class="col-md-5">
            <div class="row form_input" style="text-align:left; margin:0;">    
              <p>ชื่อผู้ติดต่อ</p>
            <input type="text" class="input form-control" name="telephone" ID="memp_com" value="นาย A">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ที่อยู่บริษัท</p>
          <textarea class="form-control" ID="adr_com" style="height: 100px; padding:5px;">1346 (ห้อง 3) หมู่ 2 ซ.เบญจพล1(เทพารักษ์ 88) ถ.เทพารักษ์ ต.เทพารักษ์ อ.เมืองสมุทรปราการ จ.สมุทรปราการ 10270</textarea>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>เบอร์โทรศัพท์</p>
            <input type="text" class="input form-control" ID="call_com" name="telephone" value="0812345678">
          </div>
          <div class="row form_input" style="text-align:left; margin:0;">
            <p>Fax.</p>
            <input type="text" class="input form-control" ID="fax_com" name="telephone" value="02345678">
          </div>
        </div>
      </div>
      <div class="row form_input" style="text-align:left; margin:0;">
        <div class="col-md-7">
          <p>ชื่อจังหวัด</p> 
          <select name="PROVINCE_ID1" ID="PROVINCE_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
            <option style="font-size:12px;" value="">----เลือก----</option>
            <option style="font-size:12px;" value="1" selected>กรุงเทพมหานคร</option> 
            <option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
          </select>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-md-5">
          <div class="row form_input" style="text-align:left; margin:0;">    
            <p>ชื่ออำเภอ/เขต</p>
            <select name="AMPHUR_ID1" ID="AMPHUR_ID1" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก">
              <option style="font-size:12px;" value="" selected>บางกะปิ</option>
            </select>
            <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>
    </fieldset>
    </div>    

    <div class="col-md-6">
      <fieldset disabled>
        <legend>ข้อมูลไซต์งาน</legend>     
        <div class="row form_input" style="text-align:left; margin-top:-20px; ">
          <div class="col-md-12">
            <input type="checkbox" id="chk_com_sit"> สถานที่เดียวกันกับบริษัทที่ติดตั้ง
          </div>
        </div> 
        <div class="row form_input" style="text-align:left; margin:0;">
          <div class="col-md-7">
            <p>สถานที่ไซต์งาน</p>
            <select name="id_mcmp_sit" ID="selmcmp_sit" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
              <option style="font-size:12px;" value="" selected>----เลือก----</option>
              <option style="font-size:12px;" value="1">THAINOLOGY</option> 
              <option style="font-size:12px;" value="2">TNLG</option> 
            </select>
            <div class="help-block with-errors"></div>
          </div>
          <div class="col-md-5">
            <div class="row form_input" style="text-align:left; margin:0;">
              <p>ชื่อผู้ติดต่อ</p>
              <input type="text" class="input form-control" name="telephone" ID="memp_sit">
            </div>
          </div>
        </div>
        <div class="row form_input" style="text-align:left; margin:0;">
          <div class="col-md-7">
            <p>ที่อยู่ใซต์งาน</p>
            <textarea class="form-control" style="height: 100px; padding:5px;" ID="adr_sit"></textarea>
          </div>
          <div class="col-md-5">
            <div class="row form_input" style="text-align:left; margin:0;">
              <p>เบอร์โทรศัพท์</p>
              <input type="text" class="input form-control" name="telephone" ID="call_sit">
            </div>
            <div class="row form_input" style="text-align:left; margin:0;">
              <p>Fax.</p>
              <input type="text" class="input form-control" name="telephone" ID="fax_sit">
            </div>
          </div>
        </div>
        <div class="row form_input" style="text-align:left; margin:0;">
          <div class="col-md-7">
            <p>ชื่อจังหวัด</p>
            <select name="PROVINCE_ID2" ID="PROVINCE_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >
              <option style="font-size:12px;" value="" selected>----เลือก----</option>
              <option style="font-size:12px;" value="1">กรุงเทพมหานคร</option> 
              <option style="font-size:12px;" value="2">ประจวบคีรีขันธ์</option> 
            </select>
            <div class="help-block with-errors"></div>
          </div>
          <div class="col-md-5">
            <div class="row form_input" style="text-align:left; margin:0;">    
              <p>ชื่ออำเภอ/เขต</p>
              <select name="AMPHUR_ID2" ID="AMPHUR_ID2" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
                <option style="font-size:12px;" value="" selected>----เลือก----</option>
                <option style="font-size:12px;" value="1">เขตดุสิต</option> 
                <option style="font-size:12px;" value="2">เขตดอนเมือง</option>
              </select>
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>    
      </fieldset>
    </div>
  </div>

<div class="col-md-12" style="text-align:left;">
<fieldset><legend>ผลิตภัณฑ์</legend>   
<div class="row form_input">
<div class="col-md-4" style="text-align:left;">
    <p>เลขที่ผลิตภัณฑ์</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="PPPPP-SSYYLXXX-VVV" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>ชื่อผลิตภัณฑ์</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS-Model 001" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Issue No</p>
    <div class="form-group"> 
      <input type="text" name="issue[]" id="issue" value="CM580800001" class="form-control" readonly="true">
    </div>
</div>
</div>
<div class="row form_input"> 
<div class="col-md-4" style="text-align:left;">
    <p>Model</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="V01" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Brand</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="CHUPHOTIC" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>Product Type</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS 1 PHASE" class="form-control" readonly="true">
    </div>
</div> 
</div>
<div class="row form_input">
<div class="col-md-4" style="text-align:left;">
    <p>Rated Power</p>
    <div class="form-group"> 
      <input type="text" name="mwrt_cat[]" id="mwrt_cat" value="UPS 1 PHASE" class="form-control" readonly="true">
    </div>
</div> 
<div class="col-md-4" style="text-align:left;">
    <p>ประเภทการติดตั้ง</p>
    <div class="form-group"> 
      <select name="selwrt" ID="selwrt" class="selectpicker show-tick form-control input-type"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  disabled="true">
          <option style="font-size:12px;" value="" >-- เลือก --</option>
          <option style="font-size:12px;" value="1" selected>1 PHASE</option>   
      </select>  
    </div>
</div> 
</div>
</fieldset>
</div>

  <div class="row form_input header_table" style="text-align:left; margin-top:10px;">
    <div class="col-md-12">
      <fieldset>
        <legend>รายการประกัน</legend>
        <div class="row form_input header_table" style="margin-top:-10px; width:100%;" >
          <div class="col-md-12">
            <table class="table table-striped" id="tb_check">
              <thead>
                <tr>
                  <th width="30%">เลขที่ผลิตภัณฑ์ [ Part-Serial-Version ]</th>
                  <th width="20%">ชื่อผลิตภัณฑ์</th>
                  <th width="15%">ประเภทการรับประกัน</th>
                  <th width="10%">วันที่เริ่มประกัน</th>
                  <th width="10%">วันที่สิ้นสุดประกัน</th>
                  <th width="15%">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                      <div style="width:30%;float:left">
                      <input type="text" name="part[]" value="PPPPP" class="form-control" readonly="true">
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:39%;float:left">
                      <input type="text" name="serial[]" value="SSYYLXXX" class="form-control" readonly="true">
                      </div>
                      <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                      <div style="width:25%;float:right">
                      <input type="text" name="version[]" value="VVVV" class="form-control" readonly="true">
                      </div>                     
                  </td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="แบตเตอรี่"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="ประกันหลังขาย"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2558"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="24/07/2560"></td>
                  <td><input readonly type="text" class="form-control" name="namemodel[]" value="-"></td>
                </tr>
                </tr>
              </tbody>
            </table>  
          </div>  
        </div>
      </fieldset>
    </div>
  </div>

  <div class="row form_input" style="text-align:left;">
    <div class="col-md-6" >
      <p>อาการแจ้งเสีย</p>
      <textarea disabled class="form-control" style="padding:5px; margin:0; "></textarea>
    </div>
    <div class="col-md-6" >
      <p>หมายเหตุ</p>
      <textarea class="form-control" style="padding:5px; margin:0; "></textarea>
    </div>
  </div>

  <div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset >
        <legend>ตรวจสอบเงื่อนไขการรับประกัน</legend> 
        <div class="row form_input" style="text-align:left; margin-top:-15px;">
          <div class="col-md-6" >
            <label class="radio-inline" style="padding-left:0;">Warranty void </label>
            <label class="radio-inline" style="padding-left:20px;"><input type="radio" class="rdo_warranty" name="warranty" id="warranty_acept" value="accept" checked disabled="true">Accept </label>
            <label class="radio-inline" style="padding-left:20px;"><input type="radio" class="rdo_warranty" name="warranty" id="warranty_failure" value="failure" disabled="true">Failure </label>
          </div>
          <div class="col-md-12 warranty-hide" style="display:none">
            <p>เหตุผล</p> 
            <input class="form-control" type="text" id="other_transport" readonly="true">
          </div>
        </div>
      </br>
        <div class="row form_input" style="text-align:left;">
          <div class="col-md-6" >
            <label class="radio-inline" style="padding-left:0;">สาเหตุการเสีย </label>
            <label class="radio-inline" style="padding-left:20px;"><input type="radio" class="rdo_cause" name="cause" id="cause_accept" value="accept" checked disabled="true">Accept </label>
            <label class="radio-inline" style="padding-left:20px;"><input type="radio" class="rdo_cause" name="cause" id="cause_failure" value="failure" disabled="true">Failure </label>
          </div>
          <div class="col-md-12  cause-hide" style="display:none">
            <p>เหตุผล</p> 
            <input class="form-control" type="text" id="other_transport" readonly="true">
          </div>
        </div>
      </fieldset>
    </div>
  </div>

  <div class="row form_input" style="text-align:left;">
    <div class="col-md-12" >
      <p>อาการเสียที่ตรวจพบ</p> 
      <textarea class="form-control" style="padding:5px; margin:0; "></textarea>
    </div>
  </div>

    <div class="row form_input header_table" style="text-align:left;">
    <div class="col-md-12">
      <fieldset>
        <legend>ผลการตรวจเช็ค</legend>
        <div class="row form_input header_table" style="margin-top:-20px; width:100%;" >
          <div class="col-md-12">
            <table class="table table-striped" id="tb_chk">
              <thead>
                <tr>
                  <th width="1%">ลำดับ</th>
                  <th width="25%">เลขที่ผลิตภัณฑ์</th>
                  <th width="15%">Part No.</th>
                  <th width="15%">Part Name</th>
                  <th width="10%">ภาคการทำงาน</th>
                  <th width="20%">อาการเสีย</th>
                  <th width="14%">หมายเหตุ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div style="width:30%;float:left">
                      <input type="text" name="part[]" value="PPPPP" class="form-control" readonly="true">
                    </div>
                    <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                    <div style="width:39%;float:left">
                      <input type="text" name="serial[]" value="SSYYLXXX" class="form-control" readonly="true">
                    </div>
                    <b style="padding-top:0px;font-size:20px;float:left"> - </b>
                    <div style="width:25%;float:right">
                      <input type="text" name="version[]" value="VVVV" class="form-control" readonly="true">
                    </div> 
                  </td>
                  <td><input type="text" class="form-control" name="namemodel[]" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" readonly="true"></td>
                  <td><textarea class="form-control" style="padding:5px; margin:0; height:35px;" cols="1" readonly="true"></textarea></td>
                  <td><textarea class="form-control" style="padding:5px; margin:0; height:35px;" cols="1" readonly="true"></textarea></td>
                </tr>
              </tbody>
            </table> 
          </div>  
        </div>
      </fieldset>
    </div>
  </div>

  <div class="row form_input header_table" style="text-align:left; margin-top:10px;">
    <div class="col-md-12">
      <fieldset>
        <legend>รายการแจ้งเสนอซ่อม</legend>
        <div class="row form_input header_table" style="margin-top:-20px; width:100%;" >
          <div class="col-md-12">
            <table class="table table-striped" id="tb_equip">
              <thead>
                <tr>
                  <th width="1%"><!-- <input type="checkbox" id="cballmodal_equip"> -->No.</th>
                  <th width="15%">ตำแหน่ง</th>
                  <th width="15%">Part No.</th>
                  <th width="20%">Part Name</th>
                  <th width="10%">ภาคการทำงาน</th>
                  <th width="9%">จำนวน</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><!-- <input type="checkbox" class="cbsmodal_equip"> -->1</td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="x.y" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="A00001" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="AAA" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="1" readonly="true"></td>
                </tr>
        <tr>
                  <td><!-- <input type="checkbox" class="cbsmodal_equip"> -->2</td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="x.y" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="A00001" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="AAA" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="" readonly="true"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="1" readonly="true"></td>
                </tr>
              </tbody>
            </table> 
          </div>  
        </div>
      </fieldset>
    </div>
  </div>

    <div class="row form_input header_table" style="text-align:left; margin-top:10px;">
    <div class="col-md-12">
      <fieldset>
        <legend>รายการเสนอราคา</legend>
        <div class="row form_input header_table" style="margin-top:-20px; width:100%;" >
          <div class="col-md-3">
            <div class="noneadd add_repair" style="margin-bottom:10px; margin-right:10px;">
              + เพิ่มรายการ
            </div>
            <div class="noneadd del_repair" style="margin-bottom:10px;">
              - ลบรายการ
            </div>
          </div>
          <div class="col-md-12">
            <table class="table table-striped" id="tb_repair">
              <thead>
                <tr>
                  <th width="1%"><input type="checkbox" id="cballmodal_repair"></th>
                  <th width="15%">ตำแหน่ง</th>
                  <th width="15%">Part No.</th>
                  <th width="20%">Part Name</th>
                  <th width="10%">ภาคการทำงาน</th>
                  <th width="9%">จำนวน</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" class="cbsmodal_repair"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="x.y" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="A00001" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="AAA" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="1" ></td>
                </tr>
                <tr>
                  <td><input type="checkbox" class="cbsmodal_repair"></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="x.y" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="A00001" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="AAA" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="" ></td>
                  <td><input type="text" class="form-control" name="namemodel[]" value="1" ></td>
                </tr>
              </tbody>
            </table> 
          </div>  
        </div>

        <div class="row form_input footer_table_repair" style="display:none;">
          <div class="col-md-3">
            <div class="add add_repair" style="margin-bottom:10px; margin-right:10px;">
              + เพิ่มรายการ
            </div>
            <div class="add del_repair" style="margin-bottom:10px;">
              - ลบรายการ
            </div>
          </div>
        </div>  
      </fieldset>
    </div>
  </div>

<div class="row form_input " style="text-align:left;">
<div class="col-md-12">
<fieldset>
<legend>ยืนยันการเสนอราคา</legend>
<div class="row form_input " style="text-align:left; margin-bottom:20px">
    <div class="col-md-3" >
      <p>อ้างอิงเลขที่ใบเสนอราคาจาก CSMILE</p>
      <input type="text" class="form-control" name="refpr" value="" >
    </div>
    <div class="col-md-3">
      <p>วันที่-เวลาใบเสนอราคา</p>
        <div class="input-group" style="z-index:9  !important;">
        <input type="text" name="refprdate" id="refprdate" value="<?=$datefrom?>"  class="form-control" > <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>
</fieldset>
</div>
</div>

  <div class="row form_input" style="text-align:left;">
    <div class="col-md-12">
      <fieldset >
        <legend>อนุมัติการซ่อม</legend>
        <div class="row form_input" style="text-align:left; margin-top:-15px;">
          <div class="col-md-3" >
            <label class="radio-inline" style="padding-left:20px;">
              <input type="radio" class="rdo_warranty" name="cus_comment" id="comment_accept" value="accept" checked>ซ่อม
              <div class="input-group" style="z-index:500  !important;">
                <input disabled type="text" name="issuedate" id="issuedate" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </label>
          </div>
          <div class="col-md-3" >
            <label class="radio-inline" style="padding-left:20px;">
              <input type="radio" class="rdo_warranty" name="cus_comment" id="comment_denied" value="denied">ไม่ซ่อม 
              <div class="input-group" style="z-index:500  !important;">
                <input disabled type="text" name="issuedate" id="issuedate" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </label>
          </div>
          <div class="col-md-3" >
            <label class="radio-inline" style="padding-left:20px;">
              กำหนดส่งคืน 
              <div class="input-group" style="z-index:500  !important;">
                <input disabled type="text" name="issuedate" id="issuedate" value="<?=$dateto?>" readonly="readonly" class="form-control"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </label>
          </div>
        </div>
        <div class="row form_input " style="text-align:left; margin-top:20px">
        <div class="col-md-3">
        <p>เงื่อนไขการซ่อม</p>
        <input type="radio" name="repair_condition" value="1" checked="true"> คิดค่าบริการ
        <input type="radio" name="repair_condition" value="2"> ไม่คิดค่าบริการ
        </div>
        <div class="col-md-3">
          <p>อ้างอิงเอกสาร Issue No</p>
          <input type="text" name="issueno" class="form-control">
        </div>
        <div class="col-md-3" >
          <label style="padding-left:20px;">
          <p>แนบไฟล์</p>
          <input type="file" name="file_repair_condition">
        </label>
        </div>
        </div>
      </fieldset>
    </div>
  </div>

<div class="row form_input div_approve" style="text-align:left;">
<div class="col-md-12">
<fieldset>
<legend>ยืนยันการซ่อม</legend>
<div class="row form_input " style="text-align:left; margin-bottom:20px">
    <div class="col-md-3" >
      <p>อ้างอิงเลขที่ใบสั่งซื้อ[PO]จาก CSMILE</p>
      <input type="text" class="form-control" name="refpo"  value="" >
    </div>
    <div class="col-md-3">
      <p>วันที่-เวลาใบสั่งซื้อ[PO]</p>
        <div class="input-group" style="z-index:9  !important;">
        <input type="text" name="refpodate" id="refpodate" value="<?=$datefrom?>"  class="form-control" > <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>
  </div>
</fieldset>
</div>
</div>

<div class="row form_input div_noapprove" style="text-align:left;">
<div class="col-md-12">
<fieldset>
<legend>บันทึกอ้างอิง - [สาเหตุ]</legend>

<div class="row form_input" style="text-align:left; margin-bottom:20px">
    <div class="col-md-12" >
      <p>เหตุผล/สาเหตุ</p>
      <textarea class="form-control" rows="1" style="height:35px;" placeholder="--ระบุให้ครบถ้วน--"></textarea>
    </div>
  </div>
</fieldset>
</div>
</div>

  <div class="row form_input">
<div class="col-md-3" style="text-align:left;">
<p>ผู้สร้างรายการ</p>   
  <input type="text" name="name_create" class="form-control" value="admin tnlg" readonly="true">
</div>
<div class="col-md-3" style="text-align:left;">
<p>วันที่-เวลาสร้างรายการ</p>   
  <div class="input-group" style="z-index:9  !important;">
    <input type="text" name="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>
<div class="col-md-3" style="text-align:left;">
<p>ผู้แก้ไขรายการล่าสุด</p>   
  <input type="text" name="name_create" class="form-control" value="admin tnlg" readonly="true">
</div>
<div class="col-md-3" style="text-align:left;">
<p>วันที่-เวลาแก้ไขรายการล่าสุด</p>   
  <div class="input-group" style="z-index:9  !important;">
    <input type="text" name="docdate" value="<?=$dtnow?>" readonly="readonly" class="form-control "> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>
</div>

<script type='text/javascript'>
$(function(){  
    
    $('textarea.form-control,input.form-control').attr('readonly',true);
    $('input:checkbox,input:radio,select.form-control').attr('disabled',true);

    $('.selectpicker').selectpicker('refresh');
    $( "#0startdate,#0enddate,#0issuedate,#0startBattery,#0endBattery,#refprdate,#refpodate" ).datetimepicker();
	click_approve_radio();
	click_control();
	select_control();
	sumtotal();
	saveData();
	showhideBtn();

	click_checkbox_all('cballmodal_check','cbsmodal_check','tb_check');
	click_checkbox_all('cballmodal_price','cbsmodal_price','tb_price');
	click_checkbox_all('cballmodal_repair','cbsmodal_repair','tb_repair');
	checkbox_check_all('cballmodal_check','cbsmodal_check');
	checkbox_check_all('cballmodal_price','cbsmodal_price');
	checkbox_check_all('cballmodal_repair','cbsmodal_repair');
	key_change();
 });


function click_control()
{
	$('.add_check').on('click', function(){
 		add_tr_check();
 	});
	$('.add_price').on('click', function(){
 		add_tr_price();
 	});
	$('.add_repair0').on('click', function(){
 		add_tr_repair();
 	});

 	$('.del_check').on('click', function(){
 	 	if($('input[type="checkbox"].cbsmodal_check').is(':checked') || $('input[type="checkbox"]#cballmodal_check').is(':checked')){
 	 		if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_check').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_check:checkbox:checked').parents('#tb_check tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_check').is(':checked')){
               		$('#tb_check tbody tr').remove();
               }
         	}
     	}
     	showhideBtn();
 	});

 	$('.del_price').on('click', function(){
 	 	if($('input[type="checkbox"].cbsmodal_price').is(':checked') || $('input[type="checkbox"]#cballmodal_price').is(':checked')){
			if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_price').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_price:checkbox:checked').parents('#tb_price tbody tr').remove();
                   sumtotal();
                }
               
               if($('input[type="checkbox"]#cballmodal_price').is(':checked')){
               		$('#tb_price tbody tr').remove();
               	   sumtotal();
               }
         } }
 	showhideBtn();
 	});

 	$('.del_repair').on('click', function(){
 	 	if($('input[type="checkbox"].cbsmodal_repair').is(':checked') || $('input[type="checkbox"]#cballmodal_repair').is(':checked')){
			if (confirm('คุณแน่ใจที่จะลบรายการที่เลือก ใช่หรือไม่?')) {
               
                if($('input[type="checkbox"].cbsmodal_repair').is(':checked'))
                {
                   $('input[type="checkbox"].cbsmodal_repair:checkbox:checked').parents('#tb_repair tbody tr').remove();
                }
               
               if($('input[type="checkbox"]#cballmodal_repair').is(':checked')){
               		$('#tb_repair tbody tr').remove();
               }
         } }
 	showhideBtn();
 	});



}

function select_control()
{
	$('#tclaim_mcmp.selectpicker').on('change', function(){
		if($(this).val()==1){
		$('#tclaim_address').val('ที่อยู่ A');
	    }else{
	    $('#tclaim_address').val('ที่อยู่ B');
	    }
	});


}

function add_tr_price()
{
	var trhtml ='<tr>';
 		trhtml +='<td><input type="checkbox" class="cbsmodal_price"></td>';
 		trhtml +='<td>';
		trhtml +='<div class="form-group">';
        trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
		trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
		trhtml +='<option style="font-size:12px;" value="1"  >Battery UB1275-240w 12v 7.5 Ah</option> ';
		trhtml +='<option style="font-size:12px;" value="2"  >หม้อแปลงขนาด จิ๋ว 12V</option> ';
		trhtml +='</select>';
		trhtml +='<div class="help-block with-errors"></div>';
		trhtml +='</div>';
		trhtml +='</td>';
		trhtml +='<td><input type="text" class="form-control amountkey" name="namemodel[]" value=""></td>';
		trhtml +='<td>';
		trhtml +='<div class="form-group">';
		trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
		trhtml +='<option style="font-size:12px;" value="" selected>----</option>';
		trhtml +='<option style="font-size:12px;" value="1" >ก้อน</option> ';
		trhtml +='<option style="font-size:12px;" value="2"  >อัน</option> ';
		trhtml +='<option style="font-size:12px;" value="3">ชิ้น</option>';
		trhtml +='<option style="font-size:12px;" value="4">เครื่อง</option> ';
		trhtml +='</select>';
		trhtml +='<div class="help-block with-errors"></div>';
		trhtml +='</div>';
		trhtml +='</td>';
		trhtml +='<td><input type="text" class="form-control unitprice" name="namemodel[]"></td>';
		trhtml +='<td><input type="text" class="form-control sumprice" name="namemodel[]" readonly="true"></td>';
		trhtml +='<td><textarea class="form-control" rows="1" style="height:35px;"></textarea></td>';
		trhtml +='</tr>';
 	$('#tb_price tbody').append(trhtml);
	click_checkbox_all('cballmodal_price','cbsmodal_price','tb_price');
	checkbox_check_all('cballmodal_price','cbsmodal_price');
 	showhideBtn();
 	key_change();
 	sumtotal();
	$('.selectpicker').selectpicker('refresh');
}

function add_tr_check()
{
	var trhtml ='<tr>';
 	 	trhtml +='<td><input type="checkbox" class="cbsmodal_check"></td>';
 	 	trhtml +='<td>';
 	 	trhtml +='<div class="form-group">';
 	 	trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
 	 	trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
 	 	trhtml +='<option style="font-size:12px;" value="1">Model A</option>';
 	 	trhtml +='<option style="font-size:12px;" value="2">Model B</option>';
 	 	trhtml +='</select>';
 	 	trhtml +='<div class="help-block with-errors"></div>';
 	 	trhtml +='</div>';
 	 	trhtml +='</td>';
 	 	trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
 	 	trhtml +='<td>';
 	    trhtml +='<div class="form-group">';
 	 	trhtml +='<select name="tclaim_mcmp" class="selectpicker show-tick form-control input-sm tclaim_mcmp"  style="display: none;"  data-live-search="true" data-error="กรุณาเลือก"  >';
 	 	trhtml +='<option style="font-size:12px;" value="" selected>----เลือก----</option>';
 	 	trhtml +='<option style="font-size:12px;" value="1">Model A</option>';
 	 	trhtml +='<option style="font-size:12px;" value="2">Model B</option>';
 	 	trhtml +='</select>';
 	 	trhtml +='<div class="help-block with-errors"></div>';
 	 	trhtml +='</div>';
 	 	trhtml +='</td>';
		trhtml +='</tr>';
 	$('#tb_check tbody').append(trhtml);
	click_checkbox_all('cballmodal_check','cbsmodal_check','tb_check');
	checkbox_check_all('cballmodal_check','cbsmodal_check');
 	showhideBtn();
	$('.selectpicker').selectpicker('refresh');
}

function add_tr_repair()
{
	var trhtml ='<tr>';
      trhtml +='<td><input type="checkbox" class="cbsmodal_repair"></td>';
      trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
      trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
      trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
      trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
      trhtml +='<td><input type="text" class="form-control" name="namemodel[]"></td>';
		trhtml +='</tr>';
 	$('#tb_repair tbody').append(trhtml);
	click_checkbox_all('cballmodal_repair','cbsmodal_repair','tb_repair');
	checkbox_check_all('cballmodal_repair','cbsmodal_repair');
 	showhideBtn();
	$('.selectpicker').selectpicker('refresh');
}

function showhideBtn()
{
	var trtotal=$('#tb_check tbody tr').length;
 	 if(trtotal>4)
 	 	{
 	 	$('div.footer_table_check').show();
  		}else
 		{
 		$('div.footer_table_check').hide();
 		}
 	var trtotal=$('#tb_price tbody tr').length;
 	 if(trtotal>4)
 	 	{
 	 	$('div.footer_table_price').show();
  		}else
 		{
 		$('div.footer_table_price').hide();
 		}
 	var trtotal=$('#tb_repair tbody tr').length;
 	 if(trtotal>4)
 	 	{
 	 	$('div.footer_table_repair').show();
  		}else
 		{
 		$('div.footer_table_repair').hide();
 		}
}

function click_approve_radio()
{
	$('.rdo_warranty').on('click',function(){
		if($(this).val()=='denied'){
		$('.div_approve').hide();
		$('.div_noapprove').show();
	   }else{
	   	$('.div_approve').show();
	   	$('.div_noapprove').hide();
	   }
	});

	if($('input[value="2"].rdo_warranty').is(':checked')){
		$('.div_approve').hide();
		$('.div_noapprove').show();
	   }else{
	   	$('.div_approve').show();
	   	$('.div_noapprove').hide();
	   }
}

function click_checkbox_all(_id,_class,_tb)
{
	$('#'+_id).on('click',function(){
		var cb_status = $(this).is(':checked');
        $('input[type="checkbox"].'+_class).prop('checked',cb_status);

    if(cb_status==true)
      {            
        $('#'+_tb+' tr').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#'+_tb+' tbody tr').removeAttr('style','background-color: #ECFFB3;');
      }
	});

	$('#'+_tb+' tbody tr .'+_class).on('click',function(){
		var cb_status = $(this).is(':checked');
		var idx=$(this).closest('tr').index();
    if(cb_status==true)
      {            
        $('#'+_tb+' tbody tr:eq('+idx+')').attr('style','background-color: #ECFFB3;');
      }
      else
      {
        $('#'+_tb+' tbody tr:eq('+idx+')').removeAttr('style','background-color: #ECFFB3;');
      }

	});

}

 function checkbox_check_all(_id,_class)
  {
    $('input[type="checkbox"].'+_class).each(function(){
        var all_count=$('.'+_class).length;
        var now_count=$('input[type="checkbox"].'+_class+':checked').length;
        if(now_count < all_count)
        {
          $('#'+_id).prop('checked',false);
        }
        else
        {
          $('#'+_id).prop('checked',true);
        }
    });

     $('input[type="checkbox"].'+_class).click(function(){
        var all_count=$('.'+_class).length;
        var now_count=$('input[type="checkbox"].'+_class+':checked').length;
        if(now_count < all_count)
        {
          $('#'+_id).prop('checked',false);
        }
        else
        {
          $('#'+_id).prop('checked',true);
        }
    });
  }

function key_change()
{
	  $('.amountkey').on('change',function(){
	    var idx=$(this).closest('.amountkey').index('.amountkey');
	    var unitprice = parseFloat($('input.unitprice').eq(idx).val());
	        if(!unitprice){unitprice=0;}
	    $('input.sumprice').eq(idx).val(parseFloat($(this).val()*unitprice));
	    sumtotal();
	  });

	  $('input.unitprice').on('change',function(){
	    var idx=$(this).closest('.unitprice').index('.unitprice');
	    var amountkey = parseFloat($('input.amountkey').eq(idx).val());
	    if(!amountkey){amountkey=0;}
	    $('input.sumprice').eq(idx).val(parseFloat($(this).val()*amountkey));
	    sumtotal();
	  });

}

function sumtotal()
{
	var grand_total_qty=0;
	    $('.amountkey').each(function(){
	       var val = $(this).val();
	       if(!val){val=0;}
	       grand_total_qty += parseFloat(val);
	    });
	$('#amounttotal').val(grand_total_qty);

		var grand_total_qty=0;
	    $('.sumprice').each(function(){
	       var val = $(this).val();
	       if(!val){val=0;}
	       grand_total_qty += parseFloat(val);
	    });
	$('#totalprice').val(grand_total_qty);
}

function saveData()
      {
         $('#form').on('submit', function (e) {
            if (e.isDefaultPrevented()) {
              alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
              // handle the invalid form...
            } else {
              // everything looks good!
            e.preventDefault();
            var form = $('#form').serialize();
	            $.ajax(
	            {
	                type: 'POST',
	                url: '<?php echo base_url(); ?>ctl_memp/saveadd/',
	                data: {form}, //your form datas to post          
	                success: function(rs)
	                {   
	                   $('.modal').modal('hide');
	                   location.reload();
	                },
	                error: function()
	                {
	                    alert("#เกิดข้อผิดพลาด");
	                }
	            });                   
            }
          });
      }
</script>