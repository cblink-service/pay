<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Payment\Kernel;

use Cblink\DTO\DTO;
use Illuminate\Support\Arr;

/**
 * Class OrderDTO
 * @package Cblink\Service\Payment\Kernel
 */
class OrderDTO extends DTO
{
    public function rules(): array
    {
        return [
            // app uuid
            'app_id' => ['required', 'string', 'max:32'],
            // 订单号
            'order_no' => ['required', 'string', 'max:64'],
            // 支付方式
            'platform' => ['required', 'string'],
            // 支付类型
            'pay_type' => ['required', 'string'],
            // 订单原始金额
            'original_amount' => ['nullable', 'integer', 'min:1'],
            // 订单实付金额
            'amount' => ['required', 'integer', 'min:1'],
            // 结算货币
            'currency' => ['nullable', 'string'],
            // 标题
            'subject' => ['required', 'string', 'max:128'],
            // 内容
            'body' => ['required', 'string', 'max:150'],
            // 交易ip
            'client_ip' => ['nullable', 'ip'],

            // 跳转地址
            'notify_url' => ['required', 'url'],
            // 回跳地址
            'return_url' => ['nullable', 'url'],
            //
            'show_url' => ['nullable', 'url'],

            // 商品信息
            'goods' => ['nullable', 'array'],
            'goods.*' => ['required', 'array'],
            'goods.*.id' => ['required', 'string', 'max:20'],
            'goods.*.name' => ['required', 'string', 'max:50'],
            'goods.*.price' => ['required', 'integer', 'min:0'],
            'goods.*.num' => ['required', 'integer', 'min:1'],

            // 限制信用卡支付
            'limit_pay' => ['nullable', 'boolean'],
            // 微信的子商户号
            'sub_appid' => ['nullable', 'string', 'max:50'],
            // 微信openid，支付宝user_id,银联user_id
            'user_id' => ['nullable', 'string', 'max:50'],
            // 支付码
            'scan_code' => ['nullable', 'string', 'max:100'],
            // 场景信息
            'scene' => ['nullable', 'array'],
            'expired_time' => ['nullable', 'integer', 'min:900'],
            'desc' => ['nullable', 'string', 'max:200']
        ];
    }

    public function getPayload()
    {
        return Arr::only($this->payload, array_keys($this->rules()));
    }
}
