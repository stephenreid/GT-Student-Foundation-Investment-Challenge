<?
//Thanks Slava Shirokav and Sean Bryant



	
	class DBBase{
		var $handle;
		var $database;
		function DBBase(){
			$host = "localhost";
			$user = "";
			$password = "";
			if(!$this->handle = @mysql_pconnect($host,$user,$password))
				die("Error Connecting to The Database Server<br>".mysql_error());
			register_shutdown_function(array(&$this,"_DBBase"));
            $this->selectDB("");
		}
		
		function _DBBase(){
			mysql_close($this->handle);
		}
		
		function getHandle($database=false,$info=false){
			if($info){
					print "This database: ".$this->database."<br>";
					print "New Database to Select: $database<br>";
					if($database)
						$this->selectDB($database);
					die($this->database);
			}
			if($database){
				$this->selectDB($database);
			}
			//print "New database: ".$this->database."<br>";
			return $this->handle;
		}
		
		function selectDB($database){

           //print "About to select $database<br>";
			@mysql_select_db($database,$this->getHandle()) or die("Error Selecting The Database: $database<br>Mysql Error(".mysql_error().")");
			$this->database = $database;
			return true;
		}
		
		function getDatabase(){
			if(!empty($this->database))
				return $this->database;
			return false;
		}
		
		function run($sql,$errors=true,$database=false){
			$return = array();
			if($errors){
				$results = mysql_query($sql,$this->getHandle($database)) or die('<hr>Error Executing<br><font class="bold">'.$sql.'</font><br>Error Returned(<font class="error">'.mysql_error($this->getHandle($database)).'</font>)in database'.$this->database.'<hr>');
				$numrows = @mysql_num_rows($results);
				$affected = mysql_affected_rows($this->getHandle($database));
				$lastid = @mysql_insert_id($this->getHandle($database));
				if(empty($numrows))
					$numrows = 0;
				if(empty($affected))
					$affected = 0;
				$return["result"] = $results;
				$return["numrows"] = $numrows;
				$return["affected"] = $affected;
				$return["lastid"] = $lastid;
			}
			else{
				$results = mysql_query($sql,$this->getHandle($database));
				$numrows = @mysql_num_rows($results);
				$affected = @mysql_affected_rows($results,$this->getHandle($database));
				if(empty($numrows))
					$numrows = 0;
				if(empty($affected))
					$affected = 0;
				$return["result"] = $results;
				$return["numrows"] = $numrows;
				$return["affected"] = $affected;
				$return["lastid"] = $lastid;
			}
			return $return;
		}

		
		function printCSS($path,$file="error.css"){
			print '<link REL="stylesheet" HREF="'.$path.'/'.$file.'" TYPE="text/css" MEDIA="screen">'."\n";
		}
		/* Use printStyle for default error printing! use printCSS to print either a defualt or custom one! */
		function printStyle(){
			print '<style type="text/css" media="screen">
body{
	font:Geneva, Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:normal;
	color:#000000;
}
.error{
	font:Verdana, Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bolder;
	color:#FF0000;
}
.bold{
	font-weight:bold;
}
hr{
	border:1px solid black
}
</style>
';
}
		function lastID(){
			return @mysql_insert_id($this->getHandle());
		}
	
	}
		
