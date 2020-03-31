<?php include 'elements/header.php';?>
	<div class="container">

		<div class="jumbotron" style="padding-top:15px; padding-bottom:15px; min-height:350px;">
			<div class="col-sm-10 col-sm-offset-1">
				<h2 class="text-center" id="submitMessageTitle">Submit your message</h2>
				<form action="" method"post" id="startMessageForm">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 text-right"><label id="labelName" for="inputName">Your Name *</label></div>
							<div class="col-sm-8">
								<input type="text" id="inputName" name="name" class="form-control" required="true"/>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 text-right"><label id="labelRecipient" for="labelRecipient">Your Recipient *</label></div>
							<div class="col-sm-8">
								<select id="inputRecipient" name="recipient" class="form-control" required="true">
								  <option value="">--Select your recipient--</option>
								  <option value="Dr. David Title">Dr. David Title</option>
								  <option value="Karen Parks" disabled>Karen Parks</option>
								  <option value="Ann Leffert" disabled>Ann Leffert</option>
								  <option value="Doreen Munsell" disabled>Doreen Munsell</option>
								  <option value="Andrea Leonardi" disabled>Andrea Leonardi</option>
								  <option value="Thomas Cullen" disabled>Thomas Cullen</option>
								  <option value="Mike Cummings" disabled>Mike Cummings</option>							  
								  <option value="Dr. Margaret Boice" disabled>Dr. Margaret Boice</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4 text-center">
							<button type="submit" name="nameSubmit" onclick="triggerLoading(); return false;" id="recordButton" class="btn btn-primary btn-block disabled" disabled="disabled">
							<span class="glyphicon glyphicon-record"></span> Click here to Record your Message</button>
						</div>
					</div>
				</form>
			</div>
			<div>
				<div class="clearfix"></div>
				<p class="text-center">
					<em>Note: Be sure to speak clearly into your computer, the recording will start as soon as you click the button.<br/>We have limited the recording to 10 seconds.</em>
				</p>
				<div class="alert alert-info text-center" id="messageDialog" role="alert" style="font-size:18px;">
					<span>You have <b id="message-time" style="font-size:22px;">10</b> Seconds Remaining on your message</span>	
				</div>
				
			    <div id="siriLoading">
					<?php include 'elements/siriLoading.php';?>
			    </div>
			</div>
		</div><!--END .jumbotron-->
	</div><!--END .container-->
	
	<?php include 'elements/footer.php';?>
    <script>
		$(document).ready(function() {
		    $('#startMessageForm').formValidation({
		        framework: 'bootstrap',
		        icon: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		            name: {
			            row: '.col-xs-8',
		                validators: {
		                    notEmpty: {
		                        message: 'Your name is required'
		                    },
		                    stringLength: {
		                        min: 3,
		                        message: 'Your name must be more than 3 characters long'
		                    },
		                    regexp: {
		                        regexp: /^[a-zA-Z0-9 -]+$/,
		                        message: 'Your name can only consist of alphabetical, number, and spaces'
		                    }
		                }
		            },
		            recipient: {
		                validators: {
		                    notEmpty: {
		                        message: 'Recipient is required'
		                    }
		                }
		            }
		        }
		    });
		});
	    
	    
		var $siri_ios9 = document.getElementById('container-ios9');
		var SW9 = new SiriWave9({
			width: 259,
			height: 40,
			speed: 0.2,
			amplitude: 1,
			container: $siri_ios9,
			autostart: true,
		});
		
		function triggerLoading(){
			$("#submitMessageTitle").hide();
			$(".fv-icon-no-label").hide();
			$(".glyphicon-ok").hide();
			$("#messageDialog").show();
			$("#siriLoading").show();
			$("#labelName").hide();
			$("#inputName").hide();
			$("#labelRecipient").hide();
			$("#inputRecipient").hide();
			$("#recordButton").hide();

			
			/*Store Values in Session*/
			var inputName = document.getElementById("inputName");
			sessionStorage.setItem("personName", inputName.value);	
			
			var inputRecipient = document.getElementById("inputRecipient");
			
			if (inputRecipient.value == ""){
				var recpientVal = "Dr. David Title";
			}else{
				var recpientVal = inputRecipient.value;
			}
			sessionStorage.setItem("recipientName", recpientVal);	
		
		    window.setInterval(function() {
		        var timeCounter = $("b[id=message-time]").html();
		        var updateTime = eval(timeCounter)- eval(1);
		        $("b[id=message-time]").html(updateTime);
		        if(updateTime == 0){
		            window.location.replace("http://sites.fairfieldschools.org/voiceToWeb/message.php");
		        }
		    }, 1000);
		   
		}
	</script>
  </body>
</html>