<?php

    require_once ("../con.php");

    header("Content-type:text/html;charset=utf-8");
    $callBackData;


    if(mysqli_connect_errno()){
        echo mysqli_connect_errno();
        echo '404';
        exit;
    }else{
        //$Message=$_POST['message'];

        $str = file_get_contents('my.txt');//将整个文件内容读入到一个字符串中
        $str_encoding = mb_convert_encoding($str, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');//转换字符集（编码）
        $arr = explode("\n", $str_encoding);//转换成数组

//去除值中的空格
        foreach ($arr as &$rowmes) {
            $rowmes = trim($rowmes);
            echo '<br/>';
            $flag=false;
            $findKeyWord=$connect->query("SELECT * FROM expressPlace");
            if($findKeyWord){
                while ($row=mysqli_fetch_array($findKeyWord)){
                    $pos = strpos( $rowmes , $row['keyword']);
                    if($pos==true){
                        // echo '找到了';
                        $callBackData[0]=array(
                            "message"=>$Message,
                            "altitude"=>$row['altitude'],
                            "longitude"=>$row['longitude'],
                            "place"=>$row['place'],
                            "keyword"=>$row['keyword']
                        );
                        $flag=true;
                        echo 'YES'.$rowmes;
                        echo '<br/>';
                        break;
                    }
                }
                if($flag==false){
                    echo '404'.$rowmes;
                    echo '<br/>';
                }
            }
        }



        echo json_encode($callBackData);
    }


?>