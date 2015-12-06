<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>UMBC COEIT Engineering and Computer Science Advising Student Sign In</title>
	<!--<link rel='stylesheet' type='text/css' href='../css/standard.css'/>-->
      <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }

  main {
    flex: 1 0 auto;
  }
    </style>
    </head>
  <body>
        <header>
            <nav class="yellow">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">COEIT Engineering and Computer Science Advising</a>
    </div>
  </nav>
        </header>
        <main>
            <div>
                <div id='modal2' class='modal modal-fixed-footer'>
                                
                                <div class="center-align">
                                    <img src="images/lupoli.jpg" width="50%" height="50%">
                                </div>
                                <div class='center-align modal-content'>
                                    <h5 id="alert1" class="green-text">registration success</h5>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                                </div>
                </div> 
                        <a class='modal-trigger waves-effect waves-light btn' href='#modal1'>Register</a>
                 <div id='modal1' class='modal modal-fixed-footer'>
                                <div class='modal-content'>
                                    
                                  <h4>Registration</h4>
                                    <h5 id="alert" class="red-text" style="display:none">*user is not registed</h5>
                                  <form action='StudRegProcess.php' method='post' name='reg' id='reg'>
                    <div class='row'>
                        <div class='input-field col s6'>
                            <input id='firstN' size='30' maxlength='20' type='text' name='firstN' required autofocus>
                            <label for='firstN'>First Name</label>
                        </div>
                        <div class='input-field col s6'>
                            <input id='lastN' size='30' maxlength='20' type='text' name='lastN' required>
                            <label for='lastN'>Last Name</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input id='studID' size='30' maxlength='20' type='text' pattern='[A-Za-z]{2}[0-9]{5}' title='AB12345' placeholder='AB12345' name='studID' required>
                            <label for='studID'>Student ID</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input id='email' size='30' maxlength='40' type='email' name='email' placeholder='student1@umbc.edu' required>
                            <label for='email'>Email</label>
                        </div>
                    </div>
                    <div>    
                        <select id="major" name="major">
                            <option value='' disabled selected>Select Major</option>
                            <option>Computer Engineering</option>
				            <option>Computer Science</option>
				            <option>Mechanical Engineering</option>
				            <option>Chemical Engineering</option
                        </select>
                        <label>Materialize Select</label>
                    </div>
                    <div>
                        <input type='submit' name='next' value='Next'>
                    </div>      
                </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                                </div>
                              </div>  
            </div>

        <div class="container">  
            
                             
                             
                <div>
                <h4>Student Sign In</h4>
                    
                <form action="StudProcessSignIn.php" method="post" name="SignIn" id="SignIn">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="firstN" size="30" maxlength="20 "type="text" name="firstN" required autofocus>
                            <label for="firstN">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="lastN" size="30" maxlength="20" type="text" name="lastN" required>
                            <label for="lastN">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="studID" size="30" maxlength="20" type="text" pattern="[A-Za-z]{2}[0-9]{5}" title="AB12345" placeholder="AB12345" name="studID" required>
                            <label for="studID">Student ID</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" size="30" maxlength="40" type="email" name="email" placeholder="student1@umbc.edu" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div>    
                        <select id="major" name="major">
                            <option value="" disabled selected>Select Major</option>
                            <option>Computer Engineering</option>
				            <option>Computer Science</option>
				            <option>Mechanical Engineering</option>
				            <option>Chemical Engineering</option
                        </select>
                        <label>Materialize Select</label>
                    </div>
                    <div>
                        <input type="submit" name="next" value="Next">
                    </div>      
                </form>
                    </div>
        </div>
            </main>
        <!--footer-->
    <footer>
        <div class="section page-footer teal darken-1 white-text">
	       <div class="container">
            <span>&copy IzzyMattNick</span>
	       </div>
        </div>
    </footer>
        <!-- Compiled and minified JavaScript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
      <script>
            $(document).ready(function() {
                $('select').material_select();
            });
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
              });
          <?php
                if (isset($_SESSION["userDNE"])) {
                    if ($_SESSION["userDNE"]) {
                        echo "$('#alert').show();";
                        echo "$('#modal1').openModal();";
                        $_SESSION["userDNE"] = FALSE;
                    }
                }
                if (isset($_SESSION["regPass"])) {
                    if ($_SESSION["regPass"]) {
                        echo "$('#modal2').openModal();";
                        $_SESSION["regPass"] = FALSE;
                    }
                }
            ?>
      </script>
  </body>
  
</html>
      
