<?php

    require_once ("con.php");
    require_once ('response.php');
    header("Content-type:text/html;charset=utf-8");


    if(mysqli_connect_errno()){
        echo mysqli_connect_errno();
        echo '404';
        exit;
    }else{
    $callBackData;


    $rowOfMessage=$_POST['message'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $sql ="insert into express values(null,'$rowOfMessage','$ip',null)";
    $connect->query($sql);
    $flag=false;

    $messageString=filterOfString($rowOfMessage);

    $findKeyWord=$connect->query("SELECT * FROM expressPlace");
    if($findKeyWord){

        while ($row=mysqli_fetch_array($findKeyWord)){
            $keyArray=getkeyArray($row['keyword']);
            for($i=0;$i<count($keyArray);$i++){
                $pos = strpos( $messageString , $keyArray[$i]);
                if($pos==true){
                    $callBackData[0]=array(
                        "message"=>$rowOfMessage,
                        "altitude"=>$row['altitude'],
                        "longitude"=>$row['longitude'],
                        "place"=>$row['place'],
                        "keyword"=>$row['keyword']
                    );
                    $flag=true;
                    break 2;
                }
            }

        }
        if($flag==false){
            echo 'NOTFIND';
        }
    }
        Response::show(200,"success",$callBackData);
      //  echo json_encode();
}


    function getkeyArray($keywords){
        return explode(",", $keywords);

    }
    function filterOfString($Message){
        $Message=preg_replace('# #','',$Message);
        $Message=strtoupper($Message);
        return $Message;
    }


?>
