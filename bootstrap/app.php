<?php

/**
 * Load Dotenv for reading .env file
 */
$dotenv = Dotenv\Dotenv::createImmutable(base_path());
$dotenv->load();


/**
 * Load Request Class
 */
$request = new \Sifa\App\Core\Request();


/**
 * Load Route file for web
 */
include base_path().DIRECTORY_SEPARATOR.'routes/web.php';