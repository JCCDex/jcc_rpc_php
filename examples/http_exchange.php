<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$exchange = new \JccDex\Http\Exchange(["ewdjbbl8jgf.jccdex.cn"], 443, true);

echo "<br>";
echo $exchange->getBalances("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";

echo "<br>";
echo $exchange->getHistoricTransactions("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";

echo "<br>";
echo $exchange->getHistoricPayments("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";

echo "<br>";
echo $exchange->getOrders("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF", 1);
echo "<br><br>";

echo "<br>";
echo $exchange->createOrder("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";

echo "<br>";
echo $exchange->deleteOrder("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";

echo "<br>";
echo $exchange->getSequence("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";

echo "<br>";
echo $exchange->transferAccount("jhmj8NJPBhE6js5fJw5Ms1a3xNX2ZuouwF");
echo "<br><br>";
