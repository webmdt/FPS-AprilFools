function triggerLoading(){
	$("#siriLoading").show();
	$("#labelName").hide();
	$("#inputName").hide();
	$("#recordButton").hide();
	$("#recordMessage").show();
	
	var inputName = document.getElementById("inputName");
	sessionStorage.setItem("personName", inputName.value);	
	
	var settimmer = 0;

    window.setInterval(function() {
        var timeCounter = $("b[id=message-time]").html();
        var updateTime = eval(timeCounter)- eval(1);
        $("b[id=message-time]").html(updateTime);

        if(updateTime == 0){
            window.location.replace("http://sites.fairfieldschools.org/messageRecorder/message.php");
        }
    }, 1000);
   
}
function disableWindowAlert(){}