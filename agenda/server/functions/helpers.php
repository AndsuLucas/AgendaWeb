<?php  
function debug($dump)   {
    echo "<pre>";

    var_dump($dump);

    echo "</pre>";

    die("finish_code");

}