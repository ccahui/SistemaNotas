
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
            
  
    <script>
        /*
        1 Responsive Celular
        2 Form Selected 
        3 Dropdown
        4 Modal
        */
     
        function isNumber(event){
          return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57
        }

        function validarNota(value){
          if (parseInt(value) > 20){
            return 20;
          }
           return value;
        }
        
        $(document).ready(function(){
          $('.sidenav').sidenav(); 
          $('select').formSelect();
          $(".dropdown-trigger").dropdown();
          $('.modal').modal();
        });      

     
        </script>
  </body>
  </html>