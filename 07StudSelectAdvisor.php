<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);
include("layoutHeader.php");
?>

<!--MODAL POP UP VALIDATION-->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class='centered red-text'>*No advisor selected</h4>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
</div>


<div class='centered'>
    <form action="08StudSelectTime.php" method="post" name="SelectAdvisor">
    <h3>Select Advisor</h3> 
    <?php
        $sql = "select * from Proj2Advisors";
        $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
        while($row = mysql_fetch_row($rs)){
            echo "<p><input class='with-gap' id='",$row[0],"' type='radio' name='advisor' required value='", $row[0],"'><label class='black-text' for='",$row[0],"'>", $row[1]," ", $row[2],"</label></p>";
            echo "";
        }
    ?>
        <!--DISPLAYED BUTTONS-->
        <a id='next' class="waves-effect waves-light btn-large">Next</a>
        <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>

        <!--input hidden so that better looking buttons can be used-->
        <input id='next-invis' style='display:none' type="submit" name="next" value="Next">
    </form>
    <form method="link" action="02StudHome.php">
        <input id='cancel-invis' style='display:none' type="submit" name="home" value="Cancel">
    </form>
</div>

<!--HIDDEN-->
<div style="display:none">
    <h1>Individual Advising</h1>
    <h2>Select Advisor</h2>
    <form action="08StudSelectTime.php" method="post" name="SelectAdvisor">
        <?php
            $sql = "select * from Proj2Advisors";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			while($row = mysql_fetch_row($rs)){
				echo "<label for='",$row[0],"'><input id='",$row[0],"' type='radio' name='advisor' required value='", $row[0],"'>", $row[1]," ", $row[2],"</label><br>";
			}
		?>
        <input type="submit" name="next" class="button large go" value="Next">
    </form>
    <form method="link" action="02StudHome.php">
        <input type="submit" name="home" class="button large" value="Cancel">
    </form>
</div>   

<script>
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
    
    $('#next').click(function() {
    
        // handles radio selector validation
        // if statement executed, then no radio button is selected
        if(!$("input:radio[name='advisor']").is(":checked")) {
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