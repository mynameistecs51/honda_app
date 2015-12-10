<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_authen {

   public function getHeader($base_url,$SCREENNAME)
   {
        return "
    <!DOCTYPE html>
	<html lang='en'>
	<head>
	<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
	<title> .:: CHUPHOTIC ::.</title>
	<link rel='icon' href='".$base_url."/images/honda.ico' type='image/x-icon'>
      <link href='".$base_url."/css/main.css' rel='stylesheet' type='text/css'>
      <script type='text/javascript'>
         var TableBackgroundNormalColor = '#ffffff';
         var TableBackgroundMouseoverColor = '#9999ff';
         // These two functions need no customization.
         function ChangeBackgroundColor(row) { row.style.backgroundColor = TableBackgroundMouseoverColor; }
         function RestoreBackgroundColor(row) { row.style.backgroundColor = TableBackgroundNormalColor; }
		 ///------------------confirm to cancel----------------------------------//
      </script>
      <style>
         body{
            font-family:Verdana, Geneva, sans-serif;
            font-size:14px;
         }
         .menuDiv {
            height:20px;
      /*      background-color: #ffaaaa;*/
            padding-left:20px;
			padding-top:0px;
            margin-top:0px;
      /*      border-bottom:3px solid #FF0000;*/
			text-align:left;
			color:#000000;
         }
         .show_hide {
            display:none;
         }
         #main {
            background: #ffffff;
            width: 100%;
          color: #000000;
          font-size:16px;
         }

         #main h2, #main h3, #main p {
            padding: 0 10px;
         }

      </style>
   </head>
   <body>
      <center>
         <div id='header' style='margin-left:-8px; margin-right:-8px; margin-tip:-10px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
               <tbody>
                  <tr>
                     <td colspan='3'><table border='0' cellpadding='0' cellspacing='0' width='100%'>
                        <tbody>
                           <tr>
                              <td class='TEXT_HEADER_COMPANY' align='CENTER' width='100%'>
                                 .:: Thainology and Solutions Co.,Ltd ::.
                              </td>
                           </tr>
                        </tbody>
                     </td>
                  </tr>
               </tbody>
            </table><br/>
            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
               <tbody>
                  <tr bgcolor='#CA1F1F' height='25px'>
                     <td align='LEFT' width='30%' class='TEXT_SCREEN_NAME'>
                     </td>
                     <td class='TEXT_SCREEN_NAME' align='CENTER'>".$SCREENNAME."</td>
                     <td align='RIGHT' width='30%'>
					 <span class='TEXT_SCREEN_NAME'> </span>
                        &nbsp;&nbsp;
                     </td>
                  </tr>
               </tbody>
            </table> 
         </div>
         <div id='main' align='center'>
<BR>
";
   }

   public function getFooter()
   {
      return "
          </div>
                      <div class='footer' style='position:fixed;margin-left:0px;bottom:0px;background-color:#ffffff;width:100%;z-index: 99;text-align:center'>
                        Copyright  ©&nbsp;Thainology and Solutions Co.,Ltd.<br>
                        http://www.thainology.com
						</div>
       </center>
   </body>
</html> ";
   }


}
?>