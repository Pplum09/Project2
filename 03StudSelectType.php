<?php
session_start();
include("layoutHeader.php");
?>
<!--SELECT NEXT AVAILABLE NOT YET IMPLEMETED WARNING!!!-->

<!--DISPLAYED-->
<div class='centered'>
    <h3 class='center'>Select Advising Type</h3>
    <a id='next' class="waves-effect waves-light btn-large">Select Next Available</a>
    <a id='individual' class="waves-effect waves-light btn-large">Individual</a>
    <a id='group' class="waves-effect waves-light btn-large">Group</a>
    <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>
</div>

<!--HIDDEN-->
<!--display none so that better looking buttons can be used-->
<div style="display:none">
    <form action="StudProcessType.php" method="post" name="SelectType">
		<input id='individual-invis' type="submit" name="type" class="button large go" value="Individual">
		<input id='group-invis' type="submit" name="type" class="button large go" value="Group">
    </form>
	<form method="link" action="02StudHome.php">
		<input id='cancel-invis' type="submit" name="home" class="button large" value="Cancel">
    </form>
	</div>
<script>
    $('#next').click(function() {
        $('#next-invis').trigger('click');
    });
    
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