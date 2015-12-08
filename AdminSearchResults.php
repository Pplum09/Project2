<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug); 
include('layoutHeader.php');
?>
<div class='container'>
			<h3>Search results</h3>
			<p>Showing results for: </p>
			<?php
				$date = $_POST["date"];
				$times = $_POST["time"];
				$advisor = $_POST["advisor"];
				$studID = $_POST["studID"];
				$studLN = $_POST["studLN"];
				$filter = $_POST["filter"];
				$results = array();
				
				if($date == ''){ echo "Date: All"; }
				else{ 
					echo "Date: ",$date;
					$date = date('Y-m-d', strtotime($date));
				}
				echo "<br>";
				if(empty($times)){ echo "Time: All"; }
				else{
					$i = 0;
					echo "Time: ";
					foreach($times as $t){
						echo ++$i, ") ", date('g:i A', strtotime($t)), " ";
					}
				}
				echo "<br>";
				if($advisor == ''){ echo "Advisor: All appointments"; }
				elseif($advisor == 'I'){ echo "Advisor: All individual appointments"; }
				elseif($advisor == '0'){ echo "Advisor: All group appointments"; }
				else{
					$sql = "select * from Proj2Advisors where `id` = '$advisor'";
					$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					while($row = mysql_fetch_row($rs)){
						echo "Advisor: ", $row[1], " ", $row[2];
					}
				}
				echo "<br>";
				if($studID == '' && $studLN == ''){	echo "Student: All"; }
				else{
					$studLN = strtoupper($studLN);
					$studID = strtoupper($studID);
					$sql = "select `LastName`, `StudentID` from Proj2Students where `StudentID` = '$studID' or `LastName` = '$studLN'";
					$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					$row = mysql_fetch_row($rs);
					$studLN = $row[0];
					$studID = $row[1];
					echo "Student: ", $studID, " ", $studLN;
				}
				echo "<br>";
				if($filter == ''){ echo "Filter: All appointments"; }
				elseif($filter == 0){ echo "Filter: Open appointments"; }
				elseif($filter == 1){ echo "Filter: Closed appointments"; }
				?>
				<br><br><label>
				<?php
				if(empty($times)){
					if($advisor == 'I'){
						if($filter == 1){
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and 
								`AdvisorID` != 0 and 
								`EnrolledID` like '%$studID%' and 
								`EnrolledNum` >= 1 order by `Time` ASC";
						}
						else{
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and 
								`AdvisorID` != 0 and 
								`EnrolledID` like '%$studID%' and 
								`EnrolledNum` like '%$filter%' order by `Time` ASC";
						}
					}
					else{
						if($filter == 1){
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and 
								`AdvisorID` like '%$advisor%' and 
								`EnrolledID` like '%$studID%' and 
								`EnrolledNum` >= 1 order by `Time` ASC";
						}
						else{
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and 
								`AdvisorID` like '%$advisor%' and 
								`EnrolledID` like '%$studID%' and 
								`EnrolledNum` like '%$filter%' order by `Time` ASC";
						}
					}
					$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					$row = mysql_fetch_row($rs);
					$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					if($row){
						while($row = mysql_fetch_row($rsA)){
							if($row[2] == 0){
								$advName = "Group";
							}
							else{
								$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
								$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
								$row2 = mysql_fetch_row($rs2);
								$advName = $row2[1] ." ". $row2[2];
							}
							$found = "Time: ". date('l, F d, Y g:i A', strtotime($row[1])). 
									"<br>Advisor: ". $advName. 
									"<br>Major: ". $row[3]. 
									"<br>Enrolled Students: ". $row[4]. 
									"<br>Number of enrolled student(s): ". $row[5]. 
									"<br>Maximum number of students allowed: ". $row[6]. "<br><br>";
							array_push($results, $found);
						}
					}
				}
				else{
					if($advisor == 'I'){
						foreach($times as $t){
							if($filter == 1){
								$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and 
									`AdvisorID` != 0 and 
									`EnrolledID` like '%$studID%' and
									`EnrolledNum` >= 1 order by `Time` ASC";
							}
							else{
								$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and 
									`AdvisorID` != 0 and 
									`EnrolledID` like '%$studID%' and
									`EnrolledNum` like '%$filter%' order by `Time` ASC";
							}
							$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							$row = mysql_fetch_row($rs);
							$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							if($row){
								while($row = mysql_fetch_row($rsA)){
									if($row[2] == 0){
										$advName = "Group";
									}
									else{
										$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
										$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
										$row2 = mysql_fetch_row($rs2);
										$advName = $row2[1] ." ". $row2[2];
									}
									$found = "Time: ". date('l, F d, Y g:i A', strtotime($row[1])). 
											"<br>Advisor: ". $advName. 
											"<br>Major: ". $row[3]. 
											"<br>Enrolled Students: ". $row[4]. 
											"<br>Number of enrolled student(s): ". $row[5]. 
											"<br>Maximum number of students allowed: ". $row[6]. "<br><br>";
									array_push($results, $found);
								}
							}
						}
					}
					else{
						foreach($times as $t){
							if ($filter == 1){
								$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and 
									`AdvisorID` like '%$advisor%' and 
									`EnrolledID` like '%$studID%' and 
									`EnrolledNum` >= 1 order by `Time` ASC";
							}
							else{
								$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and 
									`AdvisorID` like '%$advisor%' and 
									`EnrolledID` like '%$studID%' and 
									`EnrolledNum` like '%$filter%' order by `Time` ASC";
							}
							$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							$row = mysql_fetch_row($rs);
							$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							if($row){
								while($row = mysql_fetch_row($rsA)){
									if($row[2] == 0){
										$advName = "Group";
									}
									else{
										$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
										$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
										$row2 = mysql_fetch_row($rs2);
										$advName = $row2[1] ." ". $row2[2];
									}
									$found = "Time: ". date('l, F d, Y g:i A', strtotime($row[1])). 
											"<br>Advisor: ". $advName. 
											"<br>Major: ". $row[3]. 
											"<br>Enrolled Students: ". $row[4]. 
											"<br>Number of enrolled student(s): ". $row[5]. 
											"<br>Maximum number of students allowed: ". $row[6]. "<br><br>";
									array_push($results, $found);
								}
							}
						}
					}
				}
				if(empty($results)){
					echo "No results found.<br><br>";
				}
				else{
					foreach($results as $r){
					echo $r;
					}
				}
				?>
				</label>
		<form method="link" action="AdminUI.php" name="home">
            <a id='home' class="waves-effect waves-light btn-large">Return Home</a>
			<input id='home-invis' style='display:none' type="submit" name="next" value="Return to Home">
		</form>
		<p>If the Major category is followed by a blank, then it is open for all majors.</p>
	</form>
</div>
<script>
     $('#home').click(function() {
        $('#home-invis').trigger('click');
    });
</script>
<?php
include('./workOrder/workButton.php');
include("layoutFooter.php");
?>