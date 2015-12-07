<?php
session_start();
include('GetStudentData.php');
include('layoutHeader.php');
?>
  <h1 class='red-text'>*if the page only has the home button, contact webmaster</h1>
<div class="centered">
  
    <?php
    $_SESSION["resch"] = false;			
    if(getStatus() == "complete"){
        echo "You have completed your sign-up for an advising appointment.";
    }
    elseif(getStatus() == "none"){
        echo "You did not sign up for an advising appointment.";
    }
    if(getStatus() == "cancel"){
        echo "You have cancelled your advising appointment.";
    }
    if(getStatus() == "resch"){
        echo "You have changed your advising appointment.";
    }
    if(getStatus() == "keep"){
        echo "No changes have been made to your advising appointment.";
    }
    ?>
    <form action="02StudHome.php" method="post" name="complete">
        <a id='home' class="waves-effect waves-light btn-large">Home</a>
        <input id='home-invis' style='display:none' type="submit" name="return" class="button large go" value="Return to Home">
    </form>
</div>
<script>
    
    $('#home').click(function() {
        $('#home-invis').trigger('click');
    })
    
</script>
<?php
    include("layoutFooter.php");
?>