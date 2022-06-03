<?php
if(!session_id()) session_start();


require_once "../bootstrap/init.php";

use \Core\App;

$app = new App;