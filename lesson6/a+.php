<?php

$handle=fopen('data.txt', 'a+');
fwrite($handle, "\n add more lines");
fclose($handle);


?>