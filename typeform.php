

<?php
include("header.php");
include("navbar.php");
include("class.php");
$z = new Media();
$z-> addType();
?>

<h1>Add a new type</h1>

<form  method="post">
	<p>Name</p>
		<input type="text" name="typename">
	 <input type="submit" name="addtype" value="add">
</form>
<a href="mediaform.php"><button>Back</button></a>