<?php

    require_once ("../con.php");

    header("Content-type:text/html;charset=utf-8");



    if(mysqli_connect_errno()){
        echo mysqli_connect_errno();
        echo '404';
        exit;
    }else{

        $Messages=$connect->query("SELECT *FROM express ORDER BY id DESC");

        if($Messages){
            while ($rowOfMessage=mysqli_fetch_array($Messages)){
                $flag=false;
                $messageString=filterOfString($rowOfMessage['mes']);

                    $findKeyWord=$connect->query("SELECT * FROM expressPlace");
                    if($findKeyWord){

                        while ($row=mysqli_fetch_array($findKeyWord)){
                            $keyArray=getkeyArray($row['keyword']);
                            for($i=0;$i<count($keyArray);$i++){
                              $pos = strpos( $messageString , $keyArray[$i]);
                              if($pos==true){
                                    $flag=true;
                                  break 2;
                                }
                            }

                        }
                        if($flag==false){
                            echo 'NO '.$messageString.'</br>';
                        }else{
                            //echo 'YES '.$messageString.'</br>';
                        }

                    }
                }

        }
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