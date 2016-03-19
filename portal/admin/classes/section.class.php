<?php
Class Section{
        public function  showAllSection(){
		
			global $db;

			$sectionQuery="select name,section_id from section where status='1'";
			$execQuery=mysql_query($sectionQuery) or die(mysql_error());
			echo "<form name='sectionfrm' action='#' method='post'>";
			echo "<table border='0' cellpadding='0' cellspacing='0'>";
			//$i=0;
			$perline = 3;
			$set = $perline;
			$i=1;
			
			
			while($dis=mysql_fetch_array($execQuery)){
				if(($set%$perline) == 0){
                     echo  "<tr>";
				}
				
				echo "<td>";?>
				<input type='radio' id='radiosection' name='section' value='<?=$dis['section_id']?>'<? if($dis['section_id']==$_REQUEST['section_id']){echo "checked";} ?> onclick='return redirectotherPage(<?=$dis['section_id']?>)'/><?=$dis['name']?>

				<?
					//echo "<input type='radio' id='radiosection' name='section' value='".$dis['section_id']."'".if($dis['section_id']==$_REQUEST['section_id'])." onclick='return redirectotherPage(".$dis['section_id'].")'/>".$dis['name'];
				echo "</td>";
				
				if((($set+1)%$perline) == 0){
										
					echo "</tr>";
				}
				//echo $cntt."to--";
				
			
			  $set = $set+1;
			
			
			}
			
			
			echo "</table>";
			//echo "<div colspan='6' style='float:right' ><input class='button' type='submit' name='btnsub' value='Submit'></div>";
			echo "</form>";
		
		}

		 public function  InsertSectionData(){


			 global $db,$sectionName,$actstatus;

			echo $Query="insert into section (section_id,name,status)values('','$sectionName','$actstatus')";
			$ExecSection=mysql_query($Query) or die(mysql_error());

		 }

		 public function  EditSectionData(){


			 global $db,$sectionName,$actstatus,$sectionId;

			echo $Query="update section set name='$sectionName',status='$actstatus' where section_id='$sectionId'";
			$ExecSection=mysql_query($Query) or die(mysql_error());

		 }


}


?>