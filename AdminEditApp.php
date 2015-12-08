<?php
session_start();
include("layoutHeader.php");
?>
<div class='centered'>
    <h4>Edit Appointments</h4>
     <a id='individual' class="waves-effect waves-light btn-large">Individual</a>
     <a id='group' class="waves-effect waves-light btn-large">Group</a>
     <a id='home' class="waves-effect waves-light btn-large">Home</a>
	<form method="post" action="AdminProcessEdit.php">
		<div style="display:none">	
            <input id='individual-invis' type="submit" name="next" value="Individual">
            <input id='group-invis' type="submit" name="next" value="Group">
        </div>
	</form>
	<form method="link" action="AdminUI.php">
        <input id='home-invis' style='display:none' type="submit" name="next" value="Return to Home">
	</form>
</div>
<script>
    $('#individual').click(function() {
        $('#individual-invis').trigger('click');
    });
    $('#group').click(function() {
        $('#group-invis').trigger('click');
    });
    $('#home').click(function() {
        $('#home-invis').trigger('click');
    });
</script>
<?php
    include("layoutFooter.php");
?>