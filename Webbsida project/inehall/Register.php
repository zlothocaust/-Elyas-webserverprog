<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign-Up</title>

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



</head>
  <body >
    <div id="particles-js">
      <div id="menu">

      <li><a href="index.html">Hem</a></li>
      <li><a href="tjänster.html">Tjänster och priser</a></li>
      <li><a href="Post.php">Forum</a></li>
        <li><a href="login.php">Logga in</a></li>
            <li><a href="About.html">Om oss</a></li>

      </div>
<div style="position: absolute; left: 30%;" >
  <fieldset style="width:30%"><legend>Registration Form</legend>
<table border="0">
  <tr>
<form method="POST" action="Register.php">

</tr>
<tr>
<td>Email</td><td> <input type="text" name="email" required></td>
</tr>
<tr>
<td>UserName</td><td> <input type="text" name="user" required></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass" required ></td>
</tr>
<tr>
<td><input id="button" type="submit" name="register" value="Send" required></td>
</tr>

</form>

</table>

</fieldset>
</div>
</div>
<?php


if(isset($_POST['register'])){

  $username = $_POST['user'];
  $password = $_POST['pass'];
  $mail = $_POST['email'];

  $dbc= mysqli_connect("localhost","root","","forum");

  $query = "INSERT INTO users (username,password,mail) VALUES ('$username',PASSWORD('$password'),'$mail')";
  $result = mysqli_query($dbc,$query);

  if($result){
    echo "Du kan nu logga in nedan.";
  }
  else{
    echo "Något gick fel, vänligen försök igen.";
  }
  header("location:login.php");

}
?>





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

</body>

</html>
