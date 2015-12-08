<?php
session_start();
include("layoutHeader.php");
?>
<div class='container'>
    <h3>Schedule Group Appointments</h3>
        <b><font color="red" size="3">Please note only <u>one</u> staff member needs to schedule the GROUP session since it involves all of you. Please identify which advisor will enter this type meeting before continuing.</font></b>    
        <br><br>
        <form action="AdminConfirmScheGroupApp.php" method="post" name="Confirm">
            <div id='calendar'>
                <a>Date<input id='date'type="date" name='date'class="datepicker"></a>
            </div>
            
            <div id='times'>
                <h5>Times</h5>
                    <input id='box1' type="checkbox" name='time[]' value='08:00:00'>
                    <label for="box1">8:00AM - 8:30AM</label><br>
                    <input id='box2'type="checkbox" name='time[]' value='08:30:00'>
                    <label for="box2">8:30AM - 9:00AM</label><br>
                    <input id='box3' type="checkbox" name='time[]' value='09:00:00'>
                    <label for="box3">9:00AM - 9:30AM</label><br>
                    <input id='box4' type="checkbox" name='time[]' value='09:30:00'>
                    <label for="box4">9:30AM - 10:00AM</label><br>
                    <input id='box5' type="checkbox" name='time[]' value='10:00:00'>
                    <label for="box5">10:00AM - 10:30AM</label><br>
                    <input id='box6' type="checkbox" name='time[]' value='10:30:00'>
                    <label for="box6">10:30AM - 11:00AM</label><br>
                    <input id='box7' type="checkbox" name='time[]' value='11:00:00'>
                    <label for="box7">11:00AM - 11:30AM</label><br>
                    <input id='box8' type="checkbox" name='time[]' value='11:30:00'>
                    <label for="box8">11:30AM - 12:00AM</label><br>
                    <input id='box9' type="checkbox" name='time[]' value='12:00:00'>
                    <label for="box9">12:00PM - 12:30PM</label><br>
                    <input id='box10' type="checkbox" name='time[]' value='12:30:00'>
                    <label for="box10">12:30PM - 1:00PM</label><br>
                    <input id='box11' type="checkbox" name='time[]' value='13:00:00'>
                    <label for="box11">1:00PM - 1:30PM</label><br>
                    <input id='box12' type="checkbox" name='time[]' value='13:30:00'>
                    <label for="box12">1:30PM - 2:00PM</label><br>
                    <input id='box13' type="checkbox" name='time[]' value='14:00:00'>
                    <label for="box13">2:00PM - 2:30PM</label><br>
                    <input id='box14'type="checkbox" name='time[]' value='14:30:00'>
                    <label for="box14">2:30PM - 3:00PM</label><br>
                    <input id='box15' type="checkbox" name='time[]' value='15:00:00'>
                    <label for="box15">3:00PM - 3:30PM</label><br>
                    <input id='box16'type="checkbox" name='time[]' value='15:30:00'>
                    <label for="box16">3:30PM - 4:00PM</label><br>
            </div>
            <div>
                <h5>Majors</h5>
                <input id='box17' class="filled-in" type="checkbox" name='major[]' value='Computer Engineering' checked>
                <label for="box17">Computer Engineering</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box18' class="filled-in" type="checkbox" name='major[]' value='Computer Science' checked>
                <label for="box18">Computer Science</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box19' class="filled-in" type="checkbox" name='major[]' value='Mechanical Engineering' checked>
                <label for="box19">Mechanical Engineering</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box20' class="filled-in" type="checkbox" name='major[]' value='Chemical Engineering' checked>
                <label for="box20">Chemical Engineering</label>
            </div>
            <div>
                <h5>Repeat Weekly</h5>
                <input id='box21' class="filled-in" type="checkbox" name='repeat[]' value='Monday'>
                <label for="box21">Monday</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box22' class="filled-in" type="checkbox" name='repeat[]' value='Tuesday'>
                <label for="box22">Tuesday</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box23' class="filled-in" type="checkbox" name='repeat[]' value='Wednesday'>
                <label for="box23">Wednesday</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box24' class="filled-in" type="checkbox" name='repeat[]' value='Thursday'>
                <label for="box24">Thursday</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id='box25' class="filled-in" type="checkbox" name='repeat[]' value='Friday'>
                <label for="box25">Friday</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5>Repeat for how many weeks:</h5>
                <input type="number" id="stepper" name="stepper" min="0" max="4" value="0" />
                <h5>Student Limit:</h5>
                <input type="number" id="stepper" name="stepper" min="1" max="10" value="1" />
            </div>
        
            <!--DISPLAYED-->
            <a id='create' class="waves-effect waves-light btn-large">Create</a>
            <a id='home' class="waves-effect waves-light btn-large">Home</a>
            <!--HIDDEN-->
            <input id='create-invis' style='display:none' type="submit" name="next" class="button large go" value="Create">
        </form>
        <form method="link" action="AdminUI.php" name="home">
            
            
            <!--HIDDEN-->
            <input id='home-invis' style='display:none' type="submit" name="next" class="button large go" value="Return to Home">    
        </form>
</div>          
<script>
    $('#create').click(function() {
        $('#create-invis').trigger('click');
    });
    $('#home').click(function() {
        $('#home-invis').trigger('click');
    });
    
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'dd/mm/yyyy'
    });
</script>

<?php 
    include('./workOrder/workButton.php'); 
    include("layoutFooter.php");
?>