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
    const TICKER_URL                = '/info/ticker/'; // 获取数据详情

    /**
     * app
     */
    const CODE_SMS_URL              = '/app/code/sms/'; //
    const IMG_CODE_URL              = '/app/code/img_code/'; //
    const CHECK_SMS_CODE_URL        = '/app/code/check_sms_code/'; //
    const CHECK_IMG_CODE_URL        = '/app/code/check_img_code/'; //
    const IS_ACTIVE_URL             = '/app/user/is_active/'; //
    const REGISTER_URL              = '/app/user/register/'; //
    const EMAIL_REGISTER_URL        = '/app/user/email_register/'; //
    const LOGIN_URL                 = '/app/user/pwd_login/'; //
    const LOGOUT_URL                = '/app/user/logout/'; //
    const GET_MYSELF_URL            = '/app/user/get_myself/'; //
    const UPLOAD_IMAGE_URL          = '/app/user/upload_image/'; //
    const VERIFY_URL                = '/app/user/verify/'; //
    const BIND_PHONE_URL            = '/app/user/bind_mobile/'; //
    const CHANGE_PWD_URL            = '/app/user/change_pwd/'; //
    const RESET_PWD_URL             = '/app/user/reset_pwd/'; //
    const BIND_EMAIL_URL            = '/app/user/bind_email/'; //
    const UPLOAD_WALLET_URL         = '/app/user/upload_wallet/'; //
    const TOKEN_URL                 = '/app/user/token/'; //

    /**
     * td
     */
    const CREATE_DEPOSIT_ORDER_URL  = '/app/td/create_order/'; //
    const CANCEL_DEPOSIT_ORDER_URL  = '/app/td/cancel_order/'; //
    const UPDATE_DEPOSIT_ORDER_URL  = '/app/td/update_order/'; //
    const ORDER_DETAIL_URL          = '/app/td/order_detail/'; //
    const PENDING_ORDER_URL         = '/app/td/pending_order/'; //
    const MY_ORDERS_URL             = '/app/td/my_orders/'; //

    /**
     * tw
     */
    const TW_CREATE_ORDERS_URL      = '/app/tw/create_order/'; //
    const TW_MY_ORDERS_URL          = '/app/tw/my_orders/'; //
    const TW_UPDATE_ORDER_URL       = '/app/tw/update_order/'; //
    const TW_ORDER_DETAIL_URL       = '/app/tw/order_detail/'; //

    const AGENT_INFO_URL            = '/app/agent/agent_info/'; //
    const COIN_LIST_URL             = '/app/coin/coin_list/'; //
    const ADV_INFO_URL              = '/app/adv/info/'; //
    const ADV_NOTICE_URL            = '/app/adv/notice/'; //

}
