<?php 
include("header.php");
include("navbar.php");
include("class.php");

 ?>
<div class="container-fluid">
	

 <h1>This is the contenct of the page</h1>
 <?php 
 $v = new Media;
 $v->showContent();
 $v->deleteItem();
 ?>
</div>