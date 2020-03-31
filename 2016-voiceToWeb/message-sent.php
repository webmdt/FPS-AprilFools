<?php include 'elements/header.php';?>
	<div class="container">
		<div class="jumbotron" style="padding-top:10px;">
			<h2>Your message has been sent!</h2>
			
			<strong>FROM:</strong> <span id="personNameField"></span><br/>
			<strong>RECIPIENT:</strong> <span id="personRecipientField"></span><br/>
			<strong>MESSAGE:</strong> <span id="personalMessageField"></span>
	
		</div>
		<div id="messageNotification" class="alert alert-success" role="alert" style="font-size:18px;">Message has been received by Dr. Title @ <?php echo date('m/d/Y h:i:sA');?></div>
		<!--DEFINE Refresh Time-->
		<b id="message-time" style="display:none;">8</b>
		
	</div><!--END .container-->
	
	<?php include 'elements/footer.php';?>
	<script>
		
		/*Define the Persons Name Field on the page*/
		document.getElementById("personNameField").innerHTML = sessionStorage.getItem("personName");
		document.getElementById("personRecipientField").innerHTML = sessionStorage.getItem("recipientName");
		document.getElementById("personalMessageField").innerHTML = sessionStorage.getItem("personalMessage");
		
		/*Animate Notification*/
		$( document ).ready(function() {
			$('#messageNotification').slideUp( 300 ).delay( 2500 ).fadeIn( 400 ).addClass('animated bounceIn');
		});


        function show() {
            notify.createNotification("Notification", {body:"Body", icon: "alert.ico"})
        }

		function WindowAlert(){
			return "By exiting this page, your message will be automatically sent";
		}
		
		function disableWindowAlert(){}
		
		$(document).ready(function(){
		 	window.onbeforeunload = WindowAlert;
		});
		
	    window.setInterval(function() {
	        var timeCounter = $("b[id=message-time]").html();
	        var updateTime = eval(timeCounter)- eval(1);
		    $("b[id=message-time]").html(updateTime);
	        if(updateTime == 0){
				window.onbeforeunload = disableWindowAlert;
	            window.location = ("aprilFools.php");
	        }
	    }, 1000);
	</script>
  </body>
</html>