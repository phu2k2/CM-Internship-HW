<?php
function creteFile()
{
    $myProfile = fopen(__DIR__ . "/myprofile.txt", "w");
    $name = "Huyen Nguyen T. C.\n";
    $description = "I'm 22 years old. I like reading, drawing and crocheting.\n";
    fwrite($myProfile, $name);
    fwrite($myProfile, $description);
    fclose($myProfile);
}

creteFile();
