<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Unit;

use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class NotifyTest extends TestCase
{
    // 测试通知
    public function testNotify()
    {
        $this->app->rebind('request', function () {
            $content = json_encode([
                "order_id" => 251,
                "order_no" => "4394ca3ae2d611ea830facde48001122",
                "channel" => "wechat",
                "platform" => "wechatpay",
                "pay_type" => "native",
                "expired_time" => "1597929247",
                "amount" => 1,
                "status" => 1,
                "status_desc" => "未支付",
                "nonce" => "5f3e5aff520f6",
                "sign" => "36CB29889BF2B233106215A420612852C4091310",
            ]);

            return Request::create('/xxx', 'POST', [], [], [], [], $content);
        });

        $response = $this->app->notifyPaidHandle(function ($data) {
            return true;
        });

        $this->assertSame('SUCCESS', $response->getContent());
    }
}
