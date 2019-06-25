<?php


namespace JccDex\Tests;


use JccDex\Http\Biz;
use JccDex\Http\Config;
use PHPUnit\Framework\TestCase;

class BizTest extends TestCase
{
    private $biz;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->biz = new Biz(['ewdjbbl8jgf.jccdex.cn'], '443', true);
    }

    public function testGetSmsCode()
    {
        $response = $this->biz->getSmsCode('12345678901', 1);
        $this->assertJson($response, '获取成功');
    }

    public function testGetImgCode()
    {
        $response = $this->biz->getImgCode();
        $this->assertJson($response, '获取成功');
    }

    public function testCheckSmsCode()
    {
        $response = $this->biz->checkSmsCode('12345678901', 1, 1);
        $this->assertJson($response, '获取成功');
    }

    public function testCheckImgCode()
    {
        $response = $this->biz->checkImgCode('chenxi', '123456');
        $this->assertJson($response, '获取成功');
    }

    public function testIsActive()
    {
        $response = $this->biz->isActive('chenxi');
        $this->assertJson($response, '获取成功');
    }

    public function testRegister()
    {
        $response = $this->biz->register('chenxi', '123456', '12312', '123456', '234567');
        $this->assertJson($response, '获取成功');
    }

    public function testEmailRegister()
    {
        $response = $this->biz->emailRegister('chenxi', '123456', '12312', '123456', '234567');
        $this->assertJson($response, '获取成功');
    }

    public function testLogin()
    {
        $response = $this->biz->login('chenxi', '123456', '12312');
        $this->assertJson($response, '获取成功');
    }

    public function testLogout()
    {
        $response = $this->biz->logout('chenxi');
        $this->assertJson($response, '获取成功');
    }

    public function testGetMyself()
    {
        $response = $this->biz->getMyself('chenxi');
        $this->assertJson($response, '获取成功');
    }

    public function testUploadImage()
    {
        $response = $this->biz->uploadImage('chenxi', '12312312');
        $this->assertJson($response, '获取成功');
    }

    public function testVerify()
    {
        $response = $this->biz->verify('chenxi', '12312312');
        $this->assertJson($response, '获取成功');
    }

    public function testChangeMobile()
    {
        $response = $this->biz->changeMobile('12345678901', '123456', '123456');
        $this->assertJson($response, '获取成功');
    }

    public function testChangePassword()
    {
        $response = $this->biz->changePassword('12345678901', '1234567', '123456');
        $this->assertJson($response, '获取成功');
    }

    public function testResetPassword()
    {
        $response = $this->biz->resetPassword('12345678901', '123456', '1234567');
        $this->assertJson($response, '获取成功');
    }

    public function testBindEmail()
    {
        $response = $this->biz->bindEmail('12345678901', 'bbxycx.18@163.com', '123456', '1234567');
        $this->assertJson($response, '获取成功');
    }

    public function testUploadWallet()
    {
        $response = $this->biz->uploadWallet('chenxi', '123456');
        $this->assertJson($response, '获取成功');
    }

    public function testGetToken()
    {
        $response = $this->biz->getToken('chenxi');
        $this->assertJson($response, '获取成功');
    }

    public function testGetHelp()
    {
        $response = $this->biz->getHelp('/static/information/help/home_0.html');
        $this->assertJson($response, '获取成功');
    }

    public function testGetAbout()
    {
        $response = $this->biz->getAbout('/static/information/help/about.html');
        $this->assertJson($response, '获取成功');
    }

    public function testCreateDepositOrder()
    {
        $response = $this->biz->createDepositOrder('chenxi', 'JJCC', '123', '12312', '21341', '21213', '12');
        $this->assertJson($response, '获取成功');
    }

    public function testCancelDepositOrder()
    {
        $response = $this->biz->cancelDepositOrder('chenxi', 'JJCC', '123');
        $this->assertJson($response, '获取成功');
    }

    public function testUpdateDepositOrder()
    {
        $response = $this->biz->updateDepositOrder('chenxi', 'JJCC', '123', '1231');
        $this->assertJson($response, '获取成功');
    }

    public function testGetDepositDetail()
    {
        $response = $this->biz->getDepositDetail('chenxi', 'JJCC', '123');
        $this->assertJson($response, '获取成功');
    }

    public function testGetPendingDeposit()
    {
        $response = $this->biz->getPendingDeposit('chenxi', 'JJCC');
        $this->assertJson($response, '获取成功');
    }

    public function testGetDepositOrders()
    {
        $response = $this->biz->getDepositOrders('chenxi', 'JJCC', 1);
        $this->assertJson($response, '获取成功');
    }

    public function testCreateWithdrawOrder()
    {
        $response = $this->biz->createWithdrawOrder('chenxi', 'JJCC', '123', '12312', '21341', '21213', '12');
        $this->assertJson($response, '获取成功');
    }

    public function testGetWithdrawOrders()
    {
        $response = $this->biz->getDepositOrders('chenxi', 'JJCC', 1);
        $this->assertJson($response, '获取成功');
    }

    public function testUpdateWithdrawOrder()
    {
        $response = $this->biz->updateWithdrawOrder('chenxi', 'JJCC', 1);
        $this->assertJson($response, '获取成功');
    }

    public function testGetWithdrawDetail()
    {
        $response = $this->biz->getWithdrawDetail('chenxi', 'JJCC', 1);
        $this->assertJson($response, '获取成功');
    }

    public function testGetAgentInfo()
    {
        $response = $this->biz->getAgentInfo('chenxi', 'JJCC');
        $this->assertJson($response, '获取成功');
    }

    public function testGetCoinlist()
    {
        $response = $this->biz->getCoinlist('chenxi');
        $this->assertJson($response, '获取成功');
    }

    public function testGetNewsReportList()
    {
        $response = $this->biz->getNewsReportList('1');
        $this->assertJson($response, '获取成功');
    }

    public function testGetNoticeList()
    {
        $response = $this->biz->getNoticeList('1', '1');
        $this->assertJson($response, '获取成功');
    }
}