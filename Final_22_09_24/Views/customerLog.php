<?php
    session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
  <form action="../Controllers/logController.php">
  <center>
    <h1>Customer Login</h1><br><br><br>
    <font size="+2">ID: <input type="text" name="id" style="font-size:14pt;"><br><br></font>
    <font size="+2">Name: <input type="text" name="name" style="font-size:14pt;"><br><br></font>
    <font size="+2">Pass: <input type="password" name="pass" style="font-size:14pt;"><br><br></font><br>
    <button style="width: 100px; height: 30px;" name="cusLogin"><font size="+1">Login</font></button><br><br>
    
    
  <font size="+2" color="red">
  <?php
    if (isset($_SESSION['error']))
    {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    }
  ?>
  </font>
  </center>
  </form>
</body>
</html>