<?php 
session_start();
$debug = false;

if($debug) { echo("Session variables-> ".var_dump($_SESSION)); }

include('GetAdvisorData.php');
$COMMON = new Common($debug);
include("layoutHeader.php");
?>
<div class="row">
    <div class="col s2" style="margin-top:8px">
    </div>
    <div class="col s10">
        <div class="row" style="margin-top:8px"> 
            <div class="col s2">
                <img src="images/goku.jpg" height="100%" width="100%">
            </div>
                <div class="col s10">
                    <h5>
                        <?php
                            $temp = getUsername();
                            if(!isset($temp)) {// someone landed this page by accident
                                return;
                            }		
                            $User = getUsername();
                            $Pass = getPassword();
                            $sql = "SELECT `firstName`, `lastName` FROM `Proj2Advisors` WHERE `Username` = '$User' and `Password` = '$Pass'";
                            $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                            $row = mysql_fetch_row($rs);
                            echo $row[0], " ",$row[1];
                        ?>                                
                    </h5>  
                    <!--DROP DOWN BUTTON-->
                    <a class='dropdown-button btn' data-activates='dropdown1'>Appointment</a>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li id='schedule'><a>Schedule Appointment</a></li>
                        <li class='divider'></li>
                        <li id='print'><a>Print Schedule</a></li>
                        <li class='divider'></li>
                        <li id='edit'><a>Edit Appointents</a></li>
                        <li class='divider'></li>
                        <li id='search'><a>Search Appointments</a></li>
                    </ul>
                    
                    <!--SETTINGS BUTTON-->
                    <a class="grey dropdown-button btn"href='#' data-activates='dropdown2'><i class='small material-icons'>settings</i></a>
                    <ul id='dropdown2' class='dropdown-content'>
                        <li id='create'><a>Create New Account</a></li>
                        <li class="divider"></li>
                        <li id='logout' class="red"><a class="white-text">Log Out</a></li>
                    </ul>
                    
                    <!--NOTE:
                        Only the original input displays are blocked, but they still exist.
                        This method is sloppy, but is used throughout the project so that better
                        looking buttons may be used. These buttons ARE still triggered though.
                        jQuery is used so that when the visual buttons are triggered, the corresponding
                        HIDDEN inputs are also triggered. This method was used because materializeCSS,
                        a css framework, uses <a> tags wrapped in <li> tags to be displayed in the dropdowns.
                        We found that only <input> and <button> tags could trigger form submissions
                    -->
                    <form action="AdminProcessUI.php" method="post" name="UI">    
                        <div style="display:none">
                            <input id='schedule-invis' type="submit" name="next" class="button large selection" value="Schedule appointments"><br>
                            <input id='print-invis' type="submit" name="next" class="button large selection" value="Print schedule for a day"><br>
                            <input id='edit-invis' type="submit" name="next" class="button large selection" value="Edit appointments"><br>
                            <input id='search-invis' type="submit" name="next" class="button large selection" value="Search for an appointment"><br>
                            <input id='create-invis' type="submit" name="next" class="button large selection" value="Create new Admin Account"><br>
                        </div>
                    </form>
                    <form method="link" action="Logout.php">
                        <input id='logout-invis' style='display:none' type="submit" name="next" class="button large go" value="Log Out">
                    </form>
                </div>
            </div>
    </div>
</div>
<script>
   
    // advisor dropdown handlers
    $('#schedule').click(function() {
        $('#schedule-invis').trigger('click');
    });
    
    $('#print').click(function() {
        $('#print-invis').trigger('click');
    });
    
    $('#edit').click(function() {
        $('#edit-invis').trigger('click');
    });
    
    $('#search').click(function() {
        $('#search-invis').trigger('click');
    });
    
    $('#create').click(function() {
        $('#create-invis').trigger('click');
    });
    
    $('#logout').click(function() {
        $('#logout-invis').trigger('click');
    });
</script>
<?php
    include("layoutFooter.php");
?>
