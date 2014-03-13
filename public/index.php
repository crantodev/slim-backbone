<?php
session_cache_limiter(false);
session_start();

require __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../app/application.php';

require_once __DIR__.'/../app/routes.php';

$app->run();