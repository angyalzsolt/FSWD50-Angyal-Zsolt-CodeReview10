<?php
include("header.php");
include("navbar.php");
include("class.php");
 ?>
<h1>Add a new media</h1>

<form  method="post" name="mediaadd">
	<p>Title</p>
		<input type="text" name="title">
	<p>Author</p>
		<?php 
		$opt = new Media;
		$opt-> showAuth();
		?>
	<p>Publisher</p>
		<?php
		 $opt-> showPub();
		 ?>
	<p>Type</p>
		<?php
		 $opt-> showType();
		?>
	<p>Image</p>
		<?php
		 $opt-> showImage();
		  $opt->addMedia();	
		?>	

	<br><input type="submit" name="addmedia" value="Add a new file">		
</form>
	
	<a href="authorform.php"><button>Add a new author</button></a><br>
	<a href="pubform.php"><button>Add a new publisher</button></a><br>
	<a href="typeform.php"><button>Add a new type</button></a><br>
	<a href="imageform.php"><button>Add a new image</button></a>