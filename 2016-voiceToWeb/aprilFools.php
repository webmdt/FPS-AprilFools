<style>
#headerContainer
{display:none;}	
</style>
<?php include 'elements/header.php';?>

	<div class="container">
		<div class="hidden-xs"><br/><br/><br/><br/><br/><br/></div>
		<h1 class="text-center" style="color:#FFFFFF; font-size:100px;">APRIL FOOLS</h1>
		<h1 class="text-center" style="color:#FFFFFF;">I PITY YOU <span id="personNameField"></span></h1>
		  <iframe style="display:none;" width="420" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0&amp;controls=0&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
		  <!--<img src="assets/img/MrT-Blank.png" width="80%" class="center-block text-center img-responsive" alt="MrT-Blank" width="" height="" />-->
	</div><!--END .container-->
	<script>
		document.body.style.backgroundImage = "url('assets/img/MrT-Blank.png')";
		document.body.style.backgroundSize = "85%";
		document.body.style.backgroundPosition = "top center";
		document.body.style.backgroundRepeat = "no-repeat";
		document.body.style.backgroundColor = "black";
		document.getElementById("personNameField").innerHTML = sessionStorage.getItem("personName");
	</script>
  </body>
</html>