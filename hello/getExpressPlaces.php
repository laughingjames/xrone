<?php

require_once ("con.php");
$callBackData;

if(mysqli_connect_errno()){
    echo mysqli_connect_errno();
    exit;
}else{
   $n=0;
   $findKeyWord=$connect->query("SELECT * FROM expressPlace");
    if($findKeyWord){
        while ($row=mysqli_fetch_array($findKeyWord)){
                $callBackData[$n++]=array(
                    "altitude"=>$row['altitude'],
                    "longitude"=>$row['longitude'],
                    "place"=>$row['place'],
                    "keyword"=>$row['keyword'],
                    "content"=>$row['content']);
        }
    }
    echo json_encode($callBackData);
}
?>