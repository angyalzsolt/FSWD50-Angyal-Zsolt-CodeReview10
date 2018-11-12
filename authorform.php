<?php
include("header.php");
include("navbar.php");
 include("class.php");
 $x = new Media();
 $x-> addAuth();
?>

<h1>Add a new author</h1>

<form  method="post">
	<p>Name</p>
		<input type="text" name="authname">
	 <input type="submit" name="addauth" value="add">
</form>
<a href="mediaform.php"><button>Back</button></a>	