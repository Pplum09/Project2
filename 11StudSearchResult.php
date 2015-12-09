<?php
session_start();
$debug = false;
include("CommonMethods.php");
$COMMON = new Common($debug);
include("layoutHeader.php");
?>
<div class='container'>
    <h3>Showing open appointments only</h3>			
<?php
    $date = $_POST["date"];
    $times = $_POST["time"];
    $advisor = $_POST["advisor"];
    $results = array();

    // input validations
    if ($date != "") {
        echo "Date: ", $date;
        $date = date('Y-m-d', strtotime($date));
    }
    
    else {
        echo "Date: All";   
    }
    
    echo "<br>";
    
    if (empty($time)) {
        echo "Time: All";
    }

    else {
        echo "Time: ", $time;
    }

    echo "<br>";

    if ($advisor == "") {
        echo "Advisor: All Appointments";
    }

    elseif($advisor == "I") {
        echo "Advisor: All Individual Appointments";
    }

    elseif ($advisor == '0') { 
        echo "Advisor: All Group Appointments";     
    }
    
    else {
        $sql = "select * from Proj2Advisors where `id` = '$advisor'";
        $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
        while($row = mysql_fetch_row($rs)) {
            echo "Advisor: ", $row[1], " ", $row[2];
        }  
    }
?>
<br><br>
<?php

    // default sql, remove later
    $sql = "SELECT * FROM Proj2Appointments LIMIT 30";
    
    // if a time was not selected
    if (empty($times)) {
        
        // date is empty
        if ($date == "") {
        
            // advisor options 
            if ($advisor == "") {
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 order by `Time` ASC Limit 30";
            }

            elseif($advisor == "I") {
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 and `AdvisorID` != 0 order by `Time` ASC Limit 30";
            }

            elseif ($advisor == '0') { 
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 and `AdvisorID` = 0 order by `Time` ASC Limit 30";
            }

            // particular advisor wanted
            else {
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 and `AdvisorID` = ".$advisor." order by `Time` ASC Limit 30";
            }     
        }      
        
        // date is given
        else {

            // advisor options
            if ($advisor == "") {
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 order by `Time` ASC Limit 30";
            }

            elseif($advisor == "I") {
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 and `AdvisorID` != 0 order by `Time` ASC Limit 30";
            }

            elseif ($advisor == '0') { 
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 and `AdvisorID` = 0 order by `Time` ASC Limit 30";
            }

            // particular advisor wanted
            else {
                $sql = "select * from Proj2Appointments where `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 and `AdvisorID` = ".$advisor." order by `Time` ASC Limit 30";
            }
        }
        
        // by this point, all sql should be set for this block, so run query and push into array
        $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
        
        $counter = 0;
        while ($row = mysql_fetch_row($rs)) {
            if($row[2] == 0) {
                $advName = "Group";
            }
            else {
                $advName = getAdvisorName($row); 
            }
            $found = "<tr><td>".date('l, F d, Y g:i A', strtotime($row[1]))."</td><td>".$advName."</td><td>".$row[3]."</td></tr>";
            array_push($results, $found);
            $counter++;
        }
        
        // FOR DEBUG ONLY
        // echo "total query: ", $counter,"<br>";
        //echo "query is: ", $sql;
    }
    
    // if time(s) were selected
    else {
       
        foreach($times as $t) {
            // date is empty
            if ($date == "") {
               
                // advisor options
                if ($advisor == "") {
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 order by `Time` ASC Limit 30";
                }

                elseif($advisor == "I") {
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 and `AdvisorID` != 0 order by `Time` ASC Limit 30";
                }

                elseif ($advisor == '0') { 
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 and `AdvisorID` = 0 order by `Time` ASC Limit 30";
                }

                // particular advisor wanted
                else {
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `EnrolledNum` = 0 and `AdvisorID` = ".$advisor." order by `Time` ASC Limit 30";
                }     
            }      

            // date is given
            else {
            
                // advisor options
                if ($advisor == "") {
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 order by `Time` ASC Limit 30";
                }

                elseif($advisor == "I") {
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 and `AdvisorID` != 0 order by `Time` ASC Limit 30";
                }

                elseif ($advisor == '0') { 
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 and `AdvisorID` = 0 order by `Time` ASC Limit 30";
                }

                // particular advisor wanted
                else {
                    $sql = "select * from Proj2Appointments where `Time` like '%".$t."%' and `Time` > '".date('Y-m-d H:i:s')."' and `Time` like '%".$date."%' and `EnrolledNum` = 0 and `AdvisorID` = ".$advisor." order by `Time` ASC Limit 30";
                }
            }   
            
            // by this point, all sql should be set for this block, so run query and push into array
            $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

            $counter = 0;
            while ($row = mysql_fetch_row($rs)) {
                if($row[2] == 0) {
                    $advName = "Group";
                }
                else {
                    $advName = getAdvisorName($row); 
                }
                $found = "<tr><td>".date('l, F d, Y g:i A', strtotime($row[1]))."</td><td>".$advName."</td><td>".$row[3]."</td></tr>";
                array_push($results, $found);
                $counter++;
            }

            // FOR DEBUG ONLY
            //echo "total query: ", $counter,"<br>";
            //echo "query is: ", $sql;
            }
        }
    echo "<br>";
    //By this point, the queries have been ran and the table's body has been constructed.
    //time to finish off creating the head of the table and inserting the body
    
    if (empty($results)) {
        echo"<h3>No results found</h3><br><br>";
    }

    else {
        echo "<table class='striped'>
                <thead>
                    <tr>
                        <th>Time:</th>
                        <th>Advisor</th>
                        <th>Major</th>
                    </tr>
                </thead>
                <tbody>";
                foreach($results as $r) {
                    echo($r."\n");   
                }
            
        echo "</tbody>
            </table>";
    }
?>
    
    <form action="02StudHome.php" method="link">
        <a id='done' class="waves-effect waves-light btn-large">Done</a>
	   <input id='done-invis' style='display:none' type="submit" name="done" value="Done">
    </form>
    <p>If the Major category is followed by a blank, then it is open for all majors.</p>	
</div>

<script>
    
    $('#done').click(function() {
        $('#done-invis').trigger('click');
    });
    
</script>
<?php
    include("layoutFooter.php");

// More code reduction by Lupoli - 9/1/15
// just getting the advisor's name
function getAdvisorName($row)
{
	global $debug; global $COMMON;
	$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
	$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
	$row2 = mysql_fetch_row($rs2);
	return $row2[1] ." ". $row2[2];
}

?>