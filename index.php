<?php

$includes = file_get_contents('assets/html/includes.html');
$files = scandir('./');
if (!file_exists('build/')) {
    mkdir("build");    
}

$content = "";
foreach ($files as $file) {
    $path_parts = pathinfo($file);
    if ($path_parts['extension'] == 'html') {
        $content = file_get_contents($file);
        $content = str_replace("</TITLE>","</TITLE>".$includes,$content);
        file_put_contents("build/content.html",$content);
        unlink($file);
    }
}
if (file_exists("build/content.html")) {
    die(file_get_contents("build/content.html"));
} 


echo "<center><h1 style=\"margin: 30px;\">Nenhum arquivo de bookmarks criado.</h1></center>"



?>