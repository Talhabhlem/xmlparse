<?php

namespace home;

require_once 'autoload.php';
require_once 'ProductsParsing.php';
/**
 * You can start writing code here. Please do not change any skeleton classes.
 * You can create as many files and folders and namespaces as you need
 *
 * You might notice that we are using Symfony2 UniversalClassLoader. Do not worry if you have
 * never used Symfony2, if you follow PSR-0 it will just work as expected.
 */
$_strFeedUrl = "products.xml";
$parser_obj = new ProductsParsing($_strFeedUrl);
$parser_obj->parse();