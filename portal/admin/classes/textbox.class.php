<?php

Class TextBox{
     


		public function InsertTextboxData($LastInsertMediumTable,$name_entry,$positionX,$positionY){
		
			// global $db,$sectionid,$temp_id,$name_entry,$actstatus,$positionX,$positionY;
			  global $db;

			 $Query="insert into designtextbox (design_textboxId,textbox_value,positionX,positionY,status,mediater_id)values('','$name_entry','$positionX','$positionY','$actstatus','$LastInsertMediumTable')";
			$ExecSection=mysql_query($Query) or die(mysql_error());
			$LastInsertTextboxId=mysql_insert_id();
		}

		public function InsertImageData($LastInsertMediumTable,$imageupload,$choosealign,$imageName){
		
			// global $db,$sectionid,$temp_id,$name_entry,$actstatus,$positionX,$positionY;
			  global $db;

			 $Query="insert into designimage(img_id,Img_name 	,imgValue,chooseaAlign,mediater_id)values('','$imageName','$imageupload','$choosealign','$LastInsertMediumTable')";
			$ExecSection=mysql_query($Query) or die(mysql_error());
			$LastInsertImageId=mysql_insert_id();
		}

		public function InsertMediumTableData($temp_id,$sectionid){
		
			// global $db,$sectionid,$temp_id,$name_entry,$actstatus,$positionX,$positionY;
			  global $db;

			 $Query="insert into mediater(mediater_id,temp_id,section_id)values('','$temp_id','$sectionid')";
			$ExecSection=mysql_query($Query) or die(mysql_error());
			 $LastInsertMediumTable=mysql_insert_id();
			//die;
		}

		

}

?>