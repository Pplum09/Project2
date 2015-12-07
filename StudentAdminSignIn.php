<?php
    include("layoutHeader.php");
?>
    <div class="centered">
        <h2>Select Login</h2>
        <a id='student' class="waves-effect waves-light btn-large">Student</a>
        <a id='admin' class="waves-effect waves-light btn-large">Administrator</a>
        
            <!--inputs are hidden so that other better looking buttons can be used to input the forms-->
            <form method="link" action="01StudSignIn.php"> 
                <input id="student-invis" style="display:none" type="submit" name="next" class="button large go" value="Sign in as a Student">
            </form>
            <form method="link" action="AdminSignIn.php">
                <input id='admin-invis' style="display:none" type="submit" name="next" class="button large go" value="Sign in as an Admin">
            </form>
    
    </div>

<script>
    $('#student').click(function() {
        $('#student-invis').trigger('click');
    });
    
    $('#admin').click(function() {
        $('#admin-invis').trigger('click');
    });
    
</script>
<?php
    include("layoutFooter.php");
?>