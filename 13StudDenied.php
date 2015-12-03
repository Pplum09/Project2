<?php
session_start();
?>

<?php include('header.php'); ?>
    <title>Exit Message</title>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	    <div class="statusMessage">
		Someone JUST took that appointment before you. Please find another available appointment.
        </div>
		<form action="02StudHome.php" method="post" name="complete">
	    <div class="returnButton">
			<input type="submit" name="return" class="button large go" value="Return to Home">
	    </div>
		</div>
		</form>
      <?php include('footer.php'); ?>