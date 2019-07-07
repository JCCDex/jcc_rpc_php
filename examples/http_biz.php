<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$biz = new \JccDex\Http\Biz("moac1ma17f1.jccdex.cn", 443, true);

echo "<br>";
echo $biz->getSmsCode('12345678901', 1);
echo "<br><br>";
