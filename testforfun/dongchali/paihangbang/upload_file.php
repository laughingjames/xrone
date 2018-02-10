<?php

$name=$_POST['name'];
$moto=$_POST['moto'];
$moto1=$_POST['submit'];
echo $name.$moto1;
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg")))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
		
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
		  
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/".$name. $_FILES["file"]["name"]);
      $url= "upload/".$name.$_FILES["file"]["name"];
	  echo $url;
      }
    }
  }
else
  {
  echo "你传入的不是图片文件";
  }

  mysql_connect('localhost','root','root');
		mysql_select_db('dongchali');
		
		mysql_query('set names utf8');
		$sql ="insert into info values(null,'$name','$moto','$url')";
		mysql_query($sql);
?>
