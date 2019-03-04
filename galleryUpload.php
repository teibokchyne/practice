<?php

if(isset($_POST['submit']))
{

	if(empty($_POST['filetitle']) || empty($_POST['description']) || empty($_POST['category']) || empty($_POST['type']) || empty($_POST['price']))
	{
		header("Location: index.php?q=please-fill-all-parts-of-upload-form");
	}

	else
	{
		$filename=$_POST['filetitle'];
		$filename=strtolower( str_replace(" ","-",$filename));

		$filetitle=$_POST['filetitle'];
		$description=$_POST['description'];;
		$category=$_POST['category'];;
		$type=$_POST['type'];;
		$price=$_POST['price'];;

		$file=$_FILES['file'];

		$name=$file['name'];
		$fileType=$file['type'];
		$error=$file['error'];
		$tmp_name=$file['tmp_name'];
		$size=$file['size'];

		$fExt=explode(".",$name);
		$fAExt=strtolower(end($fExt));
		$allow=array("png","jpg","jpeg");

		if(in_array($fAExt,$allow))
		{
			if($error===0)
			{
				if($size<200000)
				{
					$imgName=$filename.uniqid("",true).".".$fAExt;
					$imgDest="img/".$imgName;
					include_once 'includes/database.php';
					$sql="select id from productDetails;";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql))
					{
						header("Location: index.php?q=sql-select-error");
					}
					else
					{
						mysqli_stmt_execute($stmt);
						$result=mysqli_stmt_get_result($stmt);
						$noOfRows=mysqli_num_rows($result);
						$noOfRows=$noOfRows+1;
						$sql="insert into productDetails (category,type,price,imgName,description,orderGallery) values (?,?,?,?,?,?); ";
						if(!mysqli_stmt_prepare($stmt,$sql))
						{
							header("Location: index.php?q=sql-insert-error");
						}
						else
						{
							mysqli_stmt_bind_param($stmt,"ssissi",$category,$type,$price,$imgName,$description,$noOfRows);
							mysqli_stmt_execute($stmt);
							if(!move_uploaded_file($tmp_name,$imgDest))
							{
								header("Location: index.php?q=move-uploaded-file-error");
							}
							else
							{
								header("Location: index.php?q=upload_success");
							}
						}
					}
				}
				else
				{
					header("Location: index.php?q=file-is-too-large");
				}
			}
			else
			{
				header("Location: index.php?q=there-was-error-uploading-file");
			}
		}
		else
		{
			header("Location: index.php?q=this-file-type-iz-not-allowed");
		}
	}
}

?>