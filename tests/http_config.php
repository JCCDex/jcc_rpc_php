<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = new \JccDex\Http\Config("jccdex.cn", 443, true);
// print_r($config->getConfig());
echo $config->getConfig();