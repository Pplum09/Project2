<?php
session_start();
?>


<?php 
    include("layoutHeader.php");
?>          
<div class="row">
    <div class="col s2" style="margin-top:8px">
    </div>
    <div class="col s10">
        <div class="row" style="margin-top:8px"> 
            <div class="col s2"><img src="images/goku.jpg" height="100%" width="100%"></div>
                <div class="col s10">
                    <h5>
		              <?php
			             echo $_SESSION["firstN"], " ", $_SESSION["lastN"];
		              ?>
                        
                    </h5>                
                        <form id="stud-home"action="StudProcessHome.php" method="post" name="Home">
                            <?php
                            
                            $debug = false;
                            include('../CommonMethods.php');
                            $COMMON = new Common($debug);

                            $_SESSION["studExist"] = false;
                            $adminCancel = false;
                            $noApp = false;
                            $studid = $_SESSION["studID"];

                            $sql = "select * from Proj2Students where `StudentID` = '$studid'";
                            $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                            $row = mysql_fetch_row($rs);

                            if (!empty($row)){
                                $_SESSION["studExist"] = true;
                                if($row[6] == 'C'){
                                    $adminCancel = true;
                                }
                                if($row[6] == 'N'){
                                    $noApp = true;
                                }
                            }
                            
                            // start of drop down
                            echo "<a class='dropdown-button btn' data-activates='dropdown1'>Advising</a>";
                            echo "<ul id='dropdown1' class='dropdown-content'>";
                            if ($_SESSION["studExist"] == false || $adminCancel == true || $noApp == true){
                                
                                if($adminCancel == true){
                                    echo "debug first if in 02StudHome.php";    
                                    //echo "<p style='color:red'>The advisor has cancelled your appointment! Please schedule a new appointment.</p>";
                                }
                                echo "<li id='sign-up-dropdown'><a>Sign Up</a></li>";
                                echo "<li class='divider'></li>";
                            }
                            else{
                                echo "EDIT WHEN YOU SEE THIS";
                                echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='View'>View my appointment</button><br>";
                                echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Reschedule'>Reschedule my appointment</button><br>";
                                echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Cancel'>Cancel my appointment</button><br>";
                            }
            
                                echo "<li id='search-dropdown'><a>Search</a></li>";
                            echo "</ul>";
                            ?>
                            <!-- Dropdown Trigger -->
                            <a class="grey dropdown-button btn"href='#' data-activates='dropdown2'><i class='small material-icons'>settings</i></a>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown2' class='dropdown-content'>
                                <li id='settings-dropdown'><a>Settings</a></li>
                                <li class="divider"></li>
                                <li id='logout-dropdown' class="red"><a class="white-text">Log Out</a></li>
                             </ul>
                            <!--work around for using li tag to submit forms is to
                                trigger these 'invisible buttons' when clicking
                                <li> <a> buttons-->
                            <div style="display:none">
                                <button id="sign-up-invis-button" type='submit' name='selection' value='Signup'></button>
                                <button id="search-invis-button" type='submit' name='selection' value='Search'></button>
                                <button type='submit' name='selection' value='View'></button>
                                <button type='submit' name='selection' value='Reschedule'></button>
                                <button type='submit' name='selection' value='Cancel'></button>
                                <button id='settings-invis-button' type='submit' name='selection' value='Edit'></button>
                                <button id='logout-invis-button' type='submit' name='selection' value='LogOut'></button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
	       <div class="selections">
		      <form id="stud-home"action="StudProcessHome.php" method="post" name="Home">
                <?php
                    /*
                    $debug = false;
                    include('../CommonMethods.php');
                    $COMMON = new Common($debug);

                    $_SESSION["studExist"] = false;
                    $adminCancel = false;
                    $noApp = false;
                    $studid = $_SESSION["studID"];

                    $sql = "select * from Proj2Students where `StudentID` = '$studid'";
                    $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                    $row = mysql_fetch_row($rs);

                    if (!empty($row)){
                        $_SESSION["studExist"] = true;
                        if($row[6] == 'C'){
                            $adminCancel = true;
                        }
                        if($row[6] == 'N'){
                            $noApp = true;
                        }
                    }
                    
                    if ($_SESSION["studExist"] == false || $adminCancel == true || $noApp == true){
                        if($adminCancel == true){
                            echo "<p style='color:red'>The advisor has cancelled your appointment! Please schedule a new appointment.</p>";
                        }
                        echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Signup'>Signup for an appointment</button><br>";
                    }
                    else{
                        echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='View'>View my appointment</button><br>";
                        echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Reschedule'>Reschedule my appointment</button><br>";
                        echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Cancel'>Cancel my appointment</button><br>";
                    }
                    echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Search'>Search for appointment</button><br>";
                    echo "<button type='submit' name='selection' class='btn waves-effect waves-light' value='Edit'>Settings</button><br>";
                    */
                ?>
		  </form>
</div>
</div>

</div>
<div class=container>
    <h1>THIS IS WHERE EVERYTHING GOES</h1>
</div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  

<script>
    // advisor dropdown handlers
    $('#sign-up-dropdown').click(function() {
        $('#sign-up-invis-button').trigger('click');
    });
    
    $('#search-dropdown').click(function() {
        $('#search-invis-button').trigger('click');
    });
    
    $('#settings-dropdown').click(function() {
        $('#settings-invis-button').trigger('click');
    });
    
    $('#logout-dropdown').click(function() {
        $('#logout-invis-button').trigger('click');
    });
</script>

<?php
    include("layoutFooter.php");
?>