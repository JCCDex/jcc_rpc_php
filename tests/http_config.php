<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = new \JccDex\Http\Config(["jccdex.cn", "weidex.vip"], '80', false);

echo $config->getConfig();