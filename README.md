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

#### getConfig
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
#### getBalances
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
```php
echo $exchange->getBalances($address);
```

#### getHistoricTransactions
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
| ledger | string | 否 |
| seq | string | 否 |
```php
echo $exchange->getHistoricTransactions($address, $ledger, $seq);
```

#### getHistoricPayments
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
| ledger | string | 否 |
| seq | string | 否 |
```php
echo $exchange->getHistoricPayments($address, $ledger, $seq);
```

#### getOrders
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
| page | string | 是 |
```php
echo $exchange->getOrders($address, $page);
```

#### createOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| sign | string | 是 |
```php
echo $exchange->createOrder($sign);
```

#### deleteOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| sign | string | 是 |
```php
echo $exchange->deleteOrder($sign);
```

#### getSequence
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| address | string | 是 |
```php
echo $exchange->getSequence($address);
```

#### transferAccount
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

#### getAllTickers

```php
echo $info->getAllTickers();
```

#### getTicker
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| base | string | 是 |
| counter | string | 是 |
```php
echo $exchange->getTicker($base, $counter);
```

#### getDepth
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| base | string | 是 |
| counter | string | 是 |
| type | string | 是 |
```php
echo $exchange->getDepth($base, $counter, $type);
```

#### getKline
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| base | string | 是 |
| counter | string | 是 |
| type | string | 是 |
```php
echo $exchange->getKline($base, $counter, $type);
```

#### getHistory
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| base | string | 是 |
| counter | string | 是 |
| type | string | 是 |
| time | string | 是 |
```php
echo $exchange->getHistory($base, $counter, $type, $time);
```

#### getTickerFromCMC
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| token | string | 是 |
| currency | string | 是 |
```php
echo $exchange->getTickerFromCMC($token, $currency);
```
## Biz API

firstly Instantiate an object
```php
use JccDex\Http\Biz;
$biz = new Biz(['ewdjbbl8jgf.jccdex.cn'], 443, true);
```

#### getSmsCode
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| phone | string | 是 |
| verifyType | string | 是 |
```php
echo $biz->getSmsCode($phone, $verifyType);
```

#### getImgCode

```php
echo $biz->getImgCode($phone, $verifyType);
```

#### checkSmsCode
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| phone | string | 是 |
| verifyType | string | 是 |
| verifyCodeType | string | 是 |
```php
echo $biz->checkSmsCode($phone, $verifyType, $verifyCodeType);
```

#### checkImgCode
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| imgCode | string | 是 |
```php
echo $biz->checkImgCode($userName, $imgCode);
```

#### isActive
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
```php
echo $biz->isActive($userName);
```

#### register
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| password | string | 是 |
| publicKey | string | 是 |
| verifyCode | string | 是 |
| imgCode | string | 是 |
```php
echo $biz->register($userName, $password, $publicKey, $verifyCode, $imgCode);
```

#### emailRegister
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| password | string | 是 |
| publicKey | string | 是 |
| verifyCode | string | 是 |
| imgCode | string | 是 |
```php
echo $biz->emailRegister($userName, $password, $publicKey, $verifyCode, $imgCode);
```

#### login
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| password | string | 是 |
| imgCode | string | 是 |
```php
echo $biz->login($userName, $password, $imgCode);
```

#### logout
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
```php
echo $biz->logout($userName);
```

#### getMyself
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
```php
echo $biz->getMyself($userName);
```

#### uploadImage
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| data | string | 是 |
```php
echo $biz->uploadImage($userName, $data);
```


#### verify
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| data | string | 是 |
```php
echo $biz->verify($userName, $data);
```

#### changeMobile
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| phone | string | 是 |
| verifyCode | string | 是 |
| password | string | 是 |
```php
echo $biz->changeMobile($phone, $verifyCode, $password);
```

#### changePassword
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| newPwd | string | 是 |
| oldPwd | string | 是 |
```php
echo $biz->changePassword($userName, $newPwd, $oldPwd);
```

#### resetPassword
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| verifyCode | string | 是 |
| oldPwd | string | 是 |
```php
echo $biz->resetPassword($userName, $verifyCode, $oldPwd);
```

#### bindEmail
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| email | string | 是 |
| verifyCode | string | 是 |
| password | string | 是 |
```php
echo $biz->bindEmail($userName, $email, $verifyCode, $password);
```

#### uploadWallet
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| publicKey | string | 是 |
```php
echo $biz->uploadWallet($userName, $publicKey);
```

#### getToken
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
```php
echo $biz->getToken($userName);
```

#### getHelp
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| url | string | 是 |
```php
echo $biz->getHelp($url);
```

#### getAbout
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| url | string | 是 |
```php
echo $biz->getAbout($url);
```

#### createDepositOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| amount | string | 是 |
| baseWallet | string | 是 |
| jtWallet | string | 是 |
| agentWallet | string | 是 |
| agentID | string | 是 |
```php
echo $biz->createDepositOrder($userName, $base, $amount, $baseWallet, $jtWallet, $agentWallet, $agentID);
```

#### cancelDepositOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| orderID | string | 是 |
```php
echo $biz->cancelDepositOrder($userName, $base, $orderID);
```


#### updateDepositOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| orderID | string | 是 |
| hash | string | 是 |
```php
echo $biz->updateDepositOrder($userName, $base, $orderID, $hash);
```

#### getDepositDetail
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| orderID | string | 是 |
```php
echo $biz->getDepositDetail($userName, $base, $orderID);
```

#### getPendingDeposit
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
```php
echo $biz->getPendingDeposit($userName, $base);
```

#### getDepositOrders
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| page | string | 是 |
```php
echo $biz->getDepositOrders($userName, $base, $page);
```

#### createWithdrawOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| amount | string | 是 |
| baseWallet | string | 是 |
| jtWallet | string | 是 |
| agentWallet | string | 是 |
| agentID | string | 是 |
```php
echo $biz->createWithdrawOrder($userName, $base, $amount, $baseWallet, $jtWallet, $agentWallet, $agentID);
```

#### getWithdrawOrders
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| page | string | 是 |
```php
echo $biz->getWithdrawOrders($userName, $base, $page);
```

#### updateWithdrawOrder
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| orderID | string | 是 |
| hash | string | 是 |
```php
echo $biz->updateWithdrawOrder($userName, $orderID, $hash);
```

#### getWithdrawDetail
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
| orderID | string | 是 |
```php
echo $biz->getWithdrawDetail($userName, $base, $orderID);
```

#### getAgentInfo
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
| base | string | 是 |
```php
echo $biz->getAgentInfo($userName, $base);
```

#### getCoinlist
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| userName | string | 是 |
```php
echo $biz->getCoinlist($userName);
```

#### getNewsReportList
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| count | string | 是 |
```php
echo $biz->getNewsReportList($count);
```

#### getNoticeList
parameters

| 参数名 | 类型 | 必填 |
| :----- | ----: | :----: |
| type | string | 是 |
| count | string | 是 |
```php
echo $biz->getNoticeList($type, $count);
```
