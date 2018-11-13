<?php
    if (isset($_POST["data"])) {
        print_r($_POST);
        $file = "../public/highscores/highscores.json";
        $fh = fopen($file, 'w') or die("can't open file");
        $stringData = $_POST["data"];
        print_r($stringData);
        fwrite($fh, $stringData);
        fclose($fh);
    }
?>