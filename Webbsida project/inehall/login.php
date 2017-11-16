<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" media="screen" href="css/style.css">
<style>
#menu {

    list-style-type: none;
    margin: 0;
    padding: 0;
    position: absolute;
    right: 50px;

  }

</style>

  <title>Login</title>

</head>
  <body>




    <div id="particles-js">
      <div id="menu">

      <li><a href="index.html">Hem</a></li>
      <li><a href="tjänster.html">Tjänster och priser</a></li>
      <li><a href="Post.php">Forum</a></li>
          <li><a href="Register.php">Registrera dig</a></li>
            <li><a href="About.html">Om oss</a></li>

      </div>
<div style="position: absolute; left: 30%;" id="Sign-Up">
  <fieldset style="width:30%"><legend>Login</legend>
<table border="0">
  <tr>
<form method="POST" action="Login.php">

</tr>
<tr>
<td>UserName</td><td> <input type="text" name="user"></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass"></td>
</tr>
<tr>

<td><input id="button" type="submit" name="login" value="Login"></td>
</tr>


</form>
<form method="REGISTER" action="Register.php">

<tr>
	<td><input id="button" type="submit" name="register" value="Register"> </td>
</tr>
</form>

</table>

</fieldset>




</div>

</div>
</body>
<script src="../particles.js"></script>
<script src="js/app.js"></script>


<script src="js/lib/stats.js"></script>
<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>


</html>



<?php

session_start();


if(isset($_POST['user']) && isset($_POST['pass'])){


		$username = $_POST['user'];
		$password = $_POST['pass'];
		$dbc= mysqli_connect("localhost","root","","forum");

		$query = "SELECT * FROM users WHERE username='$username' AND password = PASSWORD('$password');";

		$result = mysqli_query($dbc,$query);

		if($row=mysqli_fetch_array($result)){

			$_SESSION['login'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $row['id'];
			header("Location:index.html");


		}
		else{
			echo "Något gick fel, vänligen försök igen.";
		}





}

?>
