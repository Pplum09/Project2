<?php
session_start();
include("layoutHeader.php");
?>

<h4 class="center">Someone JUST took that appointment before you. Please find another available appointment.</h4>
<div class='centered'>
    <div>
      
    </div>
    <form action="02StudHome.php" method="post" name="complete">
        <a id='home' class="waves-effect waves-light btn-large">Home</a>
        <input id='home-invis' style='display:none' type="submit" name="return" class="button large go" value="Return to Home">
    </form>
</div>
<script>

    $('#home').click(function() {
        $('#home-invis').trigger('click');
    });
    
</script>
<?php
    include("layoutFooter.php");
?>