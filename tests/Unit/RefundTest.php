<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests\Unit;

use Tests\TestCase;

class RefundTest extends TestCase
{
    public function testCreate()
    {
        $response = $this->app->refund->create([
            'order_id' => 11,
            'refund_no' => 'TD'.date('YmdHis').mt_rand(1, 100),
            'amount' => 1,
            'remark' => '不想要了',
            'notify_url' => 'https://www.baidu.com',
        ]);

        $this->assertTrue($response->success());
    }

    public function testQuery()
    {
        $response = $this->app->refund->query(3);

        $this->assertTrue($response->success());
    }
}
