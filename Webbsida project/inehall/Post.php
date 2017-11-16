<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <title>Forum</title>


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
<body>






<div id="particles-js">
  <div id="menu">

  <li><a href="index.html">Hem</a></li>
  <li><a href="tjänster.html">Tjänster och priser</a></li>
  <li><a href="Post.php">Forum</a></li>
    <li><a href="login.php">Logga in</a></li>
      <li><a href="Register.php">Registrera dig</a></li>
        <li><a href="About.html">Om oss</a></li>

  </div>
  <?php
  if(isset($_GET['topicid'])){
    ?>
  <a href="post.php" > <button id="button">Tillbaka</button> </a>
  <?php
}
  ?>
<div style="position: absolute; left: 30%; width:400px;" >
<fieldset style="width:30%"><legend>Posts</legend>
<table border="0">

  <?php

  session_start();
  $dbc= mysqli_connect("localhost","root","","forum");




  if(isset($_POST['createPost'])){

  $rubrik = $_POST['rubrik'];
  $text = $_POST['text'];
  $userid = $_SESSION['user_id'];


  $query = "INSERT INTO topics (name,user_id) VALUES ('$rubrik',$userid)";

  $result = mysqli_query($dbc,$query);

  $query = "INSERT INTO posts (user_id,topic_id,content) VALUES ($userid,(SELECT max(id) FROM topics),'$text')";

  $result = mysqli_query($dbc,$query);



  if($result){
    echo "Din post har lagts in<br>";
  }
  else{
    echo "Något gick fel, vänligen försök igen.<br>";
  }


  }
  else if(isset($_POST['reply'])){

  $topicid = $_POST['topicid'];
  $text = $_POST['text'];
  $userid = $_SESSION['user_id'];


  $query = "INSERT INTO posts (user_id,topic_id,content) VALUES ($userid,$topicid,'$text')";

  $result = mysqli_query($dbc,$query);



  if($result){
    echo "Ditt svar har lagts in<br>";
  }
  else{
    echo "Något gick fel, vänligen försök igen.<br>";
  }


  }



  if(isset($_GET['topicid'])){
    $topicid = $_GET['topicid'];
    $query = "SELECT content ,username FROM posts JOIN users ON users.id = posts.user_id WHERE posts.topic_id = $topicid";

    $result = mysqli_query($dbc,$query);

    while($row = mysqli_fetch_array($result)){
      $username = $row['username'];
      $text = $row['content'];

      echo " $username : $text <br>";

    }

  }
  else{
  $query = "SELECT topics.id AS id,username,name FROM topics JOIN users WHERE topics.user_id=users.id";

  $result = mysqli_query($dbc,$query);

  while($row = mysqli_fetch_array($result)){
    $username = $row['username'];
    $rubrik = $row['name'];
    $id = $row['id'];

  	echo "<a href='post.php?topicid=$id'>   $username : $rubrik </a><br>";

  }
}
  ?>

  </div>


</table>

</fieldset>

<?php
if(isset($_GET['topicid'])){
?>
<form method="POST">
<input type="hidden" name="topicid" value="<?php echo $topicid; ?>" required/><br>
<input type="text" name="text" required/><br>
<input type="submit" name="reply" />



<?php
}
else{

?>
<form method="POST">
<td> Title</td> <td><input type="text" name="rubrik" required/> </td><br>
<td> Text</td> <td><input type="text" name="text" required/> </td><br>
<input type="submit" name="createPost" />


  <?php
}

 ?>

 </form>

</div>


  </div>



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



  <?php
  if(isset($_GET['topicid'])){
    ?>
  <a href="post.php" > <button id="button">Tillbaka</button> </a>
  <?php
}





  if(isset($_POST['createPost'])){

  $rubrik = $_POST['rubrik'];
  $text = $_POST['text'];
  $userid = $_SESSION['user_id'];


  $query = "INSERT INTO topics (name,user_id) VALUES ('$rubrik',$userid)";

  $result = mysqli_query($dbc,$query);

  $query = "INSERT INTO posts (user_id,topic_id,content) VALUES ($userid,(SELECT max(id) FROM topics),'$text')";

  $result = mysqli_query($dbc,$query);



  if($result){
    echo "Din post har lagts in<br>";
  }
  else{
    echo "Något gick fel, vänligen försök igen.<br>";
  }


  }
  else if(isset($_POST['reply'])){

  $topicid = $_POST['topicid'];
  $text = $_POST['text'];
  $userid = $_SESSION['user_id'];


  $query = "INSERT INTO posts (user_id,topic_id,content) VALUES ($userid,$topicid,'$text')";

  $result = mysqli_query($dbc,$query);



  if($result){
    echo "Ditt svar har lagts in<br>";
  }
  else{
    echo "Något gick fel, vänligen försök igen.<br>";
  }


  }



  if(isset($_GET['topicid'])){
    $topicid = $_GET['topicid'];
    $query = "SELECT content ,username FROM posts JOIN users ON users.id = posts.user_id WHERE posts.topic_id = $topicid";

    $result = mysqli_query($dbc,$query);

    while($row = mysqli_fetch_array($result)){
      $username = $row['username'];
      $text = $row['content'];

      echo " $username : $text <br>";

    }

  }
  else{
  $query = "SELECT topics.id AS id,username,name FROM topics JOIN users WHERE topics.user_id=users.id";

  $result = mysqli_query($dbc,$query);

  while($row = mysqli_fetch_array($result)){
    $username = $row['username'];
    $rubrik = $row['name'];
    $id = $row['id'];

  	echo "<a href='post.php?topicid=$id'>   $username : $rubrik </a><br>";

  }
}
  ?>





</div>

</body>

</html>
