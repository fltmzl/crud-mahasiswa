<?php 

define("APP_PATH", "../");

use Dotenv\Dotenv;
require_once APP_PATH . "vendor/autoload.php";

// get .env
$dotenv = Dotenv::createImmutable(APP_PATH);
$dotenv->load();

// App config
define("APP_URL", $_ENV["APP_URL"]);

// Database config
define("DB_CONNECTION", $_ENV["DB_CONNECTION"]);
define("DB_HOST", $_ENV["DB_HOST"]);
define("DB_PORT", $_ENV["DB_PORT"]);
define("DB_DATABASE", $_ENV["DB_DATABASE"]);
define("DB_USERNAME", $_ENV["DB_USERNAME"]);
define("DB_PASSWORD", $_ENV["DB_PASSWORD"]);