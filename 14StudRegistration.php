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
       
        <div class="container">               
                <h4>Registration</h4>
                <form action="StudRegProcess.php" method="post" name="reg" id="reg">
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
                        <select>
                            <option value="" disabled selected>Select Major</option>
                            <option>Computer Engineering</option>
				            <option>Computer Science</option>
				            <option>Mechanical Engineering</option>
				            <option>Chemical Engineering</option
                        </select>
                        <label>Materialize Select</label>
                    </div>
                    <div>
                        <input type="submit" name="next" value="Register">
                    </div>      
                </form>
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
      </script>
  </body>
  
</html>
