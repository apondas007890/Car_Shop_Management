<?php
    session_start();
    require_once('../Models/alldb.php');
    $res= data();
    if (empty($_SESSION['name']))
    {
      header('location:../Views/customerLog.php');
    }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Home</title>
</head>
<body>
  <form action="../Controllers/logController.php">
  <center>
  <font size="+2">This is customer home page</font><br><br>  
  <h1>Welcome <?php echo $_SESSION['name']; ?> </h1><br><br>
    
    <font size="+2">
    <table border="1">
      <tr>
        <th>Car Name</th>
         <th>Expected Price</th>
         <th>Offer Price</th>
         <th>Action</th>
      </tr>
    <?php while ($r=$res->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $r['Name']; ?></td>
        <td><?php echo $r['Price']; ?></td>
        
        <td><input type="text" name="offer[<?php echo $r['Name']; ?>]" style="font-size:14pt;"></td>

        <td><button name="request" value="<?php echo $r['Name']; ?>">Request</button></td>
      </tr>
    <?php } ?>
    </table>
    </font>
    <br>
    <button style="width: 100px; height: 30px;" name="logout"><font size="+1">Logout</font></button><br><br>
    <?php
    if (isset($_SESSION['request']))
    {
      echo $_SESSION['request'];
      unset($_SESSION['request']);
    }
  ?>
  </center>
  </form>
  
</body>
</html>