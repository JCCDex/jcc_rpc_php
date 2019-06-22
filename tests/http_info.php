<?php
require_once __DIR__ . '/../vendor/autoload.php';

$info = new \JccDex\Http\Info(["i3b44eb75ef.jccdex.cn", "i059e8792d5.jccdex.cn", "i352fb2ef56.jccdex.cn"], 443, true);
echo $info->getAllTickers();