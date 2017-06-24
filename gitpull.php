<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)


$out = array();
exec('git fetch', $out);
foreach($out as $line) {
    echo $line;
}
exec('git pull', $out);
foreach($out as $line) {
    echo $line;
}
?>
