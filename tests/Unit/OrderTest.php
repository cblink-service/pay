<?php

namespace Tests\Unit;

use Cblink\Service\Payment\PayConst;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function testCreate()
    {
        $response = $this->app->order->create([
            // app uuid
            'app_id' => 'a3f2e4b4e1e311ea839d0242ac0b0006',
            // 公众号的appid
            'sub_appid' => 'xxxxxxxxxxxxxx',
            // 订单号
            'order_no' => 'T'.date('YmdHis').mt_rand(0, 100),
            // 支付方式
            'platform' => PayConst::PLATFORM_WECHATPAY,
            // 支付类型
            'pay_type' => PayConst::PAY_JSAPI,
            // 订单原始金额
            'original_amount' => 1,
            // 订单实付金额
            'amount' => 1,
            // 标题
            'subject' => '购买演示商品',
            // 内容
            'body' => '购买演示商品数量1',
            // 在微信下是openid,支付宝方式是用户id
            'user_id' => 'xxxxxxxxxxxx',
            // 通知地址
            'notify_url' => 'https://www.baidu.com/'
        ]);

        $this->assertTrue($response->success());
    }

    public function testQuery()
    {
        $response = $this->app->order->query(6, true);

        $this->assertTrue($response->success());
    }

    public function testClose()
    {
        $response = $this->app->order->close(1);

        $this->assertTrue($response->success());
    }
 }