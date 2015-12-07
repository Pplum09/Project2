    </main>
    <footer>
        <div class="section page-footer teal darken-1 white-text">
	       <div class="container">
            <span>&copy IzzyMattNick</span>
	       </div>
        </div>
    </footer>
      <script>
            $(document).ready(function() {
                $('select').material_select();
            });
            
            $('.dropdown-button').dropdown({
                  inDuration: 300,
                  outDuration: 225,
                  constrain_width: false, // Does not change width of dropdown to that of the activator
                  hover: true, // Activate on hover
                  gutter: 0, // Spacing from edge
                  belowOrigin: true, // Displays dropdown below the button
                  alignment: 'left' // Displays dropdown with edge aligned to the left of button
            });
            
         $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });
      </script>

  </body>
  
</html>
