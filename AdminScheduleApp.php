<?php
session_start();
include("layoutHeader.php");
?>
<div class='container'>
    <h1>Schedule Appointments</h1>
    <h2>Select advising type</h2><br>
    
    <a id='individual' class="waves-effect waves-light btn-large">Individual</a>
    <a id='group' class="waves-effect waves-light btn-large">Group</a>
    <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>
	<form method="post" action="AdminProcessSchedule.php">
		<div style="display:none">
            <input id='individual-invis' type="submit" name="next" value="Individual">
            <input id='group-invis' type="submit" name="next" value="Group">
        </div>
    </form>
    <form method="link" action="AdminUI.php">
        <input id='cancel-invis' style='display:none' type="submit" name="home" class="button large" value="Cancel">
    </form>
</div>

<script>
    $('#individual').click(function() {
        $('#individual-invis').trigger('click');
    });
     $('#group').click(function() {
        $('#group-invis').trigger('click');
    });
     $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
</script>
<?php
include("layoutFooter.php");
?>