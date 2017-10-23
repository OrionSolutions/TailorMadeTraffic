<?php
/* Class created by Larry Mark B. Somocor
	June 09, 2010 - 4:42 PM
	this class creates instance of Select list menu
	dynamically, data derived from the database
*/
//include ('class/clsConnection.php');
class CreateCombo{
	public $cbo;
	function CreateCombo($sql,$name,$valueid,$displayname, $class=''){
		$cCon=new mycon();
		$rs=$cCon->getrecords($sql);
		if (strlen($class)>0){
			//With Class
			$this->cbo='<select unselectable="on" name="'.$name.'" id="'.$name.'" class="'.$class.'">';
		}else{
			$this->cbo='<select unselectable="on" name="'.$name.'" id="'.$name.'">';
		}
		
		if(!$rs) die(mysql_error());
		while($row = mysql_fetch_assoc($rs)) {
			$v=$row[$valueid];
			$d=$row[$displayname];
			$this->cbo.= '<option value="'.$v.'">'.$d.'</option>';
		}
		$this->cbo.='</select>';
	}
	function mycbo(){
		return $this->cbo;
	}
}


class CreateCombo2{
	public $cbo;
	function CreateCombo2($sql,$name,$valueid,$displayname, $class='' , $defaultvalueID='', $defaultvalues='',$withDefaultvalue=0){
		$cCon=new mycon();
		$rs=$cCon->getrecords($sql);
		if (strlen($class)>0){
			//With Class
			$this->cbo='<select name="'.$name.'" id="'.$name.'" class="'.$class.'">';
		}else{
			$this->cbo='<select name="'.$name.'" id="'.$name.'">';
		}
		
		if(!$rs) die(mysql_error());
		    if ($withDefaultvalue=1) {
		    $this->cbo.= '<option selected="selected" value="'.$defaultvalueID.'">'.$defaultvalues.'</option>';
			}
		while($row = mysql_fetch_assoc($rs)) {
			$v=$row[$valueid];
			$d=$row[$displayname];
			$this->cbo.= '<option value="'.$v.'">'.$d.'</option>';
		}
		$this->cbo.='</select>';
	}
	function mycbo(){
		return $this->cbo;
	}
}
?>