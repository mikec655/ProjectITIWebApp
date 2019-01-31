<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>change demo</title>
  <style>
  #menu {
    color: black;
  }
  </style>
  <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
</head>
<body>
 
<select name="sweets" multiple="multiple">
  <option>Chocolate</option>
  <!-- <option selected="selected">Candy</option> -->
  <option>Taffy</option>
  <!-- <option selected="selected">Caramel</option> -->
  <option>Fudge</option>
  <option>Cookie</option>
</select>
<div id="menu"></div>

<input type="hidden" name="extra" value="Content of the extra variable" >
 
<script>
$( "select" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( "#menu" ).text( str );
    $document.myform.extra.value = "some value";
  })
  .change();
</script>
 
</body>
</html>