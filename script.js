// JavaScript Document
$(document).ready(function() {
	
	//First Level
	pic("adventurer");
	message("Welcome Hero! </br></br> Fate has chosen you to retrieve the Golden Turd from the clutches of Zanazi and return peace to your village.</br></br>Enter 'Leave Village' to start your journey!");
	enter();
	
	//Process levels
	$("#textInput").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			var tInput = $("#textInput").val().toLowerCase();
			var level = $("#levelNum").html();
			$('#textInput').val('');
			$.ajax({
				type: "POST",
				url: "process.php",
				dataType: "json",
				data: {action: tInput, level: level},
				cache: false,
				success: function(result){
					changeLevel(result.level);
					pic(result.pic);
					message(result.message);
					enter();					
				}
			});
		}
	});
});

//Load top picture
function pic(file){
	$('#pic').html("<img src=\"img/"+ file + ".png\"/>");
}

//Load message text
function message(text){
	/*$("#message").typed({
	strings: [text],
	typeSpeed: 0
	});*/;
	$('#message').html('');
	$('#message').html(text);
}

//Change Level
function changeLevel(level){
	if (level == "End"){
		$("#levelNum").html("");
		$('#textInput').attr("disabled", "disabled");
	}
	else if (level == "Nooooooooooo!"){
		$("#levelNum").html("Nooooooooooo!");
	}
	else{
		$("#levelNum").html("Level " + level);
	}
}

//Select Text Input
function enter(){
	$('#textInput').focus();
}