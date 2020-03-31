<?php

include 'elements/header.php';
include 'elements/messages.php';

$personalMessage = get_message();
?>
	<div class="container">

      <h2>Thank you for submitting your message:</h2>
      
      <blockquote style="font-size:20px;"><span style="font-weight:bold; font-size:30px;">"</span>  <?php echo $personalMessage;?>  <span style="font-weight:bold; font-size:30px;">"</span></blockquote>

	  <strong>RECIPIENT:</strong> <span id="personRecipientField"></span>
	  <strong>FROM:</strong> <span id="personNameField"></span>

	  <br/><br/><strong><em>If you would like to cancel this message, click below. Otherwise the message will be delivered <u>automatically</u>.</em></strong><br/><br/>
	  <a href="#" class="btn btn-danger btn-lg" id="cancelButton">Click to Cancel - You have <b id="show-time">12</b> Seconds</a>

	</div><!--END .container-->
	
	<?php include 'elements/footer.php';?>
	<script>
		/*Pulling down the Stored Values*/
		document.getElementById("personNameField").innerHTML = sessionStorage.getItem("personName");
		document.getElementById("personRecipientField").innerHTML = sessionStorage.getItem("recipientName");
		
		/*Storing Message in the Cookies*/
		sessionStorage.setItem("personalMessage", "<?php echo $personalMessage;?>");	

		function WindowAlert(){
			return "By exiting this page, your message will be automatically sent";
		}
		
		function disableWindowAlert(){}
		
		$(document).ready(function(){
		 	window.onbeforeunload = WindowAlert;
		});
		
		var settimmer = 0;
        $(function(){
            window.setInterval(function() {
                var timeCounter = $("b[id=show-time]").html();
                var updateTime = eval(timeCounter)- eval(1);
                $("b[id=show-time]").html(updateTime);

                if(updateTime <= 0){
					window.onbeforeunload = disableWindowAlert;
                    window.location = ("message-sent.php");
                }
            }, 1000);
        });
	</script>
  </body>
</html>