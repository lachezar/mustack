<?php

const TMP_DIR = "tmp";

// delete images older than 10 minutes to save space
if ($dh = opendir(TMP_DIR)) {
    while (false !== ($file = readdir($dh))) {
        if ((time() - filectime(TMP_DIR . "/" . $file)) > 10 * 60) {  
            unlink(TMP_DIR . "/" . $file);
        }
    }
}

$ip = $_SERVER['REMOTE_ADDR'];
$mustacheType = $_GET['mustache_type'];
$blob = $HTTP_RAW_POST_DATA;

$fh = fopen(TMP_DIR . "/" . $ip, "w");
fwrite($fh, $blob);
fclose($fh);

echo $ip;
