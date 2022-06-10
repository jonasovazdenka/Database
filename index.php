<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "comics";
?>

<!DOCTYPE html>
<html>
  <body>
	<form method="post">

        <label for="NAME">Hero name:</label><br>
        <input type="text"  name="jmeno" value=""><br>

        <label for="ZBRAN">Hero weapon:</label><br>
        <input type="text" name="zbran" value=""><br><br>

        <label for="comics">Choose:</label>
        <select name="studio">
            <option value="1">DC Comics</option>
            <option value="2">Marvel Studios</option>
            <option value="3">The Walt Disney Studios</option>
        </select><br><br>

        <input type="submit" name="save" value="Potvrdit">
        <input type="reset">
	
	</form>
  </body>
</html>

<?php
try {
    $jmeno = $_POST['jmeno'];
    $zbran = $_POST['zbran'];
    $studio = $_POST['studio'];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO charact (name, weapon, studio_id)
    VALUES ('$jmeno', '$zbran','$studio')";

    $conn->exec($sql);
    
    }
	
catch(PDOException $e)
    {

    	echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>