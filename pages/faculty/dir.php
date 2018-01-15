<?php

$root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
$dir = $root . '/assignment/somefolder/';
$old = umask(0);

if( !is_dir($dir) ) {
    mkdir($dir, 0755, true);
}
umask($old);

?>