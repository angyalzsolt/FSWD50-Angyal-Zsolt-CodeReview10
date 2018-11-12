
<?php
include("header.php");
include("navbar.php");
 include("class.php");
 $y = new Media();
 $y-> addPub();
?>

<h1>Add a new publisher</h1>

<form  method="post">
	<p>Name</p>
		<input type="text" name="pubhname">
	 <input type="submit" name="addpub" value="add">
</form>
<a href="mediaform.php"><button>Back</button></a>