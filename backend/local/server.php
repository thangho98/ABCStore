<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$root = __DIR__;
// var_dump($root);
$lastIndexOf = strrpos($root,"\\");
// var_dump($lastIndexOf);
$root = substr($root,0,$lastIndexOf);
// var_dump($root);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists($root.$uri)) {
    return false;
}

require_once $root.'\index.php';