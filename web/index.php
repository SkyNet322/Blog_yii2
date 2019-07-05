<?php

/**
 * @OA\Info(title="BlogYii2 API", version="0.1")
 */

/**
 * @OA\SecurityScheme(
 *         scheme="bearer",
 *         type="http",
 *         name="Authorization",
 *         in="header",
 *         securityScheme="api_key"
 *     )
 */

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
