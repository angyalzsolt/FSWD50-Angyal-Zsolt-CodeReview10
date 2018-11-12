<?php
include("header.php");
include("navbar.php");
include("class.php");
$z = new Media();
$z-> addImage();
?>

<h1>Add a new image</h1>

<form  method="post">
	<p>Image url</p>
		<input type="text" name="imagename">
	 <input type="submit" name="addimage" value="add">
</form>
<a href="mediaform.php"><button>Back</button></a>