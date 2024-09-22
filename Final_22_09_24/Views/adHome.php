<?php
    session_start();
    require_once('../Models/alldb.php');
    $res= data1();
    // $id= $_GET['id'];
    // $res= edit($id);
    if (empty($_SESSION['name']))
    {
      header('location:../Views/customerLog.php');
    }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
</head>
<body>
  <form action="../Controllers/logController.php">
  <center>
  <font size="+2">This is admin home page</font><br><br>  
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
        <td><?php echo $r['Offer']; ?></td>
        

        <td><button name="accept" value="<?php echo $r['Name']; ?>">Accept</button>
        <button name="reject" value="<?php echo $r['Name']; ?>">Reject</button></td>
      </tr>
    <?php } ?>
    </table>
    </font>
    <br>
    <button style="width: 100px; height: 30px;" name="logout"><font size="+1">Logout</font></button><br><br>
    <?php
    if (isset($_SESSION['message']))
    {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
  ?>
  </center>
  </form>
  
</body>
</html>