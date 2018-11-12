<?php 

class Media {
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "cr10_zsolt_angyal_biglibrary";


	function showAuth(){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		$sql = "SELECT * FROM author";
		$result = mysqli_query($conn, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        echo "<select class='custom-select my-1 mr-sm-2' name='author'>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['author_id']."'>".$row['name']."</option>";
	}
		echo "</select>";
	}

	function showPub(){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		$sql1 = "SELECT * FROM publisher";
		$result = mysqli_query($conn, $sql1);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        echo "<select class='custom-select my-1 mr-sm-2' name='publisher'>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['publisher_id']."'>".$row['publisher_name']."</option>";
	}
		echo "</select>";
		mysqli_close($conn);
	}



	function showType(){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		$sql1 = "SELECT * FROM type";
		$result = mysqli_query($conn, $sql1);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        echo "<select class='custom-select my-1 mr-sm-2' name='type'>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['type_id']."'>".$row['type_name']."</option>";
	}
		echo "</select>";
		mysqli_close($conn);
	}

	function showImage(){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		$sql1 = "SELECT * FROM image";
		$result = mysqli_query($conn, $sql1);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        echo "<select class='custom-select my-1 mr-sm-2' name='image'>";
            foreach ($rows as $row) { 
            	echo "<option value='".$row['image_id']."'>".$row['image_url']."</option>";
	}
		echo "</select>";
		mysqli_close($conn);
	}



	function addAuth(){
		if(isset($_POST['addauth'])){
			$name = $_POST['authname'];
			if($name == ""){
				echo "Elbasztad";
			}else{
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

				$sql1 = "SELECT name FROM author WHERE name = '$name'";
				$s = mysqli_query($conn, $sql1);
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "Ezt már írtad...";
				}else{
					$sql = "INSERT INTO `author` (`name`) VALUES ('$name')";
					if(mysqli_query($conn, $sql)){
						echo "Success!!!!!";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}	
		}
	}


	function addPub(){
		if(isset($_POST['addpub'])){
			$name = $_POST['pubhname'];
			if($name == ""){
				echo "Elbasztad";
			}else{
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

				$sql1 = "SELECT publisher_name FROM publisher WHERE publisher_name = '$name'";
				$s = mysqli_query($conn, $sql1);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "Ezt már írtad...";
				}else {
					$sql = "INSERT INTO `publisher` (`publisher_name`) VALUES ('$name')";
					if(mysqli_query($conn, $sql)){
						echo "Success!!!!!";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}
		}
	}

	function addType(){
		
		if(isset($_POST['addtype'])){
			$name = $_POST['typename'];
			if($name == ""){
				echo "Elbasztad";
			}else{
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				$sql1 = "SELECT type_name FROM type WHERE type_name = '$name'";
				$s = mysqli_query($conn, $sql1);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "Ezt már írtad...";
				}else {
					$sql = "INSERT INTO `type` (`type_name`) VALUES ('$name')";
					if(mysqli_query($conn, $sql)){
						echo "Success!!!!!";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}	
		}
	}

	function addMedia() {
		if(isset($_POST['addmedia'])){
			$title = $_POST['title'];
			$author =$_POST['author'];
			$publisher = $_POST['publisher'];
			$type = $_POST['type'];
			$image = $_POST['image'];
			if($title == "" || $author == "" || $publisher == "" || $type == "" || $image == ""){
				echo "Elbasztad";
			}else{
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				$sql1 = "SELECT title FROM media WHERE title = '$title'";
				$s = mysqli_query($conn, $sql1);
				if(!$s){
					echo "szar:".mysqli_error($conn);
				}
				$same = $s->fetch_all(MYSQLI_ASSOC);
				$samelong = count($same);

				if($samelong > 0){
					echo "Ezt már írtad...";
				}else {
					$sql = "INSERT INTO media(`title`, `fk_author_id`, `fk_publisher_id`, `fk_type_id`, `fk_image_id`) VALUES ('$title', '$author', '$publisher', '$type', '$image')";

					if(mysqli_query($conn, $sql)){
						echo "Success!!!!!";
					} else {
						echo "Error: ".mysqli_error($conn)."<br>";
					}
				}
			}
		}
	}


	function addImage(){
		if(isset($_POST['addimage'])){
			$name = $_POST['imagename'];
			if($name == ""){
				echo "Elbasztad";
			}else{
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
				$sql = "INSERT INTO `image` (`image_url`) VALUES ('$name')";
				if(mysqli_query($conn, $sql)){
					echo "Success!!!!!";
				} else {
					echo "Error: ".mysqli_error($conn)."<br>";
				}
			}
		}
	}





	function showContent(){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		$sql = "SELECT media.title, author.name, publisher.publisher_name, type.type_name, media.media_id, image.image_url ";
		$sql .= "FROM media ";
		$sql .= "JOIN author ON media.fk_author_id = author.author_id ";
		$sql .= "JOIN type ON media.fk_author_id = type.type_id ";
		$sql .= "JOIN publisher ON media.fk_publisher_id = publisher.publisher_id ";
		$sql .= "JOIN image ON media.fk_image_id = image.image_id";

		$result = mysqli_query($conn, $sql);
          $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) { 
            	echo "<p>".$row['title']."</p><form method='post'action=''><input type='submit' name='delete' value='Delete'><input type='hidden' name='counter' value='".$row['media_id']."'></form><hr>";
            }
	}

	function get_post($conn, $var){
			return  mysqli_real_escape_string($conn, $_POST[$var]);
		}



	function deleteItem(){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		$sql = "SELECT media_id FROM media";
		$result = mysqli_query($conn, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        if(isset($_POST['delete'])){
				//$mycount = $_POST['mycounter'];
				//echo $mycount;
				$counting = $this->get_post($conn, 'counter');
				echo "<h1>$counting</h1>";
				$sql1 = "DELETE FROM media WHERE media_id = '$counting'";
				$result2 = $conn->query($sql1);
				echo "<meta http-equiv='refresh' content='0'>";
		}
	}
}


 ?>

