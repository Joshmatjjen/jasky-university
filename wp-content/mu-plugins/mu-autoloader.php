<?php

/**
 * This file is for loading all mu-plugins within subfolders
 * where the PHP file name is exactly like the directory name + .php.
 *
 * Example: /mu-tools/mu-tools.php
 */

$dirs = glob(dirname(__FILE__) . '/*', GLOB_ONLYDIR);

foreach ($dirs as $dir) {
    if (file_exists($dir . DIRECTORY_SEPARATOR . basename($dir) . ".php")) {
        require($dir . DIRECTORY_SEPARATOR . basename($dir) . ".php");
    }
}

add_filter('allow_dev_auto_core_updates', '__return_true');           // Enable development updates 
add_filter('allow_minor_auto_core_updates', '__return_true');         // Enable minor updates
add_filter('allow_major_auto_core_updates', '__return_true');         // Enable major updates