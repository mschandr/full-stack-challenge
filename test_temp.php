<?php
echo "Temp dir: " . sys_get_temp_dir() . PHP_EOL;

$file = tempnam(sys_get_temp_dir(), 'testy_test');
if (!$file) {
    echo "tempnam() failed\nBad Mark!";
} else {
    echo "tempnam() succeeded: $file\nHappy Mark!";
    unlink($file);
}
