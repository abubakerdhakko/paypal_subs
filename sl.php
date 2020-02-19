<html>

<head></head>

<body>
  <div id="slider"></div>

  <script>
    $(function() {
          $('#slider').slider({
                min: 0,
                max: 1000,
                value: 100,
                slide: function(ev, ui) {

                    var total = ui.value;
                    if (total < 100) { //This will set the slider to 100 again if user will slide it less than 100 
                      $("#slider").slider('value',100); $("#slider").trigger('change'); return false; } $('#slider').not(this).each(function () { total +=$(this).slider('value'); }); $( ".order" ).html(total); } }); }); 
  </script>
</body>

</html>