<?php
Class TestValueClass{
     


		public function InsertTestValueData(){
		
			// global $db,$sectionid,$temp_id,$name_entry,$actstatus,$positionX,$positionY;
			  global $db,$temp_id, $sectionid,$bodymsg;

			echo  $Query="insert into genereate_template (gen_temp_id,section_id,temp_id,temp_value)values('','$sectionid','$temp_id','$bodymsg')";
			
			$ExecSection=mysql_query($Query) or die(mysql_error());
			
		}

		public function UpdateTestValueData(){
		
			 global $db,$temp_id,$sectionid,$bodymsg,$gen_temp_id;

			//echo  $Query="insert into genereate_template (gen_temp_id,section_id,temp_id,temp_value)values('','$sectionid','$temp_id','$bodymsg')";

			 $Query="update genereate_template set section_id='$sectionid',temp_id='$temp_id',temp_value='".$_SESSION['TempValue']."' where gen_temp_id='$gen_temp_id'";
			
			$ExecSection=mysql_query($Query) or die(mysql_error());
			unset($_SESSION['TempValue']);
			
			
			
		}


		

		

		

}

?>