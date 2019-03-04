<!DOCTYPE html>
<html>
<head>
	<title>Upload Gallery</title>
	<link rel="stylesheet" href="includes/design.css">
</head>
<body>

		
	<h2>GALLERY</h2>
	<section class="container">
	<?php
		include_once 'includes/database.php';
		$sql="select * from productDetails order by orderGallery DESC;";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql))
		{
			header("location: index.php?q=index-sql-select-error");
		}
		else
		{
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			while($row=mysqli_fetch_assoc($result))
			{
				$image="img/".$row["imgName"];
				echo '<div class="item"><a href="">
					<img src='.$image.'>
					<p>Description: '.$row["description"].'</p>
					<p>Category: '.$row["category"].'</p>
					<p>Type: '.$row["type"].'</p>
					<p>Price: '.$row["price"].'</p>
					</a><div>';
					
			}
		}
		
	?>
	</section>

<footer>
			<div class="gallery-upload">
				<form action="galleryUpload.php" method="POST" enctype="multipart/form-data">
					<input type="text" name="filetitle" placeholder="file title ... ">
					<input type="text" name="description" placeholder="Image description ... ">
					<input type="text" name="category" placeholder="Category... ">
					<input type="text" name="type" placeholder="Type ... ">
					<input type="text" name="price" placeholder="price ... ">
					<input type="file" name="file" >
					<button type="submit" name="submit">upload</button>
				</form>
			</div>

</footer>

</body>
</html>