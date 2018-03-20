
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

<form method="post">
    <fieldset>
        <legend>Result Poll</legend>
        <?php
            $dom=new DOMDocument();
            $dom->load('browser.xml');
            $xpath=new DOMXPath($dom);
            $browsers=$xpath->query('//browser');
            foreach ($browsers as $browser){
                echo $browser->getAttribute('votes');
            }
        ?>
    </fieldset>
</form>
</body>
</html>