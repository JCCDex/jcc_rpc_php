<?php

namespace JccDex\Http;

use JccDex\Router;

class Biz extends Base
{
    /**
     * Biz constructor.
     * @param $hosts
     * @param $port
     * @param $https
     */
    public function __construct($hosts, $port, $https)
    {
        parent::__construct($hosts, $port, $https);
    }

    /**
     * get sms code
     * @param string $phone
     * @param string $verifyType
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSmsCode(string $phone, string $verifyType)
    {
        $this->options['query'] = ['verifyType' => $verifyType];
        $response = $this->client->request('GET', Router::CODE_SMS_URL . self::uniqid(8) . '/' . $phone, $this->options);
        return $response->getBody();
    }

    /**
     * get img code
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getImgCode()
    {
        $response = $this->client->request('GET', Router::IMG_CODE_URL . self::uniqid(8) . '/' . self::uniqid(8), $this->options);
        return $response->getBody();
    }

    /**
     * check sms code
     * @param string $phone
     * @param string $verifyCode
     * @param string $verifyCodeType
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkSmsCode(string $phone, string $verifyCode, string $verifyCodeType)
    {
        $this->options['form_params'] = ['verifyCode' => $verifyCode, 'verifyCodeType' => $verifyCodeType];
        $response = $this->client->request('POST', Router::CHECK_SMS_CODE_URL . self::uniqid(8) . '/' . $phone, $this->options);
        return $response->getBody();
    }

    /**
     * check img code
     * @param string $userName
     * @param string $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkImgCode(string $userName, string $imgCode)
    {
        $this->options['query'] = ['verifyImgCode' => $imgCode];
        $response = $this->client->request('GET', Router::CHECK_IMG_CODE_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * is active
     * @param $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function isActive($userName)
    {
        $response = $this->client->request('GET', Router::IS_ACTIVE_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * register
     * @param string $userName
     * @param string $password
     * @param string $publicKey
     * @param string $verifyCode
     * @param string $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function register(string $userName, string $password, string $publicKey, string $verifyCode, string $imgCode)
    {
        $this->options['form_params'] = [
            'password' => $password,
            'verifyCode' => $verifyCode,
            'publicKey' => $publicKey
        ];
        if ($imgCode) {
            $this->options['form_params']['imgCode'] = $imgCode;
        }
        $response = $this->client->request('POST', Router::REGISTER_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * email register
     * @param string $userName
     * @param string $password
     * @param string $publicKey
     * @param string $verifyCode
     * @param string $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function emailRegister(string $userName, string $password, string $publicKey, string $verifyCode, string $imgCode)
    {
        $this->options['form_params'] = [
            'password' => $password,
            'verifyCode' => $verifyCode,
            'publicKey' => $publicKey
        ];
        if ($imgCode) {
            $this->options['form_params']['imgCode'] = $imgCode;
        }
        $response = $this->client->request('POST', Router::EMAIL_REGISTER_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * login
     * @param string $userName
     * @param string $password
     * @param string $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login(string $userName, string $password, string $imgCode)
    {
        $this->options['form_params'] = [
            'password' => $password
        ];
        if ($imgCode) {
            $this->options['form_params']['imgCode'] = $imgCode;
        }
        $response = $this->client->request('POST', Router::LOGIN_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * logout
     * @param string $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function logout(string $userName)
    {
        $response = $this->client->request('POST', Router::LOGOUT_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get myself
     * @param string $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMyself(string $userName)
    {
        $this->options['query'] = ['t' => microtime(true) * 1000];
        $response = $this->client->request('GET', Router::GET_MYSELF_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * upload image
     * @param string $userName
     * @param string $data
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadImage(string $userName, string $data)
    {
        $this->options['form_params'] = ['data' => $data];
        $response = $this->client->request('POST', Router::UPLOAD_IMAGE_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * verify
     * @param string $userName
     * @param string $data
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify(string $userName, string $data)
    {
        $this->options['form_params'] = ['data' => $data];
        $response = $this->client->request('POST', Router::VERIFY_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * change mobile
     * @param string $phone
     * @param string $verifyCode
     * @param string $password
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeMobile(string $phone, string $verifyCode, string $password)
    {
        $this->options['form_params'] = ['verifyCode' => $verifyCode, 'password' => $password];
        $response = $this->client->request('POST', Router::BIND_PHONE_URL . self::uniqid(8) . '/' . $phone, $this->options);
        return $response->getBody();
    }

    /**
     * change password
     * @param string $userName
     * @param string $newPwd
     * @param string $oldPwd
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changePassword(string $userName, string $newPwd, string $oldPwd)
    {
        $this->options['form_params'] = ['newPwd' => $newPwd, 'oldPwd' => $oldPwd];
        $response = $this->client->request('POST', Router::CHANGE_PWD_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * reset password
     * @param string $userName
     * @param string $verifyCode
     * @param string $newPwd
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resetPassword(string $userName, string $verifyCode, string $newPwd)
    {
        $this->options['form_params'] = ['verifyCode' => $verifyCode, 'newPwd' => $newPwd];
        $response = $this->client->request('POST', Router::RESET_PWD_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * bind email
     * @param string $userName
     * @param string $email
     * @param string $verifyCode
     * @param string $password
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bindEmail(string $userName, string $email, string $verifyCode, string $password)
    {
        $this->options['form_params'] = ['email' => $email, 'verifyCode' => $verifyCode, 'password' => $password];
        $response = $this->client->request('POST', Router::BIND_EMAIL_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * upload wallet
     * @param string $userName
     * @param string $publicKey
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadWallet(string $userName, string $publicKey)
    {
        $this->options['form_params'] = ['publicKey' => $publicKey];
        $response = $this->client->request('POST', Router::UPLOAD_WALLET_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get token
     * @param string $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken(string $userName)
    {
        $response = $this->client->request('GET', Router::TOKEN_URL . self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get help
     * @param string $url
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHelp(string $url)
    {
        $response = $this->client->request('GET', $url, $this->options);
        return $response->getBody();
    }

    /**
     * get about
     * @param string $url
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAbout(string $url)
    {
        $response = $this->client->request('GET', $url, $this->options);
        return $response->getBody();
    }

    /**
     * create deposit order
     * @param string $userName
     * @param string $base
     * @param string $amount
     * @param string $baseWallet
     * @param string $jtWallet
     * @param string $agentWallet
     * @param string $agentID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDepositOrder(string $userName, string $base, string $amount, string $baseWallet, string $jtWallet, string $agentWallet, string $agentID)
    {
        $this->options['form_params'] = [
            'base' => $base,
            'amount' => $amount,
            'baseWallet' => $baseWallet,
            'jtWallet' => $jtWallet,
            'agentWallet' => $agentWallet,
            'agentID' => $agentID
        ];
        $response = $this->client->request('POST', Router::CREATE_DEPOSIT_ORDER_URL, $this->options);
        return $response->getBody();
    }

    /**
     * cancel deposit order
     * @param string $userName
     * @param string $base
     * @param string $orderID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \Exception
     */
    public function cancelDepositOrder(string $userName, string $base, string $orderID)
    {
        $this->options['form_params'] = [
            'base' => $base,
            'orderID' => $orderID
        ];
        $response = $this->client->delete(Router::CANCEL_DEPOSIT_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * update deposit order
     * @param string $userName
     * @param string $base
     * @param string $orderID
     * @param string $hash
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateDepositOrder(string $userName, string $base, string $orderID, string $hash)
    {
        $this->options['form_params'] = [
            'base' => $base,
            'orderID' => $orderID,
            'hash' => $hash
        ];
        $response = $this->client->request('POST', Router::UPDATE_DEPOSIT_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get deposit detail
     * @param string $userName
     * @param string $base
     * @param string $orderID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepositDetail(string $userName, string $base, string $orderID)
    {
        $this->options['query'] = [
            'base' => $base,
            'orderID' => $orderID
        ];
        $response = $this->client->request('GET', Router::ORDER_DETAIL_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get pending deposit
     * @param string $userName
     * @param string $base
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPendingDeposit(string $userName, string $base)
    {
        $this->options['query'] = [
            'base' => $base
        ];
        $response = $this->client->request('GET', Router::PENDING_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get deposit orders
     * @param string $userName
     * @param string $base
     * @param int $page
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepositOrders(string $userName, string $base, int $page)
    {
        $this->options['query'] = [
            'page' => $page,
            'base' => $base
        ];
        $response = $this->client->request('GET', Router::MY_ORDERS_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * create withdraw order
     * @param string $userName
     * @param string $base
     * @param string $amount
     * @param string $baseWallet
     * @param string $jtWallet
     * @param string $agentWallet
     * @param string $agentID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createWithdrawOrder(string $userName, string $base, string $amount, string $baseWallet, string $jtWallet, string $agentWallet, string $agentID)
    {
        $this->options['form_params'] = [
            'base' => $base,
            'amount' => $amount,
            'baseWallet' => $baseWallet,
            'jtWallet' => $jtWallet,
            'agentWallet' => $agentWallet,
            'agentID' => $agentID,
        ];
        $response = $this->client->request('POST', Router::TW_CREATE_ORDERS_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get withdraw orders
     * @param string $userName
     * @param string $base
     * @param string $page
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWithdrawOrders(string $userName, string $base, string $page)
    {
        $this->options['query'] = [
            'base' => $base,
            'page' => $page
        ];
        $response = $this->client->request('GET', Router::TW_MY_ORDERS_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * update withdraw order
     * @param string $userName
     * @param string $orderID
     * @param string $hash
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateWithdrawOrder(string $userName, string $orderID, string $hash)
    {
        $this->options['form_params'] = [
            'orderID' => $orderID,
            'hash' => $hash
        ];
        $response = $this->client->request('POST', Router::TW_UPDATE_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get withdraw detail
     * @param string $userName
     * @param string $base
     * @param string $orderID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWithdrawDetail(string $userName, string $base, string $orderID)
    {
        $this->options['query'] = [
            'base' => $base,
            'orderID' => $orderID
        ];
        $response = $this->client->request('GET', Router::TW_ORDER_DETAIL_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get agent info
     * @param string $userName
     * @param string $base
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAgentInfo(string $userName, string $base)
    {
        $this->options['query'] = [
            'base' => $base
        ];
        $response = $this->client->request('GET', Router::AGENT_INFO_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get coin list
     * @param string $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCoinlist(string $userName)
    {
        $response = $this->client->request('GET', Router::COIN_LIST_URL. self::uniqid(8) . '/' . $userName, $this->options);
        return $response->getBody();
    }

    /**
     * get news report list
     * @param int $count
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNewsReportList(int $count)
    {
        $this->options['query'] = [
            'count' => $count
        ];
        $response = $this->client->request('GET', Router::ADV_INFO_URL. self::uniqid(8), $this->options);
        return $response->getBody();
    }

    /**
     * get notice list
     * @param int $type
     * @param int $count
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNoticeList(int $type, int $count)
    {
        $this->options['query'] = [
            'type' => $type,
            'count' => $count
        ];
        $response = $this->client->request('GET', Router::ADV_NOTICE_URL. self::uniqid(8), $this->options);
        return $response->getBody();
    }
}