<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = new \JccDex\Http\Config(["jccdex.cn", "weidex.vip"], '443', true);

echo $config->getConfig();