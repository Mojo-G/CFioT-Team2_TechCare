<?php 
	include ('security.php');
    include ('include/header.php');
    include ('include/navbar.php');
    include ('include/slider.php');
    include ('include/modals.php');
    include_once ('dbconfig.php');
?>
<html>
<head>
	<title>
	</title>

<!-- JS, Popper.js, and jQuery -->
<script src="js/jquery-3.5.1.slim.min.js"></script>



<body>
	<div class="container">
		<div id="link_wrapper">

		</div>
	</div>
</body>
</html>


<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "stream.php", true);
  xhttp.send();
}
setInterval(function(){
	loadXMLDoc();
	// 1sec
},1000);

window.onload = loadXMLDoc;
</script>

<?php 
include ("include/footer.php");
?>