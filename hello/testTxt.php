<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/1
 * Time: 下午4:28
 */

$str = file_get_contents('my.txt');//将整个文件内容读入到一个字符串中
$str_encoding = mb_convert_encoding($str, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');//转换字符集（编码）
$arr = explode("\n", $str_encoding);//转换成数组

//去除值中的空格
foreach ($arr as &$row) {
    $row = trim($row);
    echo $row."g";
}

unset($row);

//得到后的数组
?>