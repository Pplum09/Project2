<?php
session_start();
include("CommonMethods.php");
$debug = false;

$COMMON = new Common($debug);

if(isset($_POST["advisor"])){
	$_SESSION["advisor"] = $_POST["advisor"];
}

$localAdvisor = $_SESSION["advisor"];
$localMaj = $COMMON->convertMajor($_SESSION["major"]);

$sql = "select * from Proj2Advisors where `id` = '$localAdvisor'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);
$advisorName = $row[1]." ".$row[2];

// header include
include("layoutHeader.php");
?>

<!--MODAL POP UP VALIDATION-->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class='centered red-text'>*No time selected</h4>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
</div>

<div class="container">
            <form action = "10StudConfirmSch.php" method = "post" name = "SelectTime">
                <?php
                    $curtime = time();
                    if ($_SESSION["advisor"] != "Group") { // for individual conferences only 
                        $sql = "select * from Proj2Appointments where $temp `EnrolledNum` = 0 
                                and (`Major` like '%$localMaj%' or `Major` = '') and `Time` > '".date('Y-m-d H:i:s')."' and `AdvisorID` = ".$_POST['advisor']." 
                                order by `Time` ASC limit 30";
                        $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                        echo "<h4>Select appointment with ",$advisorName,":</h4>";
                    }
                    else { // for group conferences
                        $temp = "";
                        if($localAdvisor != "Group") { 
                            $temp = "`AdvisorID` = '$localAdvisor' and "; 
                        }
                        $sql = "select * from Proj2Appointments where $temp `EnrolledNum` < `Max` and `Max` > 1 and (`Major` like '%$localMaj%' or `Major` = '')  and `Time` > '".date('Y-m-d H:i:s')."' order by `Time` ASC limit 30";
                        $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                        echo "<h2>Group Advising</h2><br>";
                        echo "<label for='prompt'>Select appointment:</label><br>";
                    }
                while($row = mysql_fetch_row($rs)) {
                    $datephp = strtotime($row[1]);
                    echo "<p><input class='with-gap' id='",$row[0],"' type='radio' name='appTime' required value='", $row[1], "'>";
                    echo "<label for='",$row[0],"'>", date('l, F d, Y g:i A', $datephp) ,"</label></p>";
                }
                ?>
                <input id='next-invis' style="display:none" type="submit" name="next" value="Next">
            </form>
            <form method="link" action="02StudHome.php">
                <input id='cancel-invis' style="display:none" type="submit" name="home" value="Cancel">
            </form>
            <!--DISPLAYED BUTTONS-->
            <a id='next' class="waves-effect waves-light btn-large">Next</a>
            <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>
            <p>Note: Appointments are maximum 30 minutes long.</p>
            <p style="color:red">If there are no more open appointments, contact your advisor or click <a>here</a> to start over.</p>
</div>
<script>
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
    
    $('#next').click(function() {
    
        // handles radio selector validation
        // if statement executed, then no radio button is selected
        if(!$("input:radio[name='appTime']").is(":checked")) {
            $('#modal1').openModal();
        }
    
        $('#next-invis').trigger('click');
    });
    
    
    $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
</script>
<?php
    include("layoutFooter.php");
?>