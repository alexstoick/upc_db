<!DOCTYPE html>
<html>
<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("input#autocomplete").autocomplete({
    source: ["c++", "java", "php", "coldfusion", "javascript", "asp", "ruby"]
});
  });
  function goToNext() {
	  alert ( "works" ) ;
  }
  </script>
</head>
<body style="font-size:62.5%;">
<form onSubmit="goToNext()">
<input id="autocomplete"   onChange="goToNext()" />
</form>
</body>
</html>