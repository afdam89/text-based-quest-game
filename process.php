<?php

//Fetching Values from URL
$action=$_POST['action'];
$level=$_POST['level'];

//Set dead default
$dead = false;

//Level Processing
switch ($level) {
	
	case "Level One":
		//Level One Processing
		if ($action == "leave village"){
			//Success - Set up Level three
			$nextLevel = "Two";
			$message = "You have left the village. A few miles into your journey you find a chest on the side of the road, maybe there is something useful inside.";
			$pic = "chestclosed";
		}
		break;
	case "Level Two":
		//Level Two Processing
		if ($action == "open chest"){
			//Success - Set up Level Three
			$nextLevel = "Three";
			$message = "You have opened the chest and there is a sword inside, this could come in handy";
			$pic = "chestopen";
		}
		break;
	case "Level Three":
		//Level Three Processing
		if ($action == "take sword"){
			//Success - Set up Level Four
			$nextLevel = "Four";
			$message = "Great, you've got the sword. </br></br> To find Zanazi you must cross the river, but the bridge has collapsed...";
			$pic = "bridge";
		}
		break;
	case "Level Four":
		//Level Four Processing
		if ($action == "swim across the river"){
			//Success - Set up Level Five
			$nextLevel = "Five";
			$message = "You made it across the river but there are Dragons in your way, you must defeat them to continue on your journey...";
			$pic = "dragon";
		}
		break;
	case "Level Five":
		//Level Five Processing
		if ($action == "kill dragons with sword"){
			//Success - Set up Level Six
			$nextLevel = "Six";
			$message = "You have killed the dragons!</br></br>You continue walking and come across a cave entrance...";
			$pic = "cave";
		}else{
			//Die!
			$dead = true;
			$opponent = "Dragons";
			$death = "blasting you in the face with fire";
		}
		break;
	case "Level Six":
		//Level Six Processing
		if ($action == "enter cave"){
			//Success - Set up Level Seven
			$nextLevel = "Seven";
			$message = "You have entered the cave and are confronted by an evil wizard!</br></br> \"I am Zanazi, the most powerful wizard in the realm, prepare to die!";
			$pic = "zanazi";
		}
		break;
	case "Level Seven":
		//Level Six Processing
		if ($action == "kill zanazi with sword"){
			//Success - Set up Level Seven
			$nextLevel = "End";
			$message = "You killed Zanazi and retrieved the Golden Turd, saving your village from destruction!";
			$pic = "turd";
		}else{
			//Die!
			$dead = true;
			$opponent = "Zanazi";
			$death = "turding you to death";
		}
		break;
	case "Nooooooooooo!":
		//Level One Processing
		if ($action == "try again"){
			//Success - Start from beginning
			$nextLevel = "One";
			$message = "Welcome Hero! </br></br> Fate has chosen you to retrieve the Golden Turd from the clutches of Zanazi and return peace to your village.</br></br>Enter 'Leave Village' to start your journey!";
			$pic = "adventurer";
		}
    default:
        break;
}

if ($dead == true){
	$message = "You are dead! </br></br>".$opponent." killed you by ".$death."! </br> Enter 'Try Again' to start over.";
	$pic = "gameover";
	$nextLevel = "Nooooooooooo!";	
}

echo json_encode(array("level" => $nextLevel, "pic" => $pic, "message" => $message ));

?>