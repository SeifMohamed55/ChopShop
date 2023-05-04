<!DOCTYPE html>
<html>
<body>
<style>
.error {color: #FF0000;}

.button {
  border: black;
  color: black;
  
}

</style>
  <?php
   $name = "";

   
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = validate($_POST["fname"]);
}
  function validate($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($name == "")
    $nmerror = "* This field is required";
  else if (strpos($name, "."))
    $nmerror = "cannot contain a dot (.)";
  else
    $nmerror = "";
  ?>
<form method="post" action="<?php
      echo htmlspecialchars($_SERVER['PHP_SELF']);
?>">
  Name: <input type="text" name="fname" value ="<?php echo $name; ?>"><span class = "error"> <?php echo $nmerror ?></span>
  <br><br>
  <input type="submit" value = "fuck" width="500" class = "button">
</form>
<h1>Input </h1>
<p>Your Name is : 
  <?php
  echo $name;?> 
</p>
<a href="lolo.php"> press meee mother </a>
</body>
</html>