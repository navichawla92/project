<html lang="en">
<head>
  <meta charset="utf-8">
  <title>droppable demo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <style>
  #draggable {
    width: 100px;
    height: 100px;
    background: #ccc;
  }
  #droppable {
    position: absolute;
    left: 250px;
    top: 0;
    width: 125px;
    height: 125px;
    background: #999;
    color: #fff;
    padding: 10px;
  }
  </style>
  <script type="text/javascript"src="http://prototypejs.org/assets/2008/1/25/prototype-1.5.1.2.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
</head>
<body>
 
<div id="droppable">Drop here</div>
<div id="draggable">Drag me</div>
 
<script>
$( "#draggable" ).draggable();
$( "#droppable" ).droppable({
  drop: function() {
    alert( "dropped" );
  }
});
</script>
 
</body>
</html>
