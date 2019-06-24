<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$info = new \JccDex\Http\Info(["i3b44eb75ef.jccdex.cn", "i059e8792d5.jccdex.cn", "i352fb2ef56.jccdex.cn"], 443, true);
echo "获取24小时行情数据<br>";
echo $info->getAllTickers();
echo "<br><br>";

echo "获取数据详情<br>";
echo $info->getTicker('JJCC', 'CNY');
echo "<br><br>";

echo "获取市场深度<br>";
echo $info->getDepth('JJCC', 'SWT', 'normal');
echo "<br><br>";

echo "获取K线数据<br>";
echo $info->getKline('JJCC', 'SWT', 'hour');
echo "<br><br>";

echo "获取最新成交<br>";
echo $info->getHistory('JJCC', 'SWT', 'normal', time());
echo "<br><br>";

echo "获取最新成交<br>";
echo $info->getTickerFromCMC('JJCC', 'SWT');
echo "<br><br>";