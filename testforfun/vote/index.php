
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vote</title>
    <style>
        body{
            font-family: "Trebuchet MS",Verdana;width: 350px;
        }
        ul{
            list-style: none;
        }
    </style>
</head>
<body>
<?php
    if(isset($_POST['vote'])){
        if(isset($_COOKIE['voted'])){
            $message='you have voted already';
        }else{
            $message='voted successful';
            $dom=new DOMDocument();
            $dom->load('browser.xml');
            $xpath=new DOMXPath();
            $browsers=$xpath->query('//browser');
            foreach ($browsers as $browser){
                $value=$browser->getAttribute('value');
                if($_POST['browser']==$value){
                    $votes=$browsers->getAttribute('votes');
                    $browsers->setAttribute('votes',++$votes);
                    setcookie("voted",true,time()+(1*60*60));
                    break;
                }
            }
            $dom->save('browser.xml');
        }
    }
?>
    <form method="post">
        <fieldset>
            <legend>Which is favorite browser?</legend>
            <ul>
            <?php
                $dom=new DOMDocument();
                $dom->load('browser.xml');
                $xpath=new DOMXPath($dom);
                $browsers=$xpath->query('//browser');
                foreach ($browsers as $browser){
                    $check =$_POST['browser']==$browser->getAttribute('value')?'check':'';
                   echo '<li><input type="radio" '.$check.' name="browser"
                   value="'.$browser->getAttribute('value').'">
                   '.$browser->getAttribute('name').'</li>';
            }
            ?>
            <li style="color: red"><?php echo $message ?></li>
            <li><input type="submit" name="vote" value="vote">OR
                <a href="check.php" id="resulets" > View Results</a>
            </li>
            </ul>
        </fieldset>
    </form>
</body>
</html>