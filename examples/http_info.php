<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$info = new \JccDex\Http\Info(["i3b44eb75ef.jccdex.cn", "i059e8792d5.jccdex.cn", "i352fb2ef56.jccdex.cn"], 443, true);
echo "获取24小时行情数据<br>";
echo $info->getAllTickers();
echo "<br><br>";

echo "获取数据详情<br>";
echo $info->getTicker('JJCC-SWT', 'SWT.jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF');
echo "<br><br>";

echo "获取市场深度<br>";
echo $info->getDepth('JJCC-SWT', 'SWT.jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF', 'normal');
echo "<br><br>";

echo "获取K线数据<br>";
echo $info->getKline('JJCC-SWT', 'CNT.jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF', 'hour');
echo "<br><br>";
