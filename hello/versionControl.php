<?php

    require_once ("con.php");
    if(mysqli_connect_errno()){
        echo mysqli_connect_errno();
        echo 'Could not connect to database.';
        exit;
    }else{
        $result=$connect->query("SELECT * FROM version ORDER BY id DESC LIMIT 1");
        while($row = mysqli_fetch_array($result)) {
            $array[0]=array(
              'versonCode' => $row['versionCode'],
               'content'=>$row['content'],
               'updateUrl'=>$row['updateUrl'],
               'versionName'=>$row['versionName']
            );
        }
        echo json_encode($array);
    }


?>