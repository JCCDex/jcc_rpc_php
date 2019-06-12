<?php
namespace JccDex;

class Router {

    const CONFIG_URL                = '/static/config/jc_config.json'; // 获取服务器列表

    /**
     * exHost
     */
    const BALANCE_URL               = '/exchange/balances/'; // 获取钱包余额
    const TX_URL                    = '/exchange/tx/'; // 查询历史交易记录
    const PAYMENTS_URL              = '/exchange/payments/'; // 查询历史转账记录
    const ORDERS_URL                = '/exchange/orders/'; // 查询当前委托
    const SEQUENCE_URL              = '/exchange/sequence/'; // 获取交易序列号(前端签名需要)
    const SIGN_ORDER_URL            = '/exchange/sign_order'; // 挂单(前端签名)
    const SIGN_CANCEL_ORDER_URL     = '/exchange/sign_cancel_order'; // 撤单(前端签名)
    const SIGN_PAYMENT_URL          = '/exchange/sign_payment'; // 转账(前端签名)
    const PAYMENT_URL               = '/exchange/payment'; // 转账(非签名)

    /**
     * infoHost
     */
    const DEPTH_URL                 = '/info/depth/'; // 获取市场深度
    const KLINE_URL                 = '/info/kline/'; // 获取K线数据
    const HISTORY_URL               = '/info/history/'; // 获取最新成交
    const ALLTICKERS_URL            = '/info/alltickers/'; // 获取24小时行情数据
}
