<?php 

class Common
{	
	var $conn;
	var $debug; // this is set by a initiated value in the constructor
			
	function Common($debug)
	{
		$this->debug = $debug; 
		//$rs = $this->connect("jeanice1"); // db name really here
		//$rs = $this->connect("web.coeadvising_db"); // db name really here
		$rs = $this->connect("fd57611"); // db name really here
		return $rs;
	}

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
	
	function connect($db)// connect to MySQL
	{
		$conn = @mysql_connect("studentdb-maria.gl.umbc.edu", "fd57611", "@6ZUr+kkCG%-PVLk") or die("<br> Could not connect to MySQL <br>");
		// $conn = @mysql_connect("studentdb.gl.umbc.edu", "jeanice1", "jeanice1") or die("<br> Could not connect to MySQL <br>");
		//$rs = @mysql_select_db($db, $conn) or die("<br> Could not connect to $db database <br>");
		$rs = @mysql_select_db($db, $conn) or die("<br> Could not connect to $db database <br>");
		$this->conn = $conn; 
	}

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
	
	function executeQuery($sql, $filename) // execute query
	{
		if($this->debug == true) { echo("$sql <br>\n"); }
		$rs = mysql_query($sql, $this->conn) or die("<br> Could not execute query '$sql' in $filename <br>"); 
		return $rs;
	}			

    // ADDED FOR PROJ2 BY IZZY
    function convertMajor($major) {
        if ($major == "Computer Engineering") {
            return "CMPE";
        }
        
        elseif ($major == "Computer Science") {
            return "CMSC";
        }
        
        elseif ($major == "Mechanical Engineering") {
            return "MENG";
        }
        
        elseif ($major == "Chemical Engineering") {
            return "CENG";   
        }
        else {
            return "ENGR";
        }
    }
       
} // ends class, NEEDED!!

?>