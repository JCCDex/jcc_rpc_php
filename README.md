# jcc_rpc_php

[![License](https://img.shields.io/github/license/JCCDex/jcc_rpc_php.svg)](https://packagist.org/packages/jccdex/jcc_rpc_php)
[![Total Downloads](https://poser.pugx.org/jccdex/jcc_rpc_php/downloads)](https://packagist.org/packages/jccdex/jcc_rpc_php)
[![Build Status](https://travis-ci.org/chenxi2015/jcc_rpc_php.svg?branch=master)](https://travis-ci.org/chenxi2015/jcc_rpc_php)
[![Latest Unstable Version](https://poser.pugx.org/jccdex/jcc_rpc_php/v/unstable)](https://packagist.org/packages/jccdex/jcc_rpc_php)

## Installation
The recommended way to install jcc_rpc_php is through [Composer](https://getcomposer.org/).
```php
# Install Composer
curl -sS https://getcomposer.org/installer | php
```
Next, run the Composer command to install the latest stable version of jcc_rpc_php:
```php
php composer.phar require jccdex/jcc_rpc_php

# OR

composer require jccdex/jcc_rpc_php
```

## Help and docs
[Interface Documents](https://github.com/JCCDex/jcc_server_doc)

## Config API

##### getConfig
```php
use JccDex\Http\Config;
$config = new Config(['jccdex.cn', 'eth626892d.jccdex.cn'], 443, true);
// $config = new Config('jccdex.cn', 443, true);
echo $config->getConfig();
```

## Exchange API

firstly Instantiate an object
```php
use JccDex\Http\Exchange;
$exchange = new Exchange(['ewdjbbl8jgf.jccdex.cn'], 443, true);
```
##### getBalances
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
```php
echo $exchange->getBalances($address);
```

##### getHistoricTransactions
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
| ledger | string | 否 |
| seq | string | 否 |
```php
echo $exchange->getHistoricTransactions($address, $ledger, $seq);
```

##### getHistoricPayments
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
| ledger | string | 否 |
| seq | string | 否 |
```php
echo $exchange->getHistoricPayments($address, $ledger, $seq);
```

##### getOrders
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
| page | string | 是 |
```php
echo $exchange->getOrders($address, $page);
```

##### createOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| sign | string | 是 |
```php
echo $exchange->createOrder($sign);
```

##### deleteOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| sign | string | 是 |
```php
echo $exchange->deleteOrder($sign);
```

##### getSequence
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
```php
echo $exchange->getSequence($address);
```

##### transferAccount
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| sign | string | 是 |
```php
echo $exchange->getSequence($sign);
```

## Info API
firstly Instantiate an object
```php
use JccDex\Http\Info;
$info = new Info(["i3b44eb75ef.jccdex.cn", "i059e8792d5.jccdex.cn", "i352fb2ef56.jccdex.cn"], 443, true);
```

##### getAllTickers

```php
echo $info->getAllTickers();
```

##### getTicker
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| base | string | 是 |
| counter | string | 是 |
```php
echo $exchange->getSequence($sign);
```