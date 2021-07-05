<?php 
/*
Author: John Gray
Last Revision: 05.05.14
File Name: main.php
Description: Utilities to get and set path names 
*/

//	Get the document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

//	Get the application path
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/';
/* $app_path = '/' . $dirs[1]; */


// Set the include path
set_include_path($doc_root . $app_path);
?>