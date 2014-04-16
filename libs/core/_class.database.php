<?php

class Database{
	var $kuery;
	function Database($kuery){
		$this->kuery=& $kuery;
	}
	
	function fetch(){
		return @mysql_fetch_array($this->kuery);
	}
	
	function size(){
		return @mysql_num_rows($this->kuery);
	}
	
	function reset(){
		return @mysql_data_seek($this->kuery,0);
	}
	 
	function erorkah(){
		$error=$this->da->errorkah();
		if(!empty($error)){
			return $error;
		}else{
			return false;
		}
	}
}



?>