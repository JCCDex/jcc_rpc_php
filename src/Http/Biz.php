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
}