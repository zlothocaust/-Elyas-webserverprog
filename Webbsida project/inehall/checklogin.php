<?php

session_start();

if(isset($_SESSION['login'])){

	if($_SESSION['login'] == true){
		
	}
	else{
		header("Location:login.php");
	}


}
else{
	header("Location:login.php");
}

?>
