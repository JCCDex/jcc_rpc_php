<?php
require_once __DIR__ . '/../vendor/autoload.php';

$info = new \JccDex\Http\Info(["jccdex.cn", "weidex.vip"], '80', true);
echo $info->getAllTickers();