<?php

$grade=array(
    "math" => "3",
    "art" => "5",
    "history" => "4",
    "music" => "5"
);

foreach($grade as $subject=> $grade){
    echo "subject;" . $subject . ",grade;" . $grade;
    echo "<br>";
}
?>