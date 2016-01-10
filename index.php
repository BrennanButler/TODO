<?php

$directory = "C:/";

$matches = array();

$di = new RecursiveDirectoryIterator($directory);

foreach(new RecursiveIteratorIterator($di) as $filename => $file)
{
    if(is_dir($filename)) continue;
    $file = fopen($filename, "r");

    while(($line = fgets($file)) !== false)
    {
        if(strpos($line, "TODO :") || strpos($line, "TODO:") || strpos($line, "todo:") || strpos($line, "todo :"))
        {
            array_push($matches, array(ftell($file), $filename, $line));
        }
    }
}
?>

<!doctype html>


<html lang="en">


    <head>

        <meta charset="utf-8">
        <title>Todo's</title>

        <style>
        html, body, * {
            padding:0px;
            margin:0px;
        }
        body {
            background:#f3f3f3;
            font-family: Roboto, Arial, sans-serif;
        }
        .container {
            width:88%;
            margin:0px auto;
        }
        .page {
            background:#fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-top:100px;
            margin-bottom: 100px;
            padding:50px 20px;
        }
        .code {
            margin-top:40px;
            margin-bottom:40px;
            background: #000;
            color:#fff;
            padding:10px;
            overflow: auto;
        }

        .todo {
            margin-bottom: 50px;
        }
        </style>
    </head>

    <body>


        <div class="container">

            <div class="page">
                <div class="container">

                    <?php
                    foreach($matches as $match)
                    {
                        echo '<div class="todo">';
                        echo "<h3>$match[2]</h3>";
                        echo '<div class="code"><code><pre>';

                        $contents = file_get_contents($match[1]);
                        $code = substr($contents, $match[0]-strlen($match[2]), $match[0]+20);
                        echo nl2br($code);
                        echo '</pre></code></div>';
                        echo "<p>$match[1]</p></div>";
                    }

                    ?>

                </div>
            </div>
        </div>
    </body>
