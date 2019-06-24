<?php

namespace JccDex\Http;

use GuzzleHttp\Exception\ClientException;
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
     * @param $phone
     * @param $verifyType
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSmsCode($phone, $verifyType)
    {
        try {

            $this->options['query'] = ['verifyType' => $verifyType];
            $response = $this->client->request('GET', Router::CODE_SMS_URL . self::uniqid(8) . '/' . $phone, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get img code
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getImgCode()
    {
        try {
            $response = $this->client->request('GET', Router::IMG_CODE_URL . self::uniqid(8) . '/' . self::uniqid(8), $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * check sms code
     * @param $phone
     * @param $verifyCode
     * @param $verifyCodeType
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkSmsCode($phone, $verifyCode, $verifyCodeType)
    {
        try {
            $this->options['form_params'] = ['verifyCode' => $verifyCode, 'verifyCodeType' => $verifyCodeType];
            $response = $this->client->request('POST', Router::CHECK_SMS_CODE_URL . self::uniqid(8) . '/' . $phone, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * check img code
     * @param $userName
     * @param $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkImgCode($userName, $imgCode)
    {
        try {
            $this->options['query'] = ['verifyImgCode' => $imgCode];
            $response = $this->client->request('GET', Router::CHECK_IMG_CODE_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * is active
     * @param $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function isActive($userName)
    {
        try {
            $response = $this->client->request('GET', Router::IS_ACTIVE_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * register
     * @param $userName
     * @param $password
     * @param $publicKey
     * @param $verifyCode
     * @param $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function register($userName, $password, $publicKey, $verifyCode, $imgCode)
    {
        try {
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
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * email register
     * @param $userName
     * @param $password
     * @param $publicKey
     * @param $verifyCode
     * @param $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function emailRegister($userName, $password, $publicKey, $verifyCode, $imgCode)
    {
        try {
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
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * login
     * @param $userName
     * @param $password
     * @param $imgCode
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login($userName, $password, $imgCode)
    {
        try {
            $this->options['form_params'] = [
                'password' => $password
            ];
            if ($imgCode) {
                $this->options['form_params']['imgCode'] = $imgCode;
            }
            $response = $this->client->request('POST', Router::LOGIN_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * logout
     * @param $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function logout($userName)
    {
        try {
            $response = $this->client->request('POST', Router::LOGOUT_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get myself
     * @param $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMyself($userName)
    {
        try {
            $this->options['query'] = ['t' => microtime(true) * 1000];
            $response = $this->client->request('GET', Router::GET_MYSELF_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * upload image
     * @param $userName
     * @param $data
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadImage($userName, $data)
    {
        try {
            $this->options['form_params'] = ['data' => $data];
            $response = $this->client->request('POST', Router::UPLOAD_IMAGE_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * verify
     * @param $userName
     * @param $data
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify($userName, $data)
    {
        try {
            $this->options['form_params'] = ['data' => $data];
            $response = $this->client->request('POST', Router::VERIFY_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * change mobile
     * @param $phone
     * @param $verifyCode
     * @param $password
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeMobile($phone, $verifyCode, $password)
    {
        try {
            $this->options['form_params'] = ['verifyCode' => $verifyCode, 'password' => $password];
            $response = $this->client->request('POST', Router::BIND_PHONE_URL . self::uniqid(8) . '/' . $phone, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * change password
     * @param $userName
     * @param $newPwd
     * @param $oldPwd
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changePassword($userName, $newPwd, $oldPwd)
    {
        try {
            $this->options['form_params'] = ['newPwd' => $newPwd, 'oldPwd' => $oldPwd];
            $response = $this->client->request('POST', Router::CHANGE_PWD_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * reset password
     * @param $userName
     * @param $verifyCode
     * @param $newPwd
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resetPassword($userName, $verifyCode, $newPwd)
    {
        try {
            $this->options['form_params'] = ['verifyCode' => $verifyCode, 'newPwd' => $newPwd];
            $response = $this->client->request('POST', Router::RESET_PWD_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * bind email
     * @param $userName
     * @param $email
     * @param $verifyCode
     * @param $password
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bindEmail($userName, $email, $verifyCode, $password)
    {
        try {
            $this->options['form_params'] = ['email' => $email, 'verifyCode' => $verifyCode, 'password' => $password];
            $response = $this->client->request('POST', Router::BIND_EMAIL_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * upload wallet
     * @param $userName
     * @param $publicKey
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadWallet($userName, $publicKey)
    {
        try {
            $this->options['form_params'] = ['publicKey' => $publicKey];
            $response = $this->client->request('POST', Router::UPLOAD_WALLET_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get token
     * @param $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken($userName)
    {
        try {
            $response = $this->client->request('GET', Router::TOKEN_URL . self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get help
     * @param $url
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHelp($url)
    {
        try {
            $response = $this->client->request('GET', $url, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get about
     * @param $url
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAbout($url)
    {
        try {
            $response = $this->client->request('GET', $url, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * create deposit order
     * @param $userName
     * @param $base
     * @param $amount
     * @param $baseWallet
     * @param $jtWallet
     * @param $agentWallet
     * @param $agentID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDepositOrder($userName, $base, $amount, $baseWallet, $jtWallet, $agentWallet, $agentID)
    {
        try {
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
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * cancel deposit order
     * @param $userName
     * @param $base
     * @param $orderID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \Exception
     */
    public function cancelDepositOrder($userName, $base, $orderID)
    {
        try {
            $this->options['form_params'] = [
                'base' => $base,
                'orderID' => $orderID
            ];
            $response = $this->client->delete(Router::CANCEL_DEPOSIT_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * update deposit order
     * @param $userName
     * @param $base
     * @param $orderID
     * @param $hash
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateDepositOrder($userName, $base, $orderID, $hash)
    {
        try {
            $this->options['form_params'] = [
                'base' => $base,
                'orderID' => $orderID,
                'hash' => $hash
            ];
            $response = $this->client->request('POST', Router::UPDATE_DEPOSIT_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get deposit detail
     * @param $userName
     * @param $base
     * @param $orderID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepositDetail($userName, $base, $orderID)
    {
        try {
            $this->options['query'] = [
                'base' => $base,
                'orderID' => $orderID
            ];
            $response = $this->client->request('GET', Router::ORDER_DETAIL_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get pending deposit
     * @param $userName
     * @param $base
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPendingDeposit($userName, $base)
    {
        try {
            $this->options['query'] = [
                'base' => $base
            ];
            $response = $this->client->request('GET', Router::PENDING_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get deposit orders
     * @param $userName
     * @param $base
     * @param $page
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepositOrders($userName, $base, $page)
    {
        try {
            $this->options['query'] = [
                'page' => $page,
                'base' => $base
            ];
            $response = $this->client->request('GET', Router::MY_ORDERS_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * create withdraw order
     * @param $userName
     * @param $base
     * @param $amount
     * @param $baseWallet
     * @param $jtWallet
     * @param $agentWallet
     * @param $agentID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createWithdrawOrder($userName, $base, $amount, $baseWallet, $jtWallet, $agentWallet, $agentID)
    {
        try {
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
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get withdraw orders
     * @param $userName
     * @param $base
     * @param $page
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWithdrawOrders($userName, $base, $page)
    {
        try {
            $this->options['query'] = [
                'base' => $base,
                'page' => $page
            ];
            $response = $this->client->request('GET', Router::TW_MY_ORDERS_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * update withdraw order
     * @param $userName
     * @param $orderID
     * @param $hash
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateWithdrawOrder($userName, $orderID, $hash)
    {
        try {
            $this->options['form_params'] = [
                'orderID' => $orderID,
                'hash' => $hash
            ];
            $response = $this->client->request('POST', Router::TW_UPDATE_ORDER_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get withdraw detail
     * @param $userName
     * @param $base
     * @param $orderID
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWithdrawDetail($userName, $base, $orderID)
    {
        try {
            $this->options['query'] = [
                'base' => $base,
                'orderID' => $orderID
            ];
            $response = $this->client->request('GET', Router::TW_ORDER_DETAIL_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get agent info
     * @param $userName
     * @param $base
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAgentInfo($userName, $base)
    {
        try {
            $this->options['query'] = [
                'base' => $base
            ];
            $response = $this->client->request('GET', Router::AGENT_INFO_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get coin list
     * @param $userName
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCoinlist($userName)
    {
        try {
            $response = $this->client->request('GET', Router::COIN_LIST_URL. self::uniqid(8) . '/' . $userName, $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get news report list
     * @param $count
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNewsReportList($count)
    {
        try {
            $this->options['query'] = [
                'count' => $count
            ];
            $response = $this->client->request('GET', Router::ADV_INFO_URL. self::uniqid(8), $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * get notice list
     * @param $type
     * @param $count
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNoticeList($type, $count)
    {
        try {
            $this->options['query'] = [
                'type' => $type,
                'count' => $count
            ];
            $response = $this->client->request('GET', Router::ADV_NOTICE_URL. self::uniqid(8), $this->options);
            return $response->getBody();
        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}