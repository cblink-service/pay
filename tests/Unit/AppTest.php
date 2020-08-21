<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit;

use Cblink\Service\Payment\PayConst;
use Tests\TestCase;

class AppTest extends TestCase
{
    public function testLists()
    {
        $response = $this->app->app->lists();

        $this->assertTrue($response->success());
    }

    public function testCreateChinaPay()
    {
        $response = $this->app->app->create([
            'channel' => PayConst::CHANNEL_CHINA_PAY,
            'config' => [
                'src_id' => 'xxxx',
                'mid' => 'xxxx',
                'tid' => 'xxxx',
                'app_id' => 'xxxxx',
                'app_key' => 'xxxxxxxxx',
                'secret' => 'xxxxxxxxxx'
            ],
        ]);

        $this->assertTrue($response->success());
    }

    public function testCreateWechat()
    {
        $cert = "xxxxx";
        $certKey  = "xxxxxxxxxxxxxxxxxxxx";

        $response = $this->app->app->create([
            'channel' => PayConst::CHANNEL_WECHAT_PAY,
            'config' => [
                'app_id' => 'xxxxxxx',
                'mch_id' => 'xxxxxxxxxx',
                'key' => 'xxxxxxxxxxxxxxxxxxxx',
                'cert' => $cert,
                'cert_key' => $certKey,
            ],
        ]);

        $this->assertTrue($response->success());
    }

    public function testCreateMiniWechat()
    {
        $cert = "xxxxxxxxxxxxx";
        $certKey  = "xxxxxxxxxxxxxxxx";

        $response = $this->app->app->create([
            'channel' => PayConst::CHANNEL_WECHAT_PAY,
            'config' => [
                'app_id' => 'xxxxxx',
                'mch_id' => 'xxxxxxx',
                'key' => 'xxxxxxxxxxxxxxx',
                'cert' => $cert,
                'cert_key' => $certKey,
            ],
        ]);

        $this->assertTrue($response->success());
    }

    public function testUpdate()
    {
        $cert = "2222222";
        $certKey  = "44444444";

        $response = $this->app->app->update('f9fda410e0fe11ea942be6d113f62081', [
            'app_id' => 'xxxxxxxxxxx',
            'mch_id' => 'xxxx',
            'key' => 'xxxx',
            'cert' => $cert,
            'cert_key' => $certKey,
        ]);

        $this->assertTrue($response->success());
    }
}
