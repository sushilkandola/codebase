<?php
Class Template{
        public function  showAllSection(){
		
			global $db,$sectionId;

			$sectionQuery="select name,section_id from section where status='1'";
			$execQuery=mysql_query($sectionQuery) or die(mysql_error());
			echo "<select name='sectionid' id='sectionid'>";
			echo "<option value='-1'>--Please select--</option>";
			while($dis=mysql_fetch_array($execQuery)){
					?>
					
					<option value='<?=$dis['section_id']?>'<?if($sectionId==$dis['section_id']){
							 echo 'selected';
				}?>><?=$dis['name']?></option>
				<?}
			
			echo "</select>";
			
		
		}


		public function  showSections(){
		
			global $db,$sectionId;

			$sectionQuery="select name,section_id from section where status='1'";
			$execQuery=mysql_query($sectionQuery) or die(mysql_error());
			echo "<select name='sectionid' id='sectionid' onchange='return tempName()'>";
			echo "<option value='-1'>--Please select--</option>";
			while($dis=mysql_fetch_array($execQuery)){
					?>
					
					<option value='<?=$dis['section_id']?>'<?if($sectionId==$dis['section_id']){
							 echo 'selected';
				}?>><?=$dis['name']?></option>
				<?}
			
			echo "</select>";
			
		
		}

		
		
		public function sectionName(){
				global $db,$section_id;

			 $sectionQuery="select name  from section where section_id='".$section_id."' and  status='1'";
			$execQuery=mysql_query($sectionQuery) or die(mysql_error());
			while($dis=mysql_fetch_array($execQuery)){
					echo $dis['name'];
			}
			

		}

		public function InsertTemplateData(){
		
			 global $db,$sectionid,$nametemp,$actstatus;

			echo $Query="insert into templates (temp_id,section_id,temp_name,status)values('','$sectionid','$nametemp','$actstatus')";
			$ExecSection=mysql_query($Query) or die(mysql_error());
		}

		 public function  EditTemplateData(){


			 global $db,$nametemp,$actstatus, $sectionid,$temp_id;

			 $Query="update templates set temp_name='$nametemp',section_id='$sectionid',status='$actstatus' where temp_id='$temp_id'";
			
			$ExecSection=mysql_query($Query) or die(mysql_error());

		 }

		 public function  showAllTemplateName(){
		
			global $db,$Temp_HtmlTemp;

			$sectionQuery="select temp_name,temp_id from templates,section where templates.status='1' and templates.section_id=section.section_id";
			$execQuery=mysql_query($sectionQuery) or die(mysql_error());
			echo "<select name='tempid' id='tempid'>";
			echo "<option value='-1'> ----Please select---- </option>";
			while($dis=mysql_fetch_array($execQuery)){
					?>
					
					<option value='<?=$dis['temp_id']?>'<?if($Temp_HtmlTemp==$dis['temp_id']){
							 echo 'selected';
				}?>><?=$dis['temp_name']?></option>
				<?}
			
			echo "</select>";
			
		
		}

		public function DesignTemplate(){
		
			 global $db,$Htmltemp,$headerImage,$footerImage ;

			// $Query="insert into designtemplate (design_template_id,temp_id,email,headline,datetxt,bodymsg,contactpername,phnumber,thankmsg,status,html_template)values('','".addslashes($_SESSION['tempvalue']['tempid'])."','".addslashes($_SESSION['tempvalue']['email'])."','".addslashes($_SESSION['tempvalue']['headline'])."','".addslashes($_SESSION['tempvalue']['datetxt'])."','".addslashes($_SESSION['tempvalue']['bodymsg'])."','".addslashes($_SESSION['tempvalue']['contactpername'])."','".addslashes($_SESSION['tempvalue']['phnumber'])."','".addslashes($_SESSION['tempvalue']['thankmsg'])."','".addslashes($_SESSION['tempvalue']['actstatus'])."','".$Htmltemp."')";

		//	$Query="insert into designtemplate (design_template_id,temp_id,section_id,header_image,logo_align,footer_image,pic_align,email,headline,datetxt,bodymsg,contactpername,phnumber,thankmsg,status,html_template)values('','".addslashes($_SESSION['tempvalue']['tempid'])."','".addslashes($_SESSION['tempvalue']['sectionid'])."','".$_SESSION['headerimageupload']."','".addslashes($_SESSION['tempvalue']['logoalignval'])."','".$_SESSION['footerimageupload']."','".addslashes($_SESSION['tempvalue']['picalignval'])."','".addslashes($_SESSION['tempvalue']['email'])."','".addslashes($_SESSION['tempvalue']['headline'])."','".addslashes($_SESSION['tempvalue']['datetxt'])."','".addslashes($_SESSION['tempvalue']['bodymsg'])."','".addslashes($_SESSION['tempvalue']['contactpername'])."','".addslashes($_SESSION['tempvalue']['phnumber'])."','".addslashes($_SESSION['tempvalue']['thankmsg'])."','".addslashes($_SESSION['tempvalue']['actstatus'])."','".$Htmltemp."')";

		$Query="insert into designtemplate (design_template_id,temp_id,section_id,header_image,logo_align,footer_image,pic_align,email,headline,datetxt,bodymsg,contactpername,phnumber,thankmsg,status,html_template,tmpBgcolor)values('','".addslashes($_SESSION['tempvalue']['tempid'])."','".addslashes($_SESSION['tempvalue']['sectionid'])."','".$_SESSION['headerimageupload']."','".addslashes($_SESSION['tempvalue']['logoalignval'])."','".$_SESSION['footerimageupload']."','".addslashes($_SESSION['tempvalue']['picalignval'])."','".addslashes($_SESSION['tempvalue']['email'])."','".addslashes($_SESSION['tempvalue']['headline'])."','".addslashes($_SESSION['tempvalue']['datetxt'])."','".addslashes($_SESSION['tempvalue']['bodymsg'])."','".addslashes($_SESSION['tempvalue']['contactpername'])."','".addslashes($_SESSION['tempvalue']['phnumber'])."','".addslashes($_SESSION['tempvalue']['thankmsg'])."','".addslashes($_SESSION['tempvalue']['actstatus'])."','".$Htmltemp."','".addslashes($_SESSION['tempvalue']['chbckColor'])."')";
			
			$ExecSection=mysql_query($Query) or die(mysql_error());
			unset($_SESSION['tempvalue']);
		}

		public function ModifyDesignTemplate(){
		
			 global $db,$Htmltemp,$HtmlTempId ;

			//  $Query="update designtemplate set temp_id='".addslashes($_SESSION['tempvalue']['tempid'])."',email='".addslashes($_SESSION['tempvalue']['email'])."',headline='".addslashes($_SESSION['tempvalue']['headline'])."',datetxt='".addslashes($_SESSION['tempvalue']['datetxt'])."',bodymsg='".addslashes($_SESSION['tempvalue']['bodymsg'])."',contactpername='".addslashes($_SESSION['tempvalue']['contactpername'])."',phnumber='".addslashes($_SESSION['tempvalue']['phnumber'])."',thankmsg='".addslashes($_SESSION['tempvalue']['thankmsg'])."',status='".addslashes($_SESSION['tempvalue']['actstatus'])."',html_template='".$Htmltemp."' where design_template_id='".$HtmlTempId."'";

			$Query="update designtemplate set temp_id='".addslashes($_SESSION['tempvalue']['tempid'])."',section_id='".addslashes($_SESSION['tempvalue']['sectionid'])."',header_image='".$_SESSION['headerimageupload']."',logo_align='".addslashes($_SESSION['tempvalue']['logoalignval'])."',footer_image='".$_SESSION['footerimageupload']."',pic_align='".addslashes($_SESSION['tempvalue']['picalignval'])."',email='".addslashes($_SESSION['tempvalue']['email'])."',headline='".addslashes($_SESSION['tempvalue']['headline'])."',datetxt='".addslashes($_SESSION['tempvalue']['datetxt'])."',bodymsg='".addslashes($_SESSION['tempvalue']['bodymsg'])."',contactpername='".addslashes($_SESSION['tempvalue']['contactpername'])."',phnumber='".addslashes($_SESSION['tempvalue']['phnumber'])."',thankmsg='".addslashes($_SESSION['tempvalue']['thankmsg'])."',status='".addslashes($_SESSION['tempvalue']['actstatus'])."',html_template='".$Htmltemp."',tmpBgcolor='".addslashes($_SESSION['tempvalue']['chbckColor'])."' where design_template_id='".$HtmlTempId."'";
			
			$ExecSection=mysql_query($Query) or die(mysql_error());
			unset($_SESSION['tempvalue']);
		}

		public function ShowTempName($TempId){
			global $db;

			$sectionQuery="select temp_name,temp_id from templates where temp_id=$TempId";
			$execQuery=mysql_query($sectionQuery) or die(mysql_error());
			$dis=mysql_fetch_array($execQuery);
			echo $dis['temp_name'];


		}


}


?>